<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dosen;
use App\Bidang;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
	public function index() 
	{
		$dosens = Dosen::orderBy('id','DESC')->paginate(5);
        return view('dosen.index',compact('dosens'));
	}
	public function create()
	{
        $bidang= Bidang::lists('bidang','id');
		return view('dosen.create',compact('bidang'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nip' => 'required|numeric',
        'nama_dosen' => 'required',
        'bidang_id' => 'required',
    ]);  
        $dosen = new Dosen();
        $dosen->nip = $request->input('nip');
        $dosen->nama_dosen = $request->input('nama_dosen');
        $dosen->bidang_id = $request->input('bidang_id');
        $dosen->save();

        Dosen::create($request->all());

        return redirect()->route('dosen.index')
        				->with('message','dosen inserted!');
	}
	public function show($id)
	{
		$dosen=Dosen::find($id);
		return view('dosen.show',compact('dosen'));
	}
	public function edit($id)
	{
        $bidang= Bidang::lists('bidang','id');
		return view('dosen.edit',compact('bidang'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'nip' => 'required|numeric',
        'nama_dosen' => 'required',
        'bidang_id' => 'required',
    	]);
        $dosen = Dosen::find($id);
        $dosen->nip = $request->input('nip');
        $dosen->nama_dosen = $request->input('nama_dosen');
        $dosen->bidang_id = $request->input('bidang_id');
        $dosen->save();

		Dosen::find($id)->update($request->all());
        return redirect()->route('dosen.index')
        				->with('message','profile dosen telah di edit!');
	}
	public function destroy($id)
	{
		Dosen::find($id)->delete();
		return redirect()->route('dosen.index')
						->with('message','Data telah di dihapus!');
	}
}