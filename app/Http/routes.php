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
    return view('welcome');
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
	
	Route::get('prodi',['as'=>'prodi.index','uses'=>'ProdiController@index','middleware' => ['role:Admin']]);
	Route::get('prodi/create',['as'=>'prodi.create','uses'=>'ProdiController@create','middleware' => ['role:Admin']]);
	Route::post('prodi/create',['as'=>'prodi.store','uses'=>'ProdiController@store','middleware' => ['role:Admin']]);
	Route::get('prodi/{id}',['as'=>'prodi.show','uses'=>'ProdiController@show']);
	Route::get('prodi/{id}/edit',['as'=>'prodi.edit','uses'=>'ProdiController@edit','middleware' => ['role:Admin']]);
	Route::patch('prodi/{id}',['as'=>'prodi.update','uses'=>'ProdiController@update','middleware' => ['role:Admin']]);
	Route::delete('prodi/{id}',['as'=>'prodi.destroy','uses'=>'ProdiController@destroy','middleware' => ['role:Admin']]);

	Route::get('grup',['as'=>'grup.index','uses'=>'GrupController@index','middleware' => ['role:Admin']]);
	Route::get('grup/create',['as'=>'grup.create','uses'=>'GrupController@create','middleware' => ['role:Admin']]);
	Route::post('grup/create',['as'=>'grup.store','uses'=>'GrupController@store','middleware' => ['role:Admin']]);
	Route::get('grup/{id}',['as'=>'grup.show','uses'=>'GrupController@show']);
	Route::get('grup/{id}/edit',['as'=>'grup.edit','uses'=>'GrupController@edit','middleware' => ['role:Admin']]);
	Route::patch('grup/{id}',['as'=>'grup.update','uses'=>'GrupController@update','middleware' => ['role:Admin']]);
	Route::delete('grup/{id}',['as'=>'grup.destroy','uses'=>'GrupController@destroy','middleware' => ['role:Admin']]);

	Route::get('bidang',['as'=>'bidang.index','uses'=>'BidangController@index','middleware' => ['role:Admin']]);	
	Route::get('bidang/create',['as'=>'bidang.create','uses'=>'BidangController@create','middleware' => ['role:Admin']]);
	Route::post('bidang/create',['as'=>'bidang.store','uses'=>'BidangController@store','middleware' => ['role:Admin']]);
	Route::get('bidang/{id}',['as'=>'bidang.show','uses'=>'BidangController@show']);
	Route::get('bidang/{id}/edit',['as'=>'bidang.edit','uses'=>'BidangController@edit','middleware' => ['role:Admin']]);
	Route::patch('bidang/{id}',['as'=>'bidang.update','uses'=>'BidangController@update','middleware' => ['role:Admin']]);
	Route::delete('bidang/{id}',['as'=>'bidang.destroy','uses'=>'BidangController@destroy','middleware' => ['role:Admin']]);

	Route::get('dosen',['as'=>'dosen.index','uses'=>'DosenController@index','middleware' => ['role:Admin']]);	
	Route::get('dosen/create',['as'=>'dosen.create','uses'=>'DosenController@create','middleware' => ['role:Admin']]);
	Route::post('dosen/create',['as'=>'dosen.store','uses'=>'DosenController@store','middleware' => ['role:Admin']]);
	Route::get('dosen/{id}',['as'=>'dosen.show','uses'=>'DosenController@show']);
	Route::get('dosen/{id}/edit',['as'=>'dosen.edit','uses'=>'DosenController@edit','middleware' => ['role:Admin']]);
	Route::patch('dosen/{id}',['as'=>'dosen.update','uses'=>'DosenController@update','middleware' => ['role:Admin']]);
	Route::delete('dosen/{id}',['as'=>'dosen.destroy','uses'=>'DosenController@destroy','middleware' => ['role:Admin']]);
});