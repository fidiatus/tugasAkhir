<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUSerTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'no_induk','nama_user',
        'username', 'email',
        'prodi_id','bidang_id',
        'no_hp', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $guarded = ['id'];
    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

     public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Admin')
            {
                return true;
            }
        }
        return false;
    }
    
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function grup()
    {
        return $this->hasOne(Grup::class);
    }
}
