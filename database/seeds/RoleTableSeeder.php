<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role = [
        	[
        		'name' => 'Admin',
        		'display_name' => 'Administrator',
        		'description' => 'Semua Akses'
        	],
        	[
        		'name' => 'Mahasiswa',
        		'display_name' => 'UserA-Mahasiswa',
        		'description' => 'Sebagian Akses'
        	],
        	[
        		'name' => 'Kaprodi',
        		'display_name' => 'UserB-Kaprodi',
        		'description' => 'Sebagian Akses'
        	]
        ];

        foreach ($role as $key => $value) {
        	Role::create($value);
        }
    }
}
