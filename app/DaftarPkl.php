<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarPkl extends Model
{
    protected $table = 'daftar_pkl';

    protected $fillable = [
        'nim',
        'nama_mhs',
    	'prodi_id',
    	'bidangpkl_id',
    	'perusahaan_id',
    	'nama_proyek',
    	'semester',
    	'tahun_ajaran',
    ];
    
    public $timestamps = false;

    public function prodi()
    {
        return $this->hasOne(Prodi::class);
    }

    public function bidangpkl()
    {
        return $this->hasOne(BidangPkl::class);
    }

    public function grup()
    {
        return $this->hasOne(Grup::class);
    }

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class);
    }
}
