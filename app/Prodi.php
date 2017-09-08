<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    public $fillable = ['prodi'];
        
    public $timestamps = false;
    
    public function user()
    {
    	return $this->hasMany(User::class);
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
