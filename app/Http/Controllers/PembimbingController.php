<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Pembimbing;
use App\Http\Controllers\Controller;

class PembimbingController extends Controller
{
	public function index() 
	{
		$pembimbings = Pembimbing::orderBy('id','DESC')->paginate(5);
        return view('pembimbing.index',compact('pembimbings'));
	}
	public function create()
	{
        $user= User::lists('no_induk','id');
        $users= User::lists('nama_user','id');
        $dosen= Dosen::lists('nama_dosen','id');
        $prodi= Prodi::lists('prodi','id');
		return view('pembimbing.create',compact('user','users','dosen','prodi'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'user_id' => 'required|numeric',
        'users_id' => 'required',
        'kelas' => 'required',
        'dosen_id' => 'required',
        'prodi_id' => 'required',
    ]);  
        $pembimbing = new Pembimbing();
        $pembimbing->user_id = $request->input('user_id');
        $pembimbing->users_id = $request->input('users_id');
        $pembimbing->kelas = $request->input('kelas');
        $pembimbing->dosen_id = $request->input('dosen_id');
        $pembimbing->prodi_id = $request->input('prodi_id');
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
        $user= User::lists('no_induk','id');
        $users= User::lists('nama_user','id');
        $dosen= Dosen::lists('nama_dosen','id');
        $prodi= Prodi::lists('prodi','id');

        $pembimbing = Pembimbing::find($id);
		return view('pembimbing.edit',compact('user','users','dosen','prodi','pembimbing'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'user_id' => 'required|numeric',
        'users_id' => 'required',
        'kelas' => 'required',
        'dosen_id' => 'required',
        'prodi_id' => 'required',
    ]);  
        $pembimbing = Pembimbing::find($id);
        $pembimbing->user_id = $request->input('user_id');
        $pembimbing->users_id = $request->input('users_id');
        $pembimbing->kelas = $request->input('kelas');
        $pembimbing->dosen_id = $request->input('dosen_id');
        $pembimbing->prodi_id = $request->input('prodi_id');
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
}