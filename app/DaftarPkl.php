<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarPkl extends Model
{
    protected $table = 'daftar_pkl';

    protected $fillable = [        
        'nama_mhs',
        'nim',
    	'prodi_id',
    	'bidangpkl_id',
    	'perusahaan_id',
    	'nama_proyek',
    	'semester',
    	'tahun_ajaran',
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

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
    public function pembimbing()
    {
        return $this->hasOne(Pembimbing::class);
    }
}
