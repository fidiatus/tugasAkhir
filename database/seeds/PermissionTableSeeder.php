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
        		'display_name' => 'create data role',
        		'description' => 'tambah data Role'
        	],
        	[
        		'name' => 'edit-role',
        		'display_name' => 'edit data Role',
        		'description' => 'ubah New Role'
        	],
        	[
        		'name' => 'delete-role',
        		'display_name' => 'delete data Role',
        		'description' => 'hapus Role'
        	],
            [
                'name' => 'create-user',
                'display_name' => 'create data user',
                'description' => 'tambah data user'
            ],
            [
                'name' => 'edit-user',
                'display_name' => 'edit data user',
                'description' => 'ubah New user'
            ],
            [
                'name' => 'delete-user',
                'display_name' => 'delete data user',
                'description' => 'hapus user'
            ],
            [
                'name' => 'create-bidang',
                'display_name' => 'create data bidang',
                'description' => 'tambah data bidang'
            ],
            [
                'name' => 'edit-bidang',
                'display_name' => 'edit data bidang',
                'description' => 'ubah New bidang'
            ],
            [
                'name' => 'delete-bidang',
                'display_name' => 'delete data bidang',
                'description' => 'hapus bidang'
            ],
            [
                'name' => 'create-pkl',
                'display_name' => 'create data pkl',
                'description' => 'tambah data pkl'
            ],
            [
                'name' => 'edit-pkl',
                'display_name' => 'edit data pkl',
                'description' => 'ubah New pkl'
            ],
            [
                'name' => 'delete-pkl',
                'display_name' => 'delete data pkl',
                'description' => 'hapus pkl'
            ],
            [
                'name' => 'create-perusahaan',
                'display_name' => 'create data perusahaan',
                'description' => 'tambah data perusahaan'
            ],
            [
                'name' => 'edit-perusahaan',
                'display_name' => 'edit data perusahaan',
                'description' => 'ubah New perusahaan'
            ],
            [
                'name' => 'delete-perusahaan',
                'display_name' => 'delete data perusahaan',
                'description' => 'hapus perusahaan'
            ],
            [
                'name' => 'create-bidangpkl',
                'display_name' => 'create data bidangpkl',
                'description' => 'tambah data bidangpkl'
            ],
            [
                'name' => 'edit-bidangpkl',
                'display_name' => 'edit data bidangpkl',
                'description' => 'ubah New bidangpkl'
            ],
            [
                'name' => 'delete-bidangpkl',
                'display_name' => 'delete data bidangpkl',
                'description' => 'hapus bidangpkl'
            ],
            [
                'name' => 'create-dosen',
                'display_name' => 'create data dosen',
                'description' => 'tambah data dosen'
            ],
            [
                'name' => 'edit-dosen',
                'display_name' => 'edit data dosen',
                'description' => 'ubah New Role'
            ],
            [
                'name' => 'delete-dosen',
                'display_name' => 'delete data dosen',
                'description' => 'hapus dosen'
            ],
            [
                'name' => 'create-pembimbing',
                'display_name' => 'create data pembimbing',
                'description' => 'tambah data pembimbing'
            ],
            [
                'name' => 'edit-pembimbing',
                'display_name' => 'edit data pembimbing',
                'description' => 'ubah New pembimbing'
            ],
            [
                'name' => 'delete-pembimbing',
                'display_name' => 'delete data pembimbing',
                'description' => 'hapus pembimbing'
            ],
            [
                'name' => 'create-prodi',
                'display_name' => 'create data prodi',
                'description' => 'tambah data prodi'
            ],
            [
                'name' => 'edit-prodi',
                'display_name' => 'edit data prodi',
                'description' => 'ubah New prodi'
            ],
            [
                'name' => 'delete-prodi',
                'display_name' => 'delete data prodi',
                'description' => 'hapus prodi'
            ],
            [
                'name' => 'edit-field-mhs',
                'display_name' => 'edit field oleh mhs',
                'description' => 'field yang dapat di akses mhs'
            ],
            [
                'name' => 'edit-field-kaprodi',
                'display_name' => 'edit field oleh kaprodi',
                'description' => 'field yang dapat di akses kaprodi'
            ],
            [
                'name' => 'download-pembimbing',
                'display_name' => 'download data pembimbing',
                'description' => 'download pembimbing'
            ],
            [
                'name' => 'download-pkl',
                'display_name' => 'download data pkl',
                'description' => 'download pkl'
            ],
            [
                'name' => 'show-data',
                'display_name' => 'show data oleh user',
                'description' => 'melihat data sesuai role'
            ],
            [
                'name' => 'edit-data',
                'display_name' => 'edit data oleh user',
                'description' => 'ubah data sesuai role'
            ],
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
        
    }
}
