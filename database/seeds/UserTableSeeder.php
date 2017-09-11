<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = [
        	[
        		'no_induk' => '101',
        		'nama_user' => 'admin',
        		'username' => 'admin',
                'email' => 'admin@gmail.com',
        		'password' => '123456'
        	]
        ];

        foreach ($user as $key => $value) {
        	User::create($value);
        }
    }
}
