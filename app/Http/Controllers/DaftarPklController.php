<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarPkl;
use App\Perusahaan;
use App\Prodi;
use App\BidangPkl;
use App\Role;
use App\User;
use DB;
use Auth;
use PDF;
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

		->orderBy('id','DESC')
		->paginate(5);
		
        return view('daftarpkl.index', compact('daftarpkls'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create()
	{
        $prodi= Prodi::lists('prodi','id');
        $perusahaan= Perusahaan::lists('nama_perusahaan','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl');
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
	        'nama_proyek' => 'required|numeric',
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
            return redirect()->route('pkl.show',Auth::id())->with('message','data updated!');
        }
        else {
  		return redirect()->route('daftarpkl.index')
        				->with('message','Data pkl Inserted!');
		}
	}

	public function show($id)
	{
        $daftarpkl=DaftarPkl::find($id);
        if (!$daftarpkl) {
        	abort(403);
        	}
		return view('daftarpkl.show',compact('daftarpkl'));
	}
	
	public function edit($id)
	{
        $perusahaan = Perusahaan::lists('nama_perusahaan','id');
        $prodi = Prodi::lists('prodi','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl');

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

	public function getPdf(Request $request)
    {
        $prodi= Prodi::find('id');
        $bidangpkl= BidangPkl::find('id');

        $pdf = PDF::loadView('daftarpkl.pdf',compact('prodi','bidangpkl','daftarpkl'))
                ->setPaper('a4', 'Landscape');
                
            return $pdf->download('daftarpkl.pdf');
    }
}
