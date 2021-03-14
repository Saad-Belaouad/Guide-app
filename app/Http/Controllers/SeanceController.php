<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=auth()->user()->id;
        $seances=Seance::select('id','cours','jour','tempsseance','dated','datef','tempsseancef','classe')->where('user_id', $userid);

        return view('teacherspace.emploi.createseances',compact('seances','$userid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $userid=auth()->user()->id;
        $seances=Seance::select('id','cours','jour','tempsseance','dated','datef','tempsseancef','classe','nombreseance')->where('user_id', $userid)->paginate(5);
        $classes=Classe::select('classe','groupe','semestre','user_id')->where('user_id',$userid)->get();
        return view('teacherspace.emploi.createseances',compact('seances','userid','classes'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid=auth()->user()->id;
        Seance::create([
            'cours' => $request->cours,
            'tempsseance' =>$request->tempsseance,
            'dated' =>  $request->dated,
            'datef' => $request->datef,
            'classe'=> $request->classe,
            'jour'=> $request->jour,
            'nombreseance'=> $request->nombreseance,
            'tempsseancef' => $request->tempsseancef,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect()->back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function show($seance_id)
    {
        $seance = Seance::find($seance_id);
        if (!$seance)
            return redirect()->back();
            $seance=Seance::select('id','cours','jour','tempsseance','dated','datef','tempsseancef','classe')->find($seance_id);

        return view('teacherspace.emploi.showseance', compact('seance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function edit($seance_id)
    {
        $seance = Seance::find($seance_id);  // search in given table id only
        if (!$seance)
            return redirect()->back();
  $days=['lundi','mardi','mercredi','jeudi','vendredi','samedi'];
        $seance=Seance::select('id','cours','jour','tempsseance','dated','datef','tempsseancef','classe')->find($seance_id)->find($seance_id);

        return view('teacherspace.emploi.editseance', compact('seance','days'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $seance_id)
    {
        $seance = Seance::find($seance_id);
        if (!$seance)
            return redirect()->back();

        //update data

        $seance->update($request->all());

        return redirect()->route("seances");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function destroy($seance_id)
    {
        $seance = Seance::find($seance_id);   // Offer::where('id','$offer_id') -> first();

        if (!$seance)
            return redirect()->back();

        $seance->delete();

        return redirect()->route('seances');
    }
    public function  search(){
        $query_text=$_GET['query'];
   $userid=Auth::user()->id;
        $seances=Seance::select('id','cours','jour','tempsseance','dated','datef','tempsseancef','classe')->where([
         'user_id'=>$userid,'cours'=>$query_text])->get();

        return view('teacherspace.emploi.seanceseach', compact('seances'));


    }

}
