<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use App\User;
use App\Role;
use DB;
use Hash;
use App\Http\Requests;

class RoleUserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        $role = Role::all();
        $roleusers = RoleUser::orderBy('role_id','ASC')
                        ->paginate(10);
        return view('roleuser.index',compact('roleusers','user','role'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
