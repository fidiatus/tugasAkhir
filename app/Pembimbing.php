<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    protected $table = 'pembimbing';

    protected $fillable = [
        'user_id',
        'nama_mhs',
    	'nim',
        'bidangpkl_id',
        'prodi_id',
        'daftarpkl_id',
        'dosen_id',
    ];
    
    public $timestamps = true;

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function bidangpkl()
    {
        return $this->belongsTo(BidangPkl::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
