<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Seance extends Model
{
  protected  $fillable=['id','cours','jour','tempsseance','dated','datef','tempsseancef','classe','user_id','nombreseance'];
  public $timestamps =false;
  public function user(){
      return $this->belongsTo(User::class,'user_id');
  }
  public static function getseances(){
    $userid=Auth::user()->id;
    $seances=Seance::select('cours','jour','tempsseance','dated','datef','tempsseancef','classe','user_id','nombreseance')->where('user_id',$userid)->get();
    return $seances;
}


}
