<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarPkl;
use App\Perusahaan;
use App\Prodi;
use App\BidangPkl;
use App\Role;
use App\User;
use App\Mahasiswa;
use DB;
use Auth;
use PDF;
use Excel;
use App\Http\Requests;

class DaftarPklController extends Controller
{
    public function index(Request $request)
	{
        $daftarpkls = DaftarPkl::where(function($query) use ($request)
		{
			if( ($term=$request ->get('term'))) {
				$query->orWhere('nama_mhs','like','%'.$term.'%');
				$query->orWhere('nim','like','%'.$term.'%');
				$query->orWhere('prodi_id','like','%'.$term.'%');
				$query->orWhere('bidangpkl_id','like','%'.$term.'%');
				$query->orWhere('perusahaan_id','like','%'.$term.'%');
				$query->orWhere('nama_proyek','like','%'.$term.'%');
				$query->orWhere('semester','like','%'.$term.'%');
				$query->orWhere('tahun_ajaran','like','%'.$term.'%');
			}
		})

		->orderBy('nama_proyek','DESC')
		->paginate(5);
		
        return view('daftarpkl.index', compact('daftarpkls'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create()
	{
        $prodi= Prodi::lists('prodi','id');
        $perusahaan= Perusahaan::lists('nama_perusahaan','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl','id');
		return view('daftarpkl.create',compact('perusahaan','prodi','bidangpkl'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
	        'nama_mhs' => 'required',
	        'nim' => 'required|numeric',
	        'prodi_id' => 'required',
	        'bidangpkl_id' => 'required',
	        'perusahaan_id' => 'required',
	        'nama_proyek' => 'required',
	        'semester' => 'required',
	        'tahun_ajaran' => 'required|digits_between:4,9',
	    ]);
		
		$daftarpkl = new DaftarPkl();
		$daftarpkl->user_id = $request->user()->id;
		$daftarpkl->nama_mhs = $request->input('nama_mhs');
		$daftarpkl->nim = $request->input('nim');
		$daftarpkl->prodi_id = $request->input('prodi_id');
		$daftarpkl->bidangpkl_id = $request->input('bidangpkl_id');
		$daftarpkl->perusahaan_id = $request->input('perusahaan_id');
		$daftarpkl->nama_proyek = $request->input('nama_proyek');
		$daftarpkl->semester = $request->input('semester');
		$daftarpkl->tahun_ajaran = $request->input('tahun_ajaran');
		$daftarpkl->save();

  		if (Auth::user()->roles()->first()->name == "Mahasiswa") {  			
            return redirect()->route('daftarpkl.edit',Auth::id())->with('message','data updated!');
        }
        else {
  		return redirect()->route('daftarpkl.index')
        				->with('message','Data pkl Inserted!');
		}
	}

	public function show($id)
	{
        $daftarpkl=DaftarPkl::find($id);

		return view('daftarpkl.show',compact('daftarpkl'));
	}
	
	public function edit($id)
	{
        $perusahaan = Perusahaan::lists('nama_perusahaan','id');
        $prodi = Prodi::lists('prodi','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl','id');

        $daftarpkl = DaftarPkl::where('user_id','=',$id)->first();

        return view('daftarpkl.edit',compact('prodi','perusahaan', 'daftarpkl','bidangpkl'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
	        'nama_mhs' => 'required',
	        'nim' => 'required|numeric',
	        'prodi_id' => 'required',
	        'bidangpkl_id' => 'required',
	        'perusahaan_id' => 'required',
	        'nama_proyek' => 'required',
	        'semester' => 'required',
	        'tahun_ajaran' => 'required|digits_between:4,9',
	    ]);
		
		$daftarpkl = DaftarPkl::find($id);
		$daftarpkl->nama_mhs = $request->nama_mhs;
		$daftarpkl->nim = $request->nim;
		$daftarpkl->prodi_id = $request->prodi_id;
		$daftarpkl->bidangpkl_id = $request->bidangpkl_id;
		$daftarpkl->perusahaan_id = $request->perusahaan_id;
		$daftarpkl->nama_proyek = $request->nama_proyek;
		$daftarpkl->semester = $request->semester;
		$daftarpkl->tahun_ajaran = $request->tahun_ajaran;
		$daftarpkl->save();

        if (Auth::user()->roles()->first()->name == "Mahasiswa") {
            return redirect()->back()->with('message','Data PKL updated!');
        }else{
        return redirect()->route('daftarpkl.index')
                        ->with('message','Data pkl telah di edit!');
        }
	}
	public function destroy($daftarpkl)
	{
		$daftarpkl=DaftarPkl::find($id)->delete();
		return redirect()->route('daftarpkl.index')
						->with('message','Data telah di dihapus!');
	}

	public function select()
    {
        $prodi= Prodi::All();
        $bidangpkl= BidangPkl::All();
        $th= DaftarPkl::All();
        $mahasiswa = DB::table('mahasiswa')->groupBy('angkatan')->get();
        
        return view('reportpkl.select',['prodi'=>$prodi,'bidangpkl'=>$bidangpkl,'mahasiswa'=>$mahasiswa,'th'=>$th]);  
    }

    public function filter(Request $request)
    {
        $prodi = $request->input('prodi');
        $bidangpkl = $request->input('bidangpkl');
        $th = $request->input('th');
        $mahasiswa = $request->input('mahasiswa');
        
        $daftarpkl = DB::table('daftar_pkl')
                        ->Join('bidang_pkl','bidang_pkl.id','=','daftar_pkl.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','daftar_pkl.prodi_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','daftar_pkl.nim')
                        ->Join('perusahaan','perusahaan.id','=','daftar_pkl.perusahaan_id')
                        ->select('daftar_pkl.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','perusahaan.nama_perusahaan as namper')
                        ->where('daftar_pkl.prodi_id',$prodi)
                        ->where('daftar_pkl.bidangpkl_id',$bidangpkl)
                        ->where('daftar_pkl.tahun_ajaran',$th)
                        ->where('mahasiswa.angkatan',$mahasiswa)
                        ->get();

        return view('reportpkl.fileselect',compact('daftarpkl','bidangpkl','mahasiswa','prodi','th'));
    }

    public function setPDF($p,$b,$t,$m)
    {
        $prodi = Prodi::where('id',$p)->first();
        $bidangpkl = BidangPkl::where('id',$b)->first();
        $th = DaftarPkl::where('tahun_ajaran',$t)->first();
        $mahasiswa =Mahasiswa::where('id',$m)->first();
        
        $daftarpkl = DB::table('daftar_pkl')
                        ->Join('bidang_pkl','bidang_pkl.id','=','daftar_pkl.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','daftar_pkl.prodi_id')
                        ->Join('perusahaan','perusahaan.id','=','daftar_pkl.perusahaan_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','daftar_pkl.nim')
                        ->select('daftar_pkl.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','perusahaan.nama_perusahaan as namper')
                        ->where('daftar_pkl.prodi_id',$p)
                        ->where('daftar_pkl.bidangpkl_id',$b)
                        ->where('daftar_pkl.tahun_ajaran',$t)
                        ->where('mahasiswa.angkatan',$m)
                        ->get();

        $pdf = PDF::loadView('reportpkl.report',compact('daftarpkl','bidangpkl','prodi','th','mahasiswa'))
                ->setPaper('a4', 'potrait');
                
            return $pdf->stream('daftarpkl.setpdf');
    }

	public function selectPerusahaan()
    {
        $th= DaftarPkl::All();
        
        return view('reportpkl.selectperusahaan',['th'=>$th]);  
    }

    public function filterPerusahaan(Request $request)
    {
        $th = $request->input('th');
        
        $daftarpkl = DB::table('daftar_pkl')
                        ->Join('bidang_pkl','bidang_pkl.id','=','daftar_pkl.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','daftar_pkl.prodi_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','daftar_pkl.nim')
                        ->Join('perusahaan','perusahaan.id','=','daftar_pkl.perusahaan_id')
                        ->select('daftar_pkl.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','perusahaan.nama_perusahaan as namper')
                        ->where('daftar_pkl.tahun_ajaran',$th)
                        ->get();

        return view('reportpkl.fileselectperusahaan',compact('daftarpkl','th'));
    }

    public function setPDFPerusahaan($t)
    {
        $th = DaftarPkl::where('tahun_ajaran',$t)->first();
        
        $daftarpkl = DB::table('daftar_pkl')
                        ->Join('prodi','prodi.id','=','daftar_pkl.prodi_id')
                        ->Join('perusahaan','perusahaan.id','=','daftar_pkl.perusahaan_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','daftar_pkl.nim')
                        ->select('daftar_pkl.*','perusahaan.nama_perusahaan as namper',DB::raw('count(daftar_pkl.perusahaan_id) as jumlah'))
                        ->where('daftar_pkl.tahun_ajaran',$t)
                        ->groupBy('daftar_pkl.perusahaan_id')
                        ->get();

        $pdf = PDF::loadView('reportpkl.reportperusahaan',compact('daftarpkl','th'))
                ->setPaper('a4', 'potrait');
                
            return $pdf->stream('daftarpkl.setpdfperusahaan');
    }
}
