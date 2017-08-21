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
}
