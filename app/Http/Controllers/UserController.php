<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Prodi;
use App\Bidang;
use Auth;
use DB;
use Hash;

class UserController extends Controller
{
     public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::lists('prodi','id');    //prodi= field di tabelprodi
        $bidang = Bidang::lists('bidang','id'); //id= field id yang di panggil
        $roles = Role::lists('name','id');
        return view('users.create',compact('prodi','bidang','roles'));
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_induk' => 'required|numeric',
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|digits_between:8,12',
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        foreach ($request->input('roles') as $key => $value) {
          $user->attachRole($value);
        }
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = Prodi::lists('prodi','id');
        $bidang = Bidang::lists('bidang','id');
        $roles = Role::lists('name','id');

        $user = User::find($id);
        $userRole = $user->roles->lists('id','id')->toArray();
        return view('users.edit',compact('user','roles','userRole','prodi','bidang'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
     
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_induk' => 'required|numeric',
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'no_hp' => 'required|digits_between:8,12'
        ]);
        $user = User::find($id);
        $user->no_induk=$request->no_induk;
        $user->nama_user=$request->nama_user;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->no_hp=$request->no_hp;
        $user->save();  

        if (Auth::user()->roles()->first()->name == "Admin") {            
            foreach ($request->input('roles') as $key => $value) {
              $user->attachRole($value);
            }
        return redirect()->route('users.index')
                      ->with('success','User updated successfully');
        }
        
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);

        if (Auth::user()->roles()->first()->name == "Kaprodi") {
           return redirect()->route('users.show',Auth::id())->with('message','profile diupdate!');
        }
        if (Auth::user()->roles()->first()->name == "Mahasiswa") {
           return redirect()->route('users.show',Auth::id())->with('message','profile diupdate!');
        }        
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

}
