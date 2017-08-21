<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarPkl;
use DB;
use App\Http\Requests;

class DaftarPklController extends Controller
{
    public function index()
	{
        $daftarpkls = DB::table('daftarpkl');
		$daftarpkls = DaftarPkl::orderBy('id','ASC')->paginate(8);
        return view('daftarpkl.index', compact('daftarpkls'));
	}
	public function create()
	{
        $prodi= Prodi::lists('nama_prodi','id');
        $perusahaan= Perusahaan::lists('nama_perusahaan','id');
		return view('daftarpkl.create',compact('perusahaan','prodi'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
	        'prodi_id' => 'required',
	        'grup_id' => 'required',
	        'perusahaan_id' => 'required',
	        'nama_proyek' => 'required|numeric',
	        'semester' => 'required',
	        'tahun_ajaran' => 'required|digits_between:4,9',
	    ]);
		
		$daftarpkl = new DaftarPkl();
		$daftarpkl->prodi_id = $request->prodi_id;
		$daftarpkl->grup_id = $request->grup_id;
		$daftarpkl->perusahaan_id = $request->perusahaan_id;
		$daftarpkl->nama_proyek = $request->nama_proyek;
		$daftarpkl->semester = $request->semester;
		$daftarpkl->tahun_ajaran = $request->tahun_ajaran;
		$daftarpkl->save();

  		if (Auth::user()->roles()->first()->name == "Mahasiswa") {
            return redirect()->route('daftarpkl.show',Auth::id())->with('message','Data PKL Disimpan!');
        }
        return redirect()->route('daftarpkl.index')->with('message','Data pkl Inserted!');
	}
	public function show($id)
	{
        $daftarpkl=DaftarPkl::find($id);
		return view('daftarpkl.show',compact('daftarpkl'));
	}
	public function edit($id)
	{
        $perusahaan = Perusahaan::lists('nama_perusahaan','id');
        $prodi = Prodi::lists('nama_prodi','id');

        $daftarpkl = DaftarPkl::find($id);

        return view('daftarpkl.edit',compact('prodi','perusahaan', 'daftarpkl'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
	        'prodi_id' => 'required',
	        'grup_id' => 'required',
	        'perusahaan_id' => 'required',
	        'nama_proyek' => 'required|numeric',
	        'semester' => 'required',
	        'tahun_ajaran' => 'required|digits_between:4,9',
	    ]);
		
		$daftarpkl = DaftarPkl::find($id);
		$daftarpkl->prodi_id = $request->prodi_id;
		$daftarpkl->grup_id = $request->grup_id;
		$daftarpkl->perusahaan_id = $request->perusahaan_id;
		$daftarpkl->nama_proyek = $request->nama_proyek;
		$daftarpkl->semester = $request->semester;
		$daftarpkl->tahun_ajaran = $request->tahun_ajaran;
		$daftarpkl->save();

        if (Auth::user()->roles()->first()->name == "Mahasiswa") {
            return redirect()->back()->with('message','Data PKL updated!');
        }
        return redirect()->route('daftarpkl.index')
                        ->with('message','Data pkl telah di edit!');
	}
	public function destroy($pkl)
	{
		$daftarpkl=DaftarPkl::find($id)->delete();
		return redirect()->route('daftarpkl.index')
						->with('message','Data telah di dihapus!');
	}
}
