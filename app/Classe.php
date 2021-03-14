<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Classe extends Model
{
   protected $fillable=['id','user_id','classe','groupe','semestre'];
   public $timestamps =false;

   public function user(){
       return $this->belongsTo(User::class,'user_id');
   }
   public static function classe(){
       $user_id=Auth::user()->id;
       $classe=Classe::select('classe','user_id','groupe')->where('user_id',$user_id)->groupBy('classe')->get();
       return $classe;
   }
}
