<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    protected $fillable = [
    	'bidang'
    ];

    public $timestamps = false;

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
