<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Exports\StudentsExport;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;
class StudentController extends Controller
{

    function savepic($photo,$folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id=Auth::user()->id;
        $classes=Classe::classe();
        $students=Student::select('id','f_name','l_name','classe','groupe','level_s','pic_s','user_id','code_s','date_s')->where('user_id',$user_id)->paginate(5);

        return view('teacherspace.students.indexstudents',compact('classes','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file_name = $this->savepic($request->pic_s, 'images/students');
        $userid=Auth::user()->id;
        Student::create([
            'pic_s' => $file_name,
            'f_name' => $request->f_name,
            'l_name' =>   $request->l_name,
            'classe' =>  $request->classe_s,
            'groupe' => $request->groupe_s,
            'level_s' => $request->level_s,
            'code_s' => $request->code_s,
            'date_s'=> $request->date_s,
            'user_id' =>$userid,

        ]);

        return redirect()->route('student.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $userid=Auth::user()->id;
        $students=Student::select('id','f_name','l_name','classe','groupe','level_s','pic_s','user_id','code_s','date_s')->where('user_id',$userid)->paginate(5);
        return view("teacherspace.students.showstudents",compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student_id)
    {
        $user_id=Auth::user()->id;
        $student=Student::find($student_id);
        $classes=Classe::classe();

        $student=Student::select('id','f_name','l_name','classe','groupe','level_s','pic_s','user_id','code_s','date_s')->find($student_id);
        return view('teacherspace.students.editstudent',compact('student'));
    }
    public function search(){
        $user_id=Auth::user()->id;
        $query_text = $_GET['query'];
        $students=Student::select('id','f_name','l_name','classe','groupe','level_s','pic_s','user_id','code_s','date_s')->where([
            'user_id'=>$user_id,'classe'=>$query_text])->paginate(20);

  return view('teacherspace.students.showstudents',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$student_id)
    {
        $student = Student::find($student_id);
        if (!$student)
            return redirect()->back();


        $student->update($request->all());
        $file_name = $this->savepic($request->pic_s, 'images/students');
          $student->pic_s=$file_name;
        $student->save();
        return redirect()->route('student.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id)
    {
    $student=Student::find($student_id);
    if(!$student)
        return redirect()->back();
    $student->delete();
    return redirect()->route('student.show');



    }
    public function exportexcel(){
        return Excel::download(new StudentsExport,'studentlist.xlsx');
    }
}
