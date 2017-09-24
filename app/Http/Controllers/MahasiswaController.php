<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Prodi;
use App\User;
use Auth;
use DB;
use App\Http\Requests;

class MahasiswaController extends Controller
{
    public function index(Request $request) 
	{
		$mahasiswas = Mahasiswa::leftJoin('pembimbing','pembimbing.nim','=','mahasiswa.no_induk')
					->select('mahasiswa.*',DB::raw('count(pembimbing.id) as pbb'))
					->groupBy('mahasiswa.no_induk')
					->get();

		
        return view('mahasiswa.index',compact('mahasiswas','prodi'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function show($id)
	{
        $prodi= Prodi::lists('prodi','id');
		$mahasiswa=Mahasiswa::where('user_id','=',$id)->first();
		if (!$mahasiswa) {
        	abort(403);
        	}
		return view('mahasiswa.show',compact('mahasiswa','prodi'));
	}

	public function edit($id)
	{
		$mahasiswa=Mahasiswa::where('id','=',$id)->first();
        $prodi= Prodi::lists('prodi','id');
		return view('mahasiswa.edit',compact('prodi','mahasiswa'));
	}
	
	public function update(Request $request, $id)
	{

		$user_id=Mahasiswa::where('id','=',$id)->value('user_id');

		$user =User::find($user_id);
		$user->no_induk =$request->input('no_induk');
		$user->nama_user = $request->input('nama_user');
		$user->username = $request->input('username');
		$user->email = $request->input('email');
		$user->save();

		$this->validate($request, [
        'no_induk' => 'required|numeric',
        'nama_user' => 'required',
        'username' => 'required',
        'email' => 'required',
        'jenis_kelamin' => 'required',
        'prodi_id' => 'required',
        'angkatan' => 'required',
        'no_hp' => 'required',
    	]);
    	
		$mahasiswa = Mahasiswa::find($id);

		$mahasiswa->no_induk = $request->no_induk;
		$mahasiswa->nama_user = $request->nama_user;
		$mahasiswa->username = $request->username;
		$mahasiswa->email = $request->email;
		$mahasiswa->jenis_kelamin = $request->jenis_kelamin;
		$mahasiswa->prodi_id = $request->prodi_id;
		$mahasiswa->angkatan = $request->angkatan;
		$mahasiswa->no_hp = $request->no_hp;
		$mahasiswa->save();


  		if (Auth::user()->roles()->first()->name == "Mahasiswa") {
        	return redirect()->route('mahasiswa.show',Auth::id())->with('message','Data profile telah di ubah!');
        }else{

        	return redirect()->route('mahasiswa.index')
        					->with('message','profile mahasiswa telah di edit!');
        }
	}
	public function destroy($id)
	{
		Mahasiswa::find($id)->delete();
		return redirect()->route('mahasiswa.index')
						->with('message','Data telah di dihapus!');
	}
}
