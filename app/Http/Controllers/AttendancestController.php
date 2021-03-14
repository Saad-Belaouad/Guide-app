<?php

namespace App\Http\Controllers;

use App\Attendancest;
use App\Classe;
use App\Exports\AttendancestExport;
use App\Seance;
use App\Student;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendancestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $userid=Auth::user()->id;
        $classes=Classe::select('classe','groupe')->where('user_id',$userid)->groupBy('classe')->get();
        $userid=Auth::user()->id;
        return view('teacherspace.attendancest.attendancest',compact('classes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid=Auth::user()->id;

        $query1=$_GET['query1'];
        $query2=$_GET['query2'];
        $seances=Seance::select('cours','user_id','classe')->where(['user_id'=>$userid,'classe'=>$query1])->get();
        $students=Student::select('id','f_name','l_name','code_s')->where(['user_id'=>$userid,'classe'=>$query1,'groupe'=>$query2])->get();
        return view('teacherspace.attendancest.attendancestsearch',compact('students','seances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid=Auth::user()->id;
        $f_name=$request->f_name;
        $l_name=$request->l_name;
        $etat=$request->etat;
        $code_s=$request->code_s;
        $time_rt=$request->time_rt;
        $student_id=$request->student_id;
        $cours_a=$request->query4;
        $date_a=$request->date_a;
        for($i=0;$i<count($student_id);$i++){
        $savedata=[
            'f_name' => $f_name[$i],
            'l_name' =>  $l_name[$i],
            'code_s' => $code_s[$i],
            'cours_a' => $cours_a,
            'etat' => $etat[$i],
            'time_rt' =>$time_rt[$i],
            'student_id' =>$student_id[$i],
            'date_a'=>$date_a,
            'user_id' => $userid,

        ];

        DB::table('attendancests')->insert($savedata);
    }
return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendancest  $attendancest
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id=Auth::user()->id;
        $attendancests=Attendancest::select('code_s','f_name','l_name','etat','date_a','time_rt','user_id')->where('user_id',$user_id)->get();
      return view('teacherspace.attendancest.attedancestshow',compact('attendancests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendancest  $attendancest
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendancest $attendancest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendancest  $attendancest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendancest $attendancest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendancest  $attendancest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendancest $attendancest)
    {
        //
    }

}
