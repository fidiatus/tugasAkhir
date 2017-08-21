<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    protected $table = 'pembimbing';

    protected $fillable = [
    	'user_id',
    	'nama_mhs',
    	'kelas',
    	'dosen_id',
    	'prodi_id'
    ];
    
    public $timestamps = false;

    public function prodi()
    {
        return $this->hasOne(Prodi::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }
}
