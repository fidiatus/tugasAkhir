<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', 'HomeController@index');

	Route::resource('users','UserController');

	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['role:Admin']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['role:Admin']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['role:Admin']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['role:Admin']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['role:Admin']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['role:Admin']]);
	
	// =======================================================================================

	Route::get('prodi',['as'=>'prodi.index','uses'=>'ProdiController@index','middleware' => ['role:Admin']]);
	Route::get('prodi/create',['as'=>'prodi.create','uses'=>'ProdiController@create','middleware' => ['role:Admin']]);
	Route::post('prodi/create',['as'=>'prodi.store','uses'=>'ProdiController@store','middleware' => ['role:Admin']]);
	Route::get('prodi/{id}',['as'=>'prodi.show','uses'=>'ProdiController@show']);
	Route::get('prodi/{id}/edit',['as'=>'prodi.edit','uses'=>'ProdiController@edit','middleware' => ['role:Admin']]);
	Route::patch('prodi/{id}',['as'=>'prodi.update','uses'=>'ProdiController@update','middleware' => ['role:Admin']]);
	Route::delete('prodi/{id}',['as'=>'prodi.destroy','uses'=>'ProdiController@destroy','middleware' => ['role:Admin']]);

	// =======================================================================================

	Route::get('grup',['as'=>'grup.index','uses'=>'GrupController@index','middleware' => ['role:Admin']]);
	Route::get('grup/create',['as'=>'grup.create','uses'=>'GrupController@create','middleware' => ['role:Admin']]);
	Route::post('grup/create',['as'=>'grup.store','uses'=>'GrupController@store','middleware' => ['role:Admin']]);
	Route::get('grup/{id}',['as'=>'grup.show','uses'=>'GrupController@show']);
	Route::get('grup/{id}/edit',['as'=>'grup.edit','uses'=>'GrupController@edit','middleware' => ['role:Admin']]);
	Route::patch('grup/{id}',['as'=>'grup.update','uses'=>'GrupController@update','middleware' => ['role:Admin']]);
	Route::delete('grup/{id}',['as'=>'grup.destroy','uses'=>'GrupController@destroy','middleware' => ['role:Admin']]);

	// ========================================================================================

	Route::get('bidang',['as'=>'bidang.index','uses'=>'BidangController@index','middleware' => ['role:Admin']]);	
	Route::get('bidang/create',['as'=>'bidang.create','uses'=>'BidangController@create','middleware' => ['role:Admin']]);
	Route::post('bidang/create',['as'=>'bidang.store','uses'=>'BidangController@store','middleware' => ['role:Admin']]);
	Route::get('bidang/{id}',['as'=>'bidang.show','uses'=>'BidangController@show']);
	Route::get('bidang/{id}/edit',['as'=>'bidang.edit','uses'=>'BidangController@edit','middleware' => ['role:Admin']]);
	Route::patch('bidang/{id}',['as'=>'bidang.update','uses'=>'BidangController@update','middleware' => ['role:Admin']]);
	Route::delete('bidang/{id}',['as'=>'bidang.destroy','uses'=>'BidangController@destroy','middleware' => ['role:Admin']]);

	// ======================================================================================
	
	Route::get('dosen',['as'=>'dosen.index','uses'=>'DosenController@index','middleware' => ['role:Admin']]);	
	Route::get('dosen/create',['as'=>'dosen.create','uses'=>'DosenController@create','middleware' => ['role:Admin']]);
	Route::post('dosen/create',['as'=>'dosen.store','uses'=>'DosenController@store','middleware' => ['role:Admin']]);
	Route::get('dosen/{id}',['as'=>'dosen.show','uses'=>'DosenController@show']);
	Route::get('dosen/{id}/edit',['as'=>'dosen.edit','uses'=>'DosenController@edit','middleware' => ['role:Admin']]);
	Route::patch('dosen/{id}',['as'=>'dosen.update','uses'=>'DosenController@update','middleware' => ['role:Admin']]);
	Route::delete('dosen/{id}',['as'=>'dosen.destroy','uses'=>'DosenController@destroy','middleware' => ['role:Admin']]);

	// ========================================================================================

	Route::get('pembimbing',['as'=>'pembimbing.index','uses'=>'PembimbingController@index','middleware' => ['role:Admin']]);	
	Route::get('pembimbing/create',['as'=>'pembimbing.create','uses'=>'PembimbingController@create','middleware' => ['role:Admin']]);
	Route::post('pembimbing/create',['as'=>'pembimbing.store','uses'=>'PembimbingController@store','middleware' => ['role:Admin']]);
	Route::get('pembimbing/{id}',['as'=>'pembimbing.show','uses'=>'PembimbingController@show']);
	Route::get('pembimbing/{id}/edit',['as'=>'pembimbing.edit','uses'=>'PembimbingController@edit','middleware' => ['role:Admin']]);
	Route::patch('pembimbing/{id}',['as'=>'pembimbing.update','uses'=>'PembimbingController@update','middleware' => ['role:Admin']]);
	Route::delete('pembimbing/{id}',['as'=>'pembimbing.destroy','uses'=>'PembimbingController@destroy','middleware' => ['role:Admin']]);	
	Route::get('/pembimbing/pdf',['as'=>'pembimbing/pdf','uses'=>'PembimbingController@getPdf','middleware' => ['role:Admin']]);

	// ====================================================================================

	Route::get('perusahaan',['as'=>'perusahaan.index','uses'=>'PerusahaanController@index','middleware' => ['role:Admin']]);	
	Route::get('perusahaan/create',['as'=>'perusahaan.create','uses'=>'PerusahaanController@create','middleware' => ['role:Admin']]);
	Route::post('perusahaan/create',['as'=>'perusahaan.store','uses'=>'PerusahaanController@store','middleware' => ['role:Admin']]);
	Route::get('perusahaan/{id}',['as'=>'perusahaan.show','uses'=>'PerusahaanController@show']);
	Route::get('perusahaan/{id}/edit',['as'=>'perusahaan.edit','uses'=>'PerusahaanController@edit','middleware' => ['role:Admin']]);
	Route::patch('perusahaan/{id}',['as'=>'perusahaan.update','uses'=>'PerusahaanController@update','middleware' => ['role:Admin']]);
	Route::delete('perusahaan/{id}',['as'=>'perusahaan.destroy','uses'=>'PerusahaanController@destroy','middleware' => ['role:Admin']]);

	// =====================================================================================
	
	Route::get('permission',['as'=>'permission.index','uses'=>'PermissionController@index','middleware' => ['role:Admin']]);
	Route::get('permission/create',['as'=>'permission.create','uses'=>'PermissionController@create','middleware' => ['role:Admin']]);
	Route::post('permission/create',['as'=>'permission.store','uses'=>'PermissionController@store','middleware' => ['role:Admin']]);
	Route::get('permission/{id}',['as'=>'permission.show','uses'=>'PermissionController@show','middleware' => ['role:Admin']]);
	Route::get('permission/{id}/edit',['as'=>'permission.edit','uses'=>'PermissionController@edit','middleware' => ['role:Admin']]);
	Route::patch('permission/{id}/edit',['as'=>'permission.update','uses'=>'PermissionController@update','middleware' => ['role:Admin']]);
	Route::patch('permission/{id}',['as'=>'permission.destroy','uses'=>'PermissionController@destroy','middleware' => ['role:Admin']]);
	Route::delete('permission/{id}',['as'=>'permission.destroy','uses'=>'PermissionController@destroy','middleware' => ['role:Admin']]);

	// =====================================================================================
	
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['role:Admin']]);
	Route::post('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['role:Admin']]);
	Route::post('users/handle-index',['as'=>'users.handleIndex','uses'=>'UserController@handleIndex','middleware' => ['role:Admin']]);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['role:Admin']]);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['role:Admin|Mahasiswa|Dosen']]);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['role:Admin|Dosen|Mahasiswa']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['role:Admin']]);
	Route::patch('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['role:Admin']]);

	// =====================================================================================

	Route::get('pkl',['as'=>'daftarpkl.index','uses'=>'DaftarPklController@index','middleware' => ['role:Admin|Dosen']]);
	Route::get('pkl/create',['as'=>'daftarpkl.create','uses'=>'DaftarPklController@create','middleware' => ['role:Admin|Mahasiswa']]);
	Route::post('pkl/create',['as'=>'daftarpkl.store','uses'=>'DaftarPklController@store','middleware' => ['role:Admin|Mahasiswa']]);
	Route::get('pkl/{id}',['as'=>'daftarpkl.show','uses'=>'DaftarPklController@show','middleware' => ['role:Admin|Mahasiswa']]);
	Route::get('pkl/{id}/edit',['as'=>'daftarpkl.edit','uses'=>'DaftarPklController@edit','middleware' => ['role:Admin|Mahasiswa']]);
	Route::patch('pkl/{id}/edit',['as'=>'daftarpkl.update','uses'=>'DaftarPklController@update','middleware' => ['role:Admin|Mahasiswa']]);
	Route::patch('pkl/{id}',['as'=>'daftarpkl.destroy','uses'=>'DaftarPklController@destroy','middleware' => ['role:Admin']]);
	Route::get('/daftarpkl/pdf',array('as'=>'daftarpkl/pdf','uses'=>'DaftarPklController@getPdf'));
	Route::post('pkl/importExcel',['as'=>'daftarpkl.importExcel','uses'=>'DaftarPklController@importExcel','middleware' => ['role:Admin']]);
	Route::get('pkl/importExport',['as'=>'daftarpkl.importExport','uses'=>'DaftarPklController@importExport','middleware' => ['role:Admin']]);
	Route::get('pkl/downloadExcel',['as'=>'daftarpkl.downloadExcel','uses'=>'DaftarPklController@downloadExcel','middleware' => ['role:Admin']]);
	
	// =======================================================================================

	Route::get('bidangpkl',['as'=>'bidangpkl.index','uses'=>'BidangPklController@index','middleware' => ['role:Admin']]);	
	Route::get('bidangpkl/create',['as'=>'bidangpkl.create','uses'=>'BidangPklController@create','middleware' => ['role:Admin']]);
	Route::post('bidangpkl/create',['as'=>'bidangpkl.store','uses'=>'BidangPklController@store','middleware' => ['role:Admin']]);
	Route::get('bidanpklg/{id}',['as'=>'bidangpkl.show','uses'=>'BidangPklController@show']);
	Route::get('bidangpkl/{id}/edit',['as'=>'bidangpkl.edit','uses'=>'BidangPklController@edit','middleware' => ['role:Admin']]);
	Route::patch('bidangpkl/{id}',['as'=>'bidangpkl.update','uses'=>'BidangPklController@update','middleware' => ['role:Admin']]);
	Route::delete('bidangpkl/{id}',['as'=>'bidangpkl.destroy','uses'=>'BidangPklController@destroy','middleware' => ['role:Admin']]);
});