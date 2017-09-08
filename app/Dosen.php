<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
   protected $table = 'dosen';

    protected $fillable = [
    	'nip',
    	'nama_dosen',
    	'bidang_id'
    ];
    
    public $timestamps = false;
    
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class);
    }

}
