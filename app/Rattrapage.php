<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rattrapage extends Model
{
    protected $fillable=['id','heure_rd','heure_rf','date_r','etat','attendance_id','user_id','cours'];
    public $timestamps =false;

    public function attendanceseance(){
        return $this->belongsTo(Attendancet::class,'attendance_id');
    }
}
