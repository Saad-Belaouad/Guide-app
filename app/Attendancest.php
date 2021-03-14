<?php

namespace App;

use App\Http\Controllers\AttendancetController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Attendancest extends Model
{
    protected $fillable=['id','user_id','f_name','l_name','code_s','date_a','cours_a','etat','time_rt','student_id'];
   public $timestamps =false;

   public function user(){
       return $this->belongsTo(User::class,'user_id');
   }

}
