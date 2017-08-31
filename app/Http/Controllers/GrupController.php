<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Grup;
use App\User;
use App\Prodi;
use App\Http\Controllers\Controller;

class grupController extends Controller
{
	public function index() 
	{
		$grups = Grup::orderBy('id','DESC')->paginate(5);
        return view('grup.index',compact('grups'));
	}
	public function create()
	{
        $prodi = Prodi::lists('prodi','id');
        $users = User::lists('nama_user','id');
		return view('grup.edit',compact('grup','users','prodi'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nama_grup' => 'required',
        'prodi_id' => 'required',
        'user_id' => 'required',
    ]);        
		$daftarpkl = new DaftarPkl();
		$daftarpkl->nama_grup = $request->nama_grup;
		$daftarpkl->prodi_id = $request->prodi_id;
		$daftarpkl->user_id = $request->user_id;
		$daftarpkl->save();
		
		if (Auth::user()->roles()->first()->name == "Mahasiswa") {
            return redirect()->route('grup.show',Auth::id())->with('message','Data Grup Disimpan!');
        }
        return redirect()->route('grup.index')
        				->with('message','grup inserted!');
	}
	public function show($id)
	{
		$grup=Grup::find($id);
		return view('grup.show',compact('grup'));
	}
	public function edit($id)
	{
        $prodi = Prodi::lists('prodi','id');
        $users = User::lists('nama_user','id');
		$grup= Grup::find($id);
		return view('grup.edit',compact('grup','users','prodi'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'nama_grup' => 'required',
        'prodi_id' => 'required',
        'user_id' => 'required',
    	]);

		$daftarpkl = DaftarPkl::find($id);
		$daftarpkl->nama_grup = $request->nama_grup;
		$daftarpkl->prodi_id = $request->prodi_id;
		$daftarpkl->user_id = $request->user_id;
		$daftarpkl->save();

		Grup::find($id)->update($request->all());

        if (Auth::user()->roles()->first()->name == "Mahasiswa") {
            return redirect()->back()->with('message','Data Grup PKL updated!');
        }

        return redirect()->route('grup.index')
        				->with('message','profile grup telah di edit!');
	}
	public function destroy($id)
	{
		Grup::find($id)->delete();
		return redirect()->route('grup.index')
						->with('message','Data telah di dihapus!');
	}
}