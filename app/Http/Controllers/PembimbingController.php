<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
use App\Dosen;
use App\BidangPkl;
use App\Role;
use App\Prodi;
use App\DaftarPkl;
use App\Pembimbing;
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
                $query->orWhere('dosen_id','like','%'.$term.'%');
            }
        })
        ->orderBy('id','DESC')
        ->paginate(5);
        
        return view('pembimbing.index',compact('data','daftarpkl'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create(Request $request)
	{
        $dosen= Dosen::lists('nama_dosen','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl','id');
        $prodi= Prodi::lists('prodi','id');
        $daftarpkl= DaftarPkl::all();
		return view('pembimbing.create',compact('bidangpkl','dosen','prodi','daftarpkl'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nama_mhs' => 'required',
        'nim' => 'required',
        'bidang_pkl' => 'required',
        'prodi_id' => 'required',
        'daftarpkl' => 'required',
        'dosen_id' => 'required',

    ]);
         
        $pembimbing = new Pembimbing();
        $pembimbing->user_id = $request->user()->id;
        $pembimbing->nama_mhs = $request->input('nama_mhs');
        $pembimbing->nim = $request->input('nim');
        $pembimbing->bidangpkl_id = $request->input('bidangpkl_id');
        $pembimbing->prodi_id = $request->input('prodi_id');
        $pembimbing->daftarpkl_id = $request->input('daftarpkl');
        $pembimbing->dosen_id = $request->input('dosen_id');
        $pembimbing->save();

        return redirect()->route('pembimbing.index')
        				->with('message','pembimbing inserted!');
	}
	public function show($id)
	{
		$pembimbing=Pembimbing::find($id);
		return view('pembimbing.show',compact('pembimbing'));
	}
	public function edit($id)
	{
        $dosen= Dosen::lists('nama_dosen','id');
        $bidangpkl =BidangPkl::lists('nama_proyek','id');
        $prodi= Prodi::lists('prodi','id');
        $daftarpkl= Prodi::lists('nama_proyek','tahun_ajaran','id');

        $pembimbing = Pembimbing::find($id);
		return view('pembimbing.edit',compact('dosen','prodi','bidangpkl','daftarpkl','pembimbing'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'nama_mhs' => 'required',
            'nim' => 'required|numeric',
            'bidangpkl_id' => 'required',
            'prodi_id' => 'required',
            'daftarpkl' => 'required',
            'dosen_id' => 'required',
    ]);  
        $pembimbing = Pembimbing::find($id);
        $pembimbing->nama_mhs = $request->nama_mhs;
        $pembimbing->nim = $request->nim;
        $pembimbing->bidangpkl_id = $request->bidangpkl_id;
        $pembimbing->prodi_id = $request->prodi_id;
        $pembimbing->daftarpkl_id = $request->input('daftarpkl');
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
        $daftarpkl= DB::table('daftar_pkl')->select('tahun_ajaran')->groupBy('tahun_ajaran')->get();

        return view('reportpembimbing.select',['prodi'=>$prodi,'bidangpkl'=>$bidangpkl,'daftarpkl'=>$daftarpkl]);   
    }

    public function filter(Request $request)
    {
        $bidangpkl = $request->input('bidangpkl');
        $prodi = $request->input('prodi');
        $dosen = $request->input('nama_dosen');
        $daftarpkl = $request->input('daftarpkl');
        
        $pembimbing = DB::table('pembimbing')
                        ->Join('bidang_pkl','bidang_pkl.id','=','pembimbing.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','pembimbing.prodi_id')
                        ->Join('dosen','dosen.id','=','pembimbing.dosen_id')
                        ->leftJoin('daftar_pkl','daftar_pkl.id','=','pembimbing.daftarpkl_id')
                        ->select('pembimbing.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','dosen.nama_dosen as namdos','daftar_pkl.nama_proyek as nama_proyek','daftar_pkl.tahun_ajaran as tahun_ajaran')
                        ->where('pembimbing.bidangpkl_id',$bidangpkl)
                        ->where('pembimbing.prodi_id',$prodi)
                        ->where('daftar_pkl.tahun_ajaran','like','%'.$daftarpkl.'%')
                        ->get();

        return view('reportpembimbing.fileselect',compact('pembimbing','bidangpkl','dosen','prodi','daftarpkl'));
    }
    public function setPDF($b,$p)
    {
        $bidangpkl = BidangPkl::where('id',$b)
                        ->first();
        $prodi = Prodi::where('id',$p)->first();
        
        $pembimbing = DB::table('pembimbing')
                        ->Join('bidang_pkl','bidang_pkl.id','=','pembimbing.bidangpkl_id')
                        ->Join('prodi','prodi.id','=','pembimbing.prodi_id')
                        ->Join('dosen','dosen.id','=','pembimbing.dosen_id')
                        ->leftJoin('daftar_pkl','daftar_pkl.id','=','pembimbing.daftarpkl_id')
                        ->select('pembimbing.*','prodi.prodi as prod','bidang_pkl.bidang_pkl as bidpkl','dosen.nama_dosen as namdos','daftar_pkl.nama_proyek as nama_proyek')
                        ->where('pembimbing.bidangpkl_id',$b)
                        ->where('pembimbing.prodi_id',$p)
                        ->get();

        $pdf = PDF::loadView('reportpembimbing.report',compact('pembimbing','bidangpkl','dosen','prodi','daftarpkl'))
                ->setPaper('a4', 'Landscape');
                
            return $pdf->stream('pembimbing.setpdf');
    }

}