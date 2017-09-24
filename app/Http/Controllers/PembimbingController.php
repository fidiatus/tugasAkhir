<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
use App\User;
use App\Dosen;
use App\BidangPkl;
use App\Prodi;
use App\DaftarPkl;
use App\Pembimbing;
use App\Mahasiswa;
use App\Perusahaan;
use App\Http\Controllers\Controller;

class PembimbingController extends Controller
{
	public function index(Request $request) 
	{
        $data = Pembimbing::where(function($query) use ($request)
        {
            if( ($term=$request ->get('term'))) {
                $query->orWhere('nama_mhs','like','%'.$term.'%');
                $query->orWhere('nim','like','%'.$term.'%');
                $query->orWhere('bidangpkl_id','like','%'.$term.'%');
                $query->orWhere('prodi_id','like','%'.$term.'%');
                $query->orWhere('daftarpkl_id','like','%'.$term.'%');
                $query->orWhere('perusahaan_id','like','%'.$term.'%');
                $query->orWhere('dosen_id','like','%'.$term.'%');
            }
        })
        ->orderBy('id','DESC')
        ->paginate(5);
        
        return view('pembimbing.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create(Request $request)
	{
        $dosen= Dosen::lists('nama_dosen','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl','id');
        $prodi= Prodi::lists('prodi','id');
        $perusahaan= Perusahaan::lists('nama_perusahaan','id');
        $daftarpkl= DaftarPkl::All();
        $nim= $request->input('nim');
        $nama_mhs=$request->input('nama_mhs');

		return view('pembimbing.create',compact('bidangpkl','dosen','prodi','daftarpkl','perusahaan','nim','nama_mhs'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nama_mhs' => 'required',
        'nim' => 'required',
        'bidangpkl_id' => 'required',
        'prodi_id' => 'required',
        'daftarpkl' => 'required',
        'perusahaan_id' => 'required',
        'dosen_id' => 'required',

    ]);
         
        $pembimbing = new Pembimbing();
        $pembimbing->user_id = $request->user()->id;
        $pembimbing->nama_mhs = $request->input('nama_mhs');
        $pembimbing->nim = $request->input('nim');
        $pembimbing->bidangpkl_id = $request->input('bidangpkl_id');
        $pembimbing->prodi_id = $request->input('prodi_id');
        $pembimbing->daftarpkl_id = $request->input('daftarpkl');
        $pembimbing->perusahaan_id = $request->input('perusahaan_id');
        $pembimbing->dosen_id = $request->input('dosen_id');
        $pembimbing->save();

        return redirect()->route('pembimbing.index')
        				->with('message','pembimbing inserted!');
	}
	public function show($id)
	{
		$pembimbing=Pembimbing::find($id);
        if (!$pembimbing) {
            abort(403);
            }
		return view('pembimbing.show',compact('pembimbing'));
	}
	public function edit($id)
	{
        $dosen= Dosen::lists('nama_dosen','id');
        $bidangpkl =BidangPkl::lists('bidang_pkl','id');
        $prodi= Prodi::lists('prodi','id');
        $perusahaan= Perusahaan::lists('nama_perusahaan','id');
        $daftarpkl= DaftarPkl::all();

        $pembimbing = Pembimbing::find($id);
		return view('pembimbing.edit',compact('dosen','prodi','bidangpkl','daftarpkl','pembimbing','perusahaan'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'nama_mhs' => 'required',
            'nim' => 'required|numeric',
            'bidangpkl_id' => 'required',
            'prodi_id' => 'required',
            'daftarpkl' => 'required',
            'perusahaan_id' => 'required',
            'dosen_id' => 'required',
    ]);  
        $pembimbing = Pembimbing::find($id);
        $pembimbing->nama_mhs = $request->nama_mhs;
        $pembimbing->nim = $request->nim;
        $pembimbing->bidangpkl_id = $request->bidangpkl_id;
        $pembimbing->prodi_id = $request->prodi_id;
        $pembimbing->daftarpkl_id = $request->input('daftarpkl');
        $pembimbing->perusahaan_id = $request->perusahaan_id;
        $pembimbing->dosen_id = $request->dosen_id;
        $pembimbing->save();

		Pembimbing::find($id)->update($request->all());

        return redirect()->route('pembimbing.index')
        				->with('message','profile pembimbing telah di edit!');
	}
	public function destroy($id)
	{
		Pembimbing::find($id)->delete();
		return redirect()->route('pembimbing.index')
						->with('message','Data telah di dihapus!');
	}

    public function select()
    {
        $bidangpkl= BidangPkl::All();
        $prodi= Prodi::All();
        $daftarpkl= DB::table('daftar_pkl')->groupBy('tahun_ajaran')->get();
        $mahasiswa = DB::table('mahasiswa')->groupBy('angkatan')->get();
        return view('reportpembimbing.select',['prodi'=>$prodi,'bidangpkl'=>$bidangpkl,'daftarpkl'=>$daftarpkl,'mahasiswa'=>$mahasiswa]);   
    }

    public function filter(Request $request)
    {
        $bidangpkl = $request->input('bidangpkl');
        $prodi = $request->input('prodi');
        $mahasiswa = $request->input('mahasiswa');
        $daftarpkl = $request->input('daftarpkl');
        
        $pembimbing = DB::table('pembimbing')
                        ->Join('bidang_pkl','bidang_pkl.id','=','pembimbing.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','pembimbing.prodi_id')
                        ->Join('dosen','dosen.id','=','pembimbing.dosen_id')
                        ->Join('daftar_pkl','daftar_pkl.id','=','pembimbing.daftarpkl_id')
                        ->Join('perusahaan','perusahaan.id','=','pembimbing.perusahaan_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','pembimbing.nim')
                        ->select('pembimbing.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','dosen.nama_dosen as namdos','daftar_pkl.nama_proyek as nama_proyek','perusahaan.nama_perusahaan as nama_perusahaan')
                        ->where('pembimbing.bidangpkl_id',$bidangpkl)
                        ->where('pembimbing.prodi_id',$prodi)
                        ->where('mahasiswa.angkatan',$mahasiswa)
                        ->where('daftar_pkl.tahun_ajaran',$daftarpkl)
                        ->get();

        return view('reportpembimbing.fileselect',compact('pembimbing','bidangpkl','dosen','prodi','daftarpkl','perusahaan','mahasiswa'));
    }
    
    public function setPDF($b,$p,$m,$d)
    {
        $bidangpkl = BidangPkl::where('id',$b)
                        ->first();
        $prodi = Prodi::where('id',$p)->first();
        $mahasiswa = Mahasiswa::where('id',$m)->first();
        $daftarpkl = DaftarPkl::where('id',$d)->first();
        
        $pembimbing = DB::table('pembimbing')
                        ->Join('bidang_pkl','bidang_pkl.id','=','pembimbing.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','pembimbing.prodi_id')
                        ->Join('dosen','dosen.id','=','pembimbing.dosen_id')
                        ->Join('daftar_pkl','daftar_pkl.id','=','pembimbing.daftarpkl_id')
                        ->Join('perusahaan','perusahaan.id','=','pembimbing.perusahaan_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','pembimbing.nim')
                        ->select('pembimbing.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','dosen.nama_dosen as namdos','daftar_pkl.nama_proyek as nama_proyek','perusahaan.nama_perusahaan as nama_perusahaan')
                        ->where('pembimbing.bidangpkl_id',$b)
                        ->where('pembimbing.prodi_id',$p)
                        ->where('mahasiswa.angkatan',$m)
                        ->where('daftar_pkl.tahun_ajaran',$d)
                        ->get();

        $pdf = PDF::loadView('reportpembimbing.report',compact('pembimbing','bidangpkl','mahasiswa','prodi','daftarpkl'))
                ->setPaper('a4', 'potrait');
                
            return $pdf->stream('pembimbing.setpdf');
    }

    public function selectDosen()
    {
        $daftarpkl= DB::table('daftar_pkl')->groupBy('tahun_ajaran')->get();
        return view('reportpembimbing.selectdosen',['daftarpkl'=>$daftarpkl]);   
    }

    public function filterDosen(Request $request)
    {
        $daftarpkl = $request->input('daftarpkl');
        
        $pembimbing = DB::table('pembimbing')
                        ->Join('bidang_pkl','bidang_pkl.id','=','pembimbing.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','pembimbing.prodi_id')
                        ->Join('dosen','dosen.id','=','pembimbing.dosen_id')
                        ->Join('daftar_pkl','daftar_pkl.id','=','pembimbing.daftarpkl_id')
                        ->Join('perusahaan','perusahaan.id','=','pembimbing.perusahaan_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','pembimbing.nim')
                        ->select('pembimbing.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','dosen.nama_dosen as namdos','daftar_pkl.nama_proyek as nama_proyek','perusahaan.nama_perusahaan as nama_perusahaan')
                        ->where('daftar_pkl.tahun_ajaran',$daftarpkl)
                        ->get();

        return view('reportpembimbing.filterdosen',compact('pembimbing','daftarpkl'));
    }

    public function setPDFDosen($d)
    {
        $daftarpkl = DaftarPkl::where('id',$d)->first();
        
        $pembimbing = DB::table('pembimbing')
                        ->Join('dosen','dosen.id','=','pembimbing.dosen_id')
                        ->Join('prodi','prodi.id','=','pembimbing.prodi_id')
                        ->Join('daftar_pkl','daftar_pkl.id','=','pembimbing.daftarpkl_id')
                        ->Join('mahasiswa','mahasiswa.no_induk','=','pembimbing.nim')
                        ->select('pembimbing.*','prodi.prodi as prod','dosen.nama_dosen as namdos',DB::raw('count(pembimbing.dosen_id) as jumlah'))
                        ->where('daftar_pkl.tahun_ajaran',$d)
                        ->groupBy('pembimbing.dosen_id')
                        ->get();
        $pdf = PDF::loadView('reportpembimbing.reportdosen',compact('pembimbing','daftarpkl'))
                ->setPaper('a4', 'potrait');
                
            return $pdf->stream('pembimbing.setpdfdosen');
    }
}