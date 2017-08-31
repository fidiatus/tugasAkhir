<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Grup extends Model
{
    protected $table = 'grup';

    public $fillable = [
    'nama_grup'
    'prodi_id',
    'user_id'
    ];

    public $timestamps = false;

    public function daftarpkl()
    {
    	return $this->hasMany(DaftarPkl::class);
    }


    public function prodi()
    {
        return $this->hasOne(Prodi::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
