<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    protected $fillable = [
    	'nama_bidang'
    ];

    public $timestamps = false;

    public function user()
    {
    	return $this->hasMany(User::class);
    }
    public function dosen()
    {
    	return $this->hasMany(Dosen::class);
    }
}
