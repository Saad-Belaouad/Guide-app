<?php

namespace App\Http\Controllers;

use App\Attendancet;
use App\Rattrapage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RattrapageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $attendancets=Attendancet::select('id','cours','user_id','date_a','heure_a','etat')->where('user_id',$user_id)->paginate(20);
        $rattrapages=Rattrapage::select('id','heure_rd','heure_rf','date_r','etat','attendance_id','user_id','cours')->where('user_id',$user_id)->paginate(5);
        return view('teacherspace.rattrapages.rattrapages',compact('attendancets','rattrapages'));

    }
    public function planifier($attendancet_id){
        $attendancet=Attendancet::find($attendancet_id);
    return view('teacherspace.rattrapages.planifierratt',compact('attendancet'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$attendancet_id)
    {
        $user_id=Auth::user()->id;
        Rattrapage::create([
         'attendance_id'=>$attendancet_id,
          'heure_rd'=>$request->heure_rd,
          'heure_rf'=>$request->heure_rf,
          'date_r'=>$request->date_r,
          'etat'=>$request->etat,
          'user_id'=>$user_id,
          'cours'=>$request->cours,


        ]);
        return redirect()->route('rattrapage.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rattrapage  $rattrapage
     * @return \Illuminate\Http\Response
     */
    public function show(Rattrapage $rattrapage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rattrapage  $rattrapage
     * @return \Illuminate\Http\Response
     */
    public function edit($rattrapge_id)
    {
     $rattrapage=Rattrapage::find($rattrapge_id);
     $rattrapage=Rattrapage::select('id','heure_rd','heure_rf','date_r','etat','attendance_id','user_id','cours')->find($rattrapge_id);
     return view('teacherspace.rattrapages.editrattrapage',compact('rattrapage'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rattrapage  $rattrapage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rattrapge_id)
    {
        $rattrapage=Rattrapage::find($rattrapge_id);
        if(!$rattrapage)
        return redirect()->back();
        $rattrapage->update($request->all);
        return redirect()->route('rattrapage.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rattrapage  $rattrapage
     * @return \Illuminate\Http\Response
     */
    public function destroy($rattrapge_id)
    {
        $rattrapage=Rattrapage::find($rattrapge_id);
        $rattrapage->delete();

        return redirect()->route('rattrapage.index');
    }
}
