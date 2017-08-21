<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    public $fillable = [
    'nama_perusahaan',
    'email',
    'telepon',
    'alamat'
    ];

    public $timestamps = false;

    public function daftarpkl()
    {
    	return $this->hasMany(DaftarPkl::class);
    }
}
