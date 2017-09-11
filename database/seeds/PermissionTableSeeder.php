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
        		'name' => 'create-role',
        		'display_name' => 'create-role',
        		'description' => 'tambah data Role'
        	],
        	[
        		'name' => 'edit-role',
        		'display_name' => 'edit-Role',
        		'description' => 'ubah New Role'
        	],
        	[
        		'name' => 'delete-role',
        		'display_name' => 'delete-Role',
        		'description' => 'hapus Role'
        	],
            [
                'name' => 'create-user',
                'display_name' => 'create-user',
                'description' => 'tambah data user'
            ],
            [
                'name' => 'edit-user',
                'display_name' => 'edit-user',
                'description' => 'ubah New user'
            ],
            [
                'name' => 'delete-user',
                'display_name' => 'delete-user',
                'description' => 'hapus user'
            ],
            [
                'name' => 'create-bidang',
                'display_name' => 'create-bidang',
                'description' => 'tambah data bidang'
            ],
            [
                'name' => 'edit-bidang',
                'display_name' => 'edit-bidang',
                'description' => 'ubah New bidang'
            ],
            [
                'name' => 'delete-bidang',
                'display_name' => 'delete-bidang',
                'description' => 'hapus bidang'
            ],
            [
                'name' => 'create-pkl',
                'display_name' => 'create-pkl',
                'description' => 'tambah data pkl'
            ],
            [
                'name' => 'edit-pkl',
                'display_name' => 'edit-pkl',
                'description' => 'ubah New pkl'
            ],
            [
                'name' => 'delete-pkl',
                'display_name' => 'delete-pkl',
                'description' => 'hapus pkl'
            ],
            [
                'name' => 'create-perusahaan',
                'display_name' => 'create-perusahaan',
                'description' => 'tambah data perusahaan'
            ],
            [
                'name' => 'edit-perusahaan',
                'display_name' => 'edit-perusahaan',
                'description' => 'ubah New perusahaan'
            ],
            [
                'name' => 'delete-perusahaan',
                'display_name' => 'delete-perusahaan',
                'description' => 'hapus perusahaan'
            ],
            [
                'name' => 'create-bidangpkl',
                'display_name' => 'create-bidangpkl',
                'description' => 'tambah data bidangpkl'
            ],
            [
                'name' => 'edit-bidangpkl',
                'display_name' => 'edit-bidangpkl',
                'description' => 'ubah New bidangpkl'
            ],
            [
                'name' => 'delete-bidangpkl',
                'display_name' => 'delete-bidangpkl',
                'description' => 'hapus bidangpkl'
            ],
            [
                'name' => 'create-dosen',
                'display_name' => 'create-dosen',
                'description' => 'tambah data dosen'
            ],
            [
                'name' => 'edit-dosen',
                'display_name' => 'edit-dosen',
                'description' => 'ubah New Role'
            ],
            [
                'name' => 'delete-dosen',
                'display_name' => 'delete-dosen',
                'description' => 'hapus dosen'
            ],
            [
                'name' => 'create-pembimbing',
                'display_name' => 'create-pembimbing',
                'description' => 'tambah data pembimbing'
            ],
            [
                'name' => 'edit-pembimbing',
                'display_name' => 'edit-pembimbing',
                'description' => 'ubah New pembimbing'
            ],
            [
                'name' => 'delete-pembimbing',
                'display_name' => 'delete-pembimbing',
                'description' => 'hapus pembimbing'
            ],
            [
                'name' => 'create-prodi',
                'display_name' => 'create-prodi',
                'description' => 'tambah data prodi'
            ],
            [
                'name' => 'edit-prodi',
                'display_name' => 'edit-prodi',
                'description' => 'ubah New prodi'
            ],
            [
                'name' => 'delete-prodi',
                'display_name' => 'delete-prodi',
                'description' => 'hapus prodi'
            ],
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
        /*test_admin*/
        $user=User::all()->first();
        $user->attachRole(1);

        /*test_view*/
        $user = User::find(2);
        $user->attachRole(2);

        /*test_manage*/
        $user = User::find(3);
        $user->attachRole(3);
    }
}
