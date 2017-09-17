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
		$mahasiswas = Mahasiswa::where(function($query) use ($request)
		{
			if( ($term=$request ->get('term'))) {
				$query->orWhere('no_induk','like','%'.$term.'%');
				$query->orWhere('nama_user','like','%'.$term.'%');
				$query->orWhere('username','like','%'.$term.'%');
				$query->orWhere('email','like','%'.$term.'%');
				$query->orWhere('jenis_kelamin','like','%'.$term.'%');
				$query->orWhere('prodi_id','like','%'.$term.'%');
				$query->orWhere('angkatan','like','%'.$term.'%');
				$query->orWhere('no_hp','like','%'.$term.'%');
			}
		})
		->orderBy('id','DESC')
		->paginate(10); 
		
        return view('mahasiswa.index',compact('mahasiswas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create()
	{
		$user = User::All();
        $prodi= Prodi::lists('prodi','id');
		return view('mahasiswa.create',compact('prodi'));
	}
	public function store(Request $request)
	{
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
        $mahasiswa = new Mahasiswa();
        $mahasiswa->user_id = $request->user()->id;
        $mahasiswa->no_induk = $request->input('no_induk');
        $mahasiswa->nama_user = $request->input('nama_user');
        $mahasiswa->username = $request->input('username');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
        $mahasiswa->prodi_id = $request->input('prodi_id');
        $mahasiswa->angkatan = $request->input('angkatan');
        $mahasiswa->no_hp = $request->input('no_hp');
        $mahasiswa->save();

  		if (Auth::user()->roles()->first()->name == "Mahasiswa") {

        		return redirect()->route('mahasiswa.show',Auth::id())
        				->with('message','Data berhasil diinputkan!');  
        }else{
		        return redirect()->route('mahasiswa.index')
        				->with('message','mahasiswa inserted!');
        				}      
	}

	public function show($id)
	{
		$mahasiswa=Mahasiswa::where('user_id','=',$id)->first();
		return view('mahasiswa.show',compact('mahasiswa'));
	}

	public function edit($id)
	{
		$mahasiswa=Mahasiswa::where('user_id','=',$id)->first();
        $prodi= Prodi::lists('prodi','id');
		return view('mahasiswa.edit',compact('prodi','mahasiswa'));
	}
	
	public function update(Request $request, $id)
	{
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
        	return redirect()->back()->with('message','Data profile telah di ubah!');
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
