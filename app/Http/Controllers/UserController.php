<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Prodi;
use App\Mahasiswa;
use App\Bidang;
use Auth;
use DB;
use Hash;

class UserController extends Controller
{
     public function index(Request $request)
    {
        $data = User::where(function($query) use ($request)
        {
            if( ($term=$request ->get('term'))) {
                $query->orWhere('no_induk','like','%'.$term.'%');
                $query->orWhere('nama_user','like','%'.$term.'%');
                $query->orWhere('username','like','%'.$term.'%');
                $query->orWhere('email','like','%'.$term.'%');
                $query->orWhere('no_hp','like','%'.$term.'%');
            }
        })
        ->orderBy('id','DESC')
        ->paginate(5);
        
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
        $bidang = Bidang::lists('nama_bidang','id'); //id= field id yang di panggil
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
            'no_induk' => 'required|numeric|unique:users',
            'nama_user' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        foreach ($request->input('roles') as $key => $value) {
          $user->attachRole($value);
        }

        if ($user->save()) {
          foreach ($request->input('roles') as $key => $value) {
              if ($value==5) {
              $mahasiswa = new Mahasiswa();
              $id = DB::table('users')->max('id');
              $mahasiswa->user_id = $id;
              $mahasiswa->no_induk = $user->no_induk;
              $mahasiswa->nama_user = $user->nama_user;
              $mahasiswa->username = $user->username;
              $mahasiswa->email = $user->email;
              $mahasiswa->save();
            }            
          }            
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
        if (!$user) {
          abort(403);
          }
        return view('users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bidang = Bidang::lists('nama_bidang','id');
        $roles = Role::lists('name','id');

        $user = User::find($id);
        $userRole = $user->roles->lists('id','id')->toArray();
        return view('users.edit',compact('user','roles','userRole','bidang'));
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
        ]);

        User::find($id)->update($request->all());

        $user = User::find($id);       

    
        if ($user->update()) {
          foreach ($request->input('roles') as $key => $value) {
              if ($value==5) {
              $mahasiswa = Mahasiswa::find($id);
              $mahasiswa->no_induk = $user->no_induk;
              $mahasiswa->nama_user = $user->nama_user;
              $mahasiswa->username = $user->username;
              $mahasiswa->email = $user->email;
              $mahasiswa->update();
            }            
          }            
        }

        if (Auth::user()->roles()->first()->name == "Kaprodi") {
           return redirect()->route('users.show',Auth::id())->with('message','profile Dosen updated!');
        }
        if (Auth::user()->roles()->first()->name == "Mahasiswa") {
           return redirect()->route('users.show',Auth::id())->with('message','profile Mahasiswa updated!');
        } 

        if (Auth::user()->roles()->first()->name == "Admin") 
        {              
            $input = $request->all();
            if(!empty($input['password'])){ 
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = array_except($input,array('password'));    
            }
            $user = User::find($id);
            $user->update($input);
            DB::table('role_user')->where('user_id',$id)->delete();

            foreach ($request->input('roles') as $key => $value) {
                $user->attachRole($value);
            }
        
        return redirect()->route('users.index')
                      ->with('success','User updated successfully');
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

    public function detailMhs($id)
    {
        $user = Mahasiswa::find($id);
        return view('users.detailmhs',compact('user'));
    }   

}
