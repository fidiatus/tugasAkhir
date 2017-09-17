<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PermissionRole;
use App\Permission;
use App\Role;
use DB;
use Hash;
use App\Http\Requests;

class PermissionRoleController extends Controller
{
    public function index(Request $request)
    {
        $permission = Permission::all();
        $role = Role::all();
        $permissionroles = PermissionRole::orderBy('permission_id','ASC')
                        ->paginate(10);
        return view('permissionrole.index',compact('permissionroles','permission','role'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
