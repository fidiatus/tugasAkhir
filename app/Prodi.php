<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    public $fillable = ['prodi'];
        
    public $timestamps = True;
    
    public function mahasiswa()
    {
    	return $this->hasMany(Mahasiswa::class);
    }
    public function daftarpkl()
    {
    	return $this->hasMany(DaftarPkl::class);
    }

    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class);
    }
}
