<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $permission = [
        	[
        		'name' => 'data role',
        		'display_name' => 'akses data role',
        		'description' => 'melihat data Role'
        	],
        	[
        		'name' => 'tambah data role',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'edit data role',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'hapus data role',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'list data grup',
        		'display_name' => 'mengakses data grup',
        		'description' => 'melihat data grup'
        	],
        	[
        		'name' => 'menambah grup',
        		'display_name' => 'Create grup',
        		'description' => 'Create New grup'
        	],
        	[
        		'name' => 'mengupdate grup',
        		'display_name' => 'Edit grup',
        		'description' => 'Edit grup'
        	],
        	[
        		'name' => 'menghapus grup',
        		'display_name' => 'Delete grup',
        		'description' => 'Delete grup'
        	]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
