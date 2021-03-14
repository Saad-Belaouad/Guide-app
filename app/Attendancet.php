<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendancet extends Model
{

    public $timestamps =false;
    protected $fillable=['id','cours','user_id','date_a','heure_a','etat'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function ratt(){
return $this->hasOne(Rattrapage::class,'attendance_id');
    }
}
