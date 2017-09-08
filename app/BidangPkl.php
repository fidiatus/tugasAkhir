<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangPkl extends Model
{
    protected $table = 'bidang_pkl';

    protected $fillable = [
    	'bidang_pkl'
    ];

    public $timestamps = false;

    public function daftarpkl()
    {
    	return $this->hasMany(DaftarPkl::class);
    }

    public function pembimbing()
    {
    	return $this->hasMany(Pembimbing::class);
    }
}
