<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    public function role(){
        return $this->belongsTo('App\Role');

    }
    public function photo(){
        return $this->belongsTo('App\photo');

    }

    // mutator
    public function setPasswordAttribute($password){

        if(!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function isAdmin(){
        if($this->role->name == "adminstrator" && $this->is_active == 1){
            return true;
        }else{
            return false;
        }
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

}
