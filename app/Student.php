<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
   protected  $fillable=['id','f_name','l_name','classe','groupe','level_s','pic_s','user_id','code_s','date_s'];
   public $timestamps =false;

   public function user(){
       return $this->belongsTo(User::class,'user_id');
   }
   public static function getstudent(){
    $user_id=Auth::user()->id;
    $students=DB::table('students')->select('code_s','l_name','f_name','date_s','classe','groupe')->where('user_id',$user_id)->paginate(5);
return $students;
   }


}
