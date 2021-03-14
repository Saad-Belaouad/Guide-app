<?php

namespace App\Http\Controllers;

use App\Attendancet;
use App\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendancetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=Auth::user()->id;
        $attendancets=Attendancet::select('id','cours','user_id','date_a','heure_a','etat')->where('user_id',$userid)->paginate(5);
        $cours=Seance::select('cours')->where('user_id',$userid)->get();
        return view('teacherspace.attendancet.indexattendancet',compact('cours','attendancets'));
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
    public function store(Request $request)
    {

        Attendancet::create([
            'cours' => $request->cours,
            'date_a' =>$request->date_a,
            'heure_a' =>  $request->heure_a,
            'etat' => $request->etat,
             'user_id'=>Auth::user()->id,
        ]);

        return redirect()->back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendancet  $attendancet
     * @return \Illuminate\Http\Response
     */
    public function show(Attendancet $attendancet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendancet  $attendancet
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendancet $attendancet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendancet  $attendancet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendancet $attendancet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendancet  $attendancet
     * @return \Illuminate\Http\Response
     */
    public function destroy($attendancet_id)
    {
        $attendancet=Attendancet::find($attendancet_id);
        $attendancet->delete();
                 return redirect()->back();

    }
}
