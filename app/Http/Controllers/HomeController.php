<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;
use App\User;
use App\Mahasiswa;
use App\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getRegistrasi()
    {
        $role= Role::whereNotIn('id',[4])->get();
        return view('users.register',['roles'=>$role]);
    }

    public function registrasi(Request $request)
    {
        $this->validate($request, [
            'no_induk' => 'required|unique:users|numeric',
            'nama_user' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required',
        ]);
        $input = new User();
        $input->no_induk=$request->input('no_induk');
        $input->nama_user=$request->input('nama_user');
        $input->email=$request->input('email');
        $input->password=bcrypt($request->input('password'));

        if ($input->save()) {
          $input->attachRole($request->input('roles'));
          
              if ($request->input('roles')==5) {
              $mahasiswa = new Mahasiswa();
              $id = DB::table('users')->max('id');
              $mahasiswa->user_id = $id;
              $mahasiswa->no_induk = $input->no_induk;
              $mahasiswa->nama_user = $input->nama_user;
              $mahasiswa->email = $input->email;
              $mahasiswa->save();
            }            
                     
        }

        return view('auth.login')->with('message','Register sukses, silahkan Login');
    }
}
