<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    public $fillable = ['prodi'];
    
    protected $guarded = ['id'];
    
    public function user()
    {
    	return $this->hasMany(User::class);
    }
    public function daftarpkl()
    {
    	return $this->hasMany(DaftarPkl::class);
    }
}
