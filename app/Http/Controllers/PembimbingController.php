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
        
        return view('pembimbing.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create()
	{
        $dosen= Dosen::lists('nama_dosen','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl','id');
        $prodi= Prodi::lists('prodi','id');
        $daftarpkl= DaftarPkl::lists('nama_proyek','id');
		return view('pembimbing.create',compact('bidangpkl','dosen','prodi','daftarpkl'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nama_mhs' => 'required',
        'nim' => 'required',
        'bidangpkl_id' => 'required',
        'prodi_id' => 'required',
        'daftarpkl_id' => 'required',
        'dosen_id' => 'required',

    ]);  
        $pembimbing = new Pembimbing();
        $pembimbing->user_id = $request->user()->id;
        $pembimbing->nama_mhs = $request->input('nama_mhs');
        $pembimbing->nim = $request->input('nim');
        $pembimbing->bidangpkl_id = $request->input('bidangpkl_id');
        $pembimbing->prodi_id = $request->input('prodi_id');
        $pembimbing->daftarpkl_id = $request->input('daftarpkl_id');
        $pembimbing->dosen_id = $request->input('dosen_id');
        $pembimbing->save();

        Pembimbing::create($request->all());

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
        $prodi= Prodi::lists('prodi','id');
        $daftarpkl= Prodi::lists('nama_proyek','id');

        $pembimbing = Pembimbing::find($id);
		return view('pembimbing.edit',compact('dosen','prodi','daftarpkl','pembimbing'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'nama_mhs' => 'required',
            'nim' => 'required|numeric',
            'prodi_id' => 'required',
            'daftarpkl_id' => 'required',
            'dosen_id' => 'required',
    ]);  
        $pembimbing = Pembimbing::find($id);
        $pembimbing->nama_mhs = $request->nama_mhs;
        $pembimbing->nim = $request->nim;
        $pembimbing->prodi_id = $request->prodi_id;
        $pembimbing->daftarpkl_id = $request->daftarpkl_id;
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

    public function getPdf(Request $request)
    {
        $dosen= Dosen::lists('nama_dosen','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl','id');
        $prodi= Prodi::lists('prodi','id');
        $daftarpkl= DaftarPkl::lists('nama_proyek','id');
        $pembimbing = Pembimbing::all();

        $pdf = PDF::loadView('pembimbing.pdf',compact('dosen','bidangpkl','prodi','daftarpkl','pembimbing'))
                ->setPaper('a4', 'Landscape');
                
            return $pdf->stream('pembimbing.pdf');
    }
}