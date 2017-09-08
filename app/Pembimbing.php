<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    protected $table = 'pembimbing';

    protected $fillable = [
    	'nim',
        'nama_mhs',
        'bidangpkl_id',
        'prodi_id',
        'kelas',
        'dosen_id',
    ];
    
    public $timestamps = false;

    public function prodi()
    {
        return $this->hasOne(Prodi::class);
    }

    public function bidangpkl()
    {
        return $this->hasOne(BidngPkl::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
