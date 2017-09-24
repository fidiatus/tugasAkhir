<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'no_induk',
        'nama_user','username',
        'email','jenis_kelamin',
        'prodi_id','angkatan','no_hp'
    ];
    
    public $timestamps = true;

    public function mahasiswa()
    {
    	return $this->belongsTo(Mahasiswa::class);
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class);
    }

}
