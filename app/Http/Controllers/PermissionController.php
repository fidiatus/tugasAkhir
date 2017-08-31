<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use DB;
use Hash;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $permissions = DB::table('permissions'); 
        $permissions = Permission::orderBy('id','DESC')->paginate(5);
        return view('permission.index',compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::get();
        return view('permission.create',compact('role'));
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
            'name' => 'required|unique:permissions,name',
            'display_name' => 'required',
            'description' => 'required',
            'role' => 'required',
        ]);
        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();
        
        foreach ($request->input('role') as $key => $value) {
            $permission->attachRole($value);
        }

        return redirect()->route('permission.index')
                        ->with('success','permission created successfully');

    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        $permissionRole = Role::join("role_user","role_user.role_id","=","roles.id")
            ->where("role_user.role_id",$id)
            ->get();
        return view('permission.show',compact('permission','permissionRole'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        $role = Role::get();
        $permissionRole = DB::table("permission_role")
            ->where("permission_role.permission_id",$id)
            ->lists('permission_role.role_id','permission_role.role_id');
        return view('permission.edit',compact('permission','role','permissionRole'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

         DB::table("permission_role")
            ->where("permission_role.permission_id",$id)
            ->delete();
            
        foreach ($request->input('role') as $key => $value) {
            $permission->attachRole($value);
        }
        return redirect()->route('permission.index')
                        ->with('success','Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table("permissions")->where('id',$id)->delete();
        $permission = Permission::where('id','=',$id);
        $permission->delete();
        return redirect()->route('permission.index')
                        ->with('success','Permission deleted successfully');
    }
}