<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail /*to verify email */
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /* varriable can add it in our database */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function seance(){
        return $this->hasMany(Seance::class,'user_id');
    }
    public function attendacet(){
        return $this->hasMany(Attendancet::class,'user_id');
    }
    public function class(){
        return $this->hasMany(Classe::class,'user_id');
    }
    public function student(){
        return $this->hasMany(Student::class,'user_id');
    }
    public function attendancest(){
        return $this->hasMany(attendancest::class,'user_id');
    }
    public static function  getuser(){
        $user_id=Auth::user()->id;
        $user = User::select('id','name','email')->where('id',$user_id)->get();
        return $user ;

    }
}
