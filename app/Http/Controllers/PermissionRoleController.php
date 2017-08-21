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
        $permissionroles = PermissionRole::orderBy('role_id','ASC')
                        ->paginate(5);
        return view('permissionrole.index',compact('permissionroles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

     /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('display_name','id');
        $permissions = Permission::lists('display_name','id');

        return view('permissionrole.create',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'permission_id' => 'required',
            'role_id' => 'required'
        ]);
        
        $input = $request->all();

        PermissionRole::create($request->all());

        return redirect()->route('permissionrole.index')
                        ->with('success','Permission Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissionrole = PermissionRole::find($id);
        return view('permissionrole.show',compact('permissionrole'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($permissionId, $roleId)
    {
        $permissionrole = PermissionRole::where('permission_id',$permissionId)
                            ->where('role_id', $roleId)->first();

        $roles = Role::lists('display_name','id');
        $permissions = Permission::lists('display_name','id');
        return view('permissionrole.edit',compact('permissionrole','roles','permissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permissionId, $roleId)
    {
        $this->validate($request, [
            'permission_id' => 'required',
            'role_id' => 'required'
        ]);

        $permissionrole = PermissionRole::where('permission_id',$permissionId)
                            ->where('role_id', $roleId)->update([
                                'role_id' => $request->role_id,
                                'permission_id' => $request->permission_id
                            ]);
        return redirect()->route('permissionrole.index')
                      ->with('success','Permission Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PermissionRole::find($id)->delete();
        return redirect()->route('permissionrole.index')
                        ->with('success','Permission Role deleted successfully');
    }
}
