<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Perusahaan;
//use App\Http\Request;
use App\Http\Controllers\Controllers;

class PerusahaanController extends Controller
{
	public function index()
	{
		$perusahaans = Perusahaan::orderBy('id','DESC')->paginate(5);
        return view('perusahaan.index',compact('perusahaans'));
	}
	public function create()
	{
		return view('perusahaan.create');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nama_perusahaan' => 'required',
        'email' => 'required|email|unique:perusahaan,email',
        'telepon' => 'required|digits_between:8,12',
        'alamat' => 'required',
    ]);
		Perusahaan::create($request->all());
		return redirect()->route('perusahaan.index')
						->with('message','profile perusahaan updated!');
	}
	public function show($id)
	{
		$perusahaan=Perusahaan::find($id);
		return view('perusahaan.show',compact('perusahaan'));
	}
	public function edit($id)
	{
		$perusahaan=Perusahaan::find($id);
		return view('perusahaan.edit',compact('perusahaan'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'nama_perusahaan' => 'required',
        'email' => 'required',
        'telepon' => 'required|digits_between:8,12',
        'alamat' => 'required',
    ]);
		
        Perusahaan::find($id)->update($request->all());
        return redirect()->route('perusahaan.index')
        				->with('message','profile perusahaan telah di edit!');
	}
	public function destroy($perusahaan)
	{
		$perusahaan=Perusahaan::where('id','=',$id);
		$perusahaan->delete();
		return redirect()->route('perusahaan')
					->with('message','Data telah di dihapus!');
	}
	
}