<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*HERE TO ACCES TO FUNCTION U NEED TO AUTH */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gethome(){
        $user_id=Auth::user()->id;
        $studentcounts = DB::table('students')
             ->select(DB::raw('count(*)  as ress'))
             ->where('user_id', '=',  $user_id)
             ->groupBy('user_id')
             ->first();
             $classecounts = DB::table('classes')
             ->select(DB::raw('count(*)  as ress'))
             ->where('user_id', '=',  $user_id)
             ->groupBy('user_id')
             ->first();
             $rattrapagecounts = DB::table('rattrapages')
             ->select(DB::raw('count(*)  as ress'))
             ->where('user_id', '=',  $user_id)
             ->groupBy('user_id')
             ->first();
             $attendancecounts = DB::table('attendancets')
             ->select(DB::raw('count(*)  as ress'))
             ->where('user_id', '=',  $user_id)
             ->groupBy('user_id')
             ->first();
        return view('/teacherspace/dashboard',compact('studentcounts','classecounts','rattrapagecounts','attendancecounts'));
        }
    public function index()
    {
        return view('auth.login');
    }
    /*get information from users*/
    //  public function get(){
    //      return User::select('name')->get();/*we can add methode like just delete or update */
    //  }


}
