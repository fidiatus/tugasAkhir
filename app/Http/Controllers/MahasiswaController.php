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
			$tahun = date('Y');

		$mahasiswas = Mahasiswa::leftJoin('pembimbing','pembimbing.nim','=','mahasiswa.no_induk')
					->select('mahasiswa.*',DB::raw('count(pembimbing.id) as pbb'))
					->where('mahasiswa.angkatan',$tahun-2)
					->orwhere('mahasiswa.angkatan',$tahun-3)
					->where('mahasiswa.prodi_id','!=',2)
					->groupBy('mahasiswa.no_induk')
					->get();
					// select * from mahasiswa where angkatan=year(now())-2 or angkatan=year(now())-3 and prodi_id !=2
		
        return view('mahasiswa.index',compact('mahasiswas','prodi'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function show($id)
	{
        $prodi= Prodi::lists('prodi','id');
		$mahasiswa=Mahasiswa::where('user_id','=',$id)->first();
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
        'no_hp' => 'required|numeric',
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

// ============================== Select Data Mahasiswa PKL ===========================
    public function selectMhs()
    {
        $angkatan= Mahasiswa::groupBy('angkatan')->get();
        
        return view('mahasiswa.selectmhs',['angkatan'=>$angkatan]);  
    }

    public function filterMhs(Request $request)
    {
        $angkatan = $request->input('angkatan');
        
        $mahasiswa = DB::table('mahasiswa')
                        ->Join('prodi','prodi.id','=','mahasiswa.prodi_id')
                        ->select('mahasiswa.*','prodi.prodi as prod')
                        ->where('mahasiswa.angkatan',$angkatan)
                        ->get();

        return view('mahasiswa.fileselect',compact('mahasiswa','angkatan'));
    }
}
