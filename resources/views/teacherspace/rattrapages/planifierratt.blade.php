@extends('layouts.interface')
@section('searchform')
<form class="form-inline ml-3" method="GET"  action="{{route("seance.search")}}">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" name="query" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
@endsection
@section('contentheader')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Planifier Rattrapage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   @endsection

   @section('content')
 <div class="container">
   <div class="row">

<div class="card col-lg-12">
    <div class="card-header">Ajouter absence</div>

    <div class="card-body">

<form action="{{route('rattrapage.store',$attendancet->id)}}" method="POST">
    @csrf

    <div class="row">
        <div class="col-lg-2">
<label class="col-form-label">La séance</label>
        </div>
      <div class="col-lg-4">
        <input readonly type="text" class="form-control" placeholder=""  value='{{$attendancet->cours}}'>

      </div>
      <div class="col-lg-2">
        <label class="col-form-label">Date de séance</label>
                </div>
      <div class="col-lg-4">
        <input readonly type="date" class="form-control" placeholder="" value="{{$attendancet->date_a}}">
      </div>
      <div class="col-lg-2 mt-2">
        <label class="col-form-label">Heure de séance</label>
                </div>
      <div class="col-lg-4 mt-2">
        <input readonly type="time" class="form-control" placeholder="" value="{{$attendancet->heure_a}}" >
    </div>
        <div class="col-lg-2 mt-2">
        <label class="col-form-label">Date de  rattrapage </label>
                </div>
      <div class="col-lg-4 mt-2">
        <input  type="date" class="form-control" placeholder="" name="date_r" >
      </div>
         <div class="col-lg-2 mt-2">
        <label class="col-form-label">Heure de début </label>
                </div>
      <div class="col-lg-4 mt-2">
        <input  type="time" class="form-control" placeholder="" name="heure_rd">
      </div>
        <div class="col-lg-2 mt-2">
        <label class="col-form-label">Heure de fin </label>
                </div>
      <div class="col-lg-4 mt-2">
        <input  type="time" class="form-control" placeholder="" name="heure_rf">
      </div>
      <div class="col-lg-4 mt-2">
      <input type="text" name="etat" hidden value="En cours " >
      </div>
         <div class="col-lg-4 mt-2">
      <input type="text" name="user_id" hidden  value="{{$attendancet->user_id}} " >
      </div>
      <div class="col-lg-4 mt-2">
        <input type="text" name="cours" hidden  value="{{$attendancet->cours}} " >
        </div>
    </div>
                <button  type='submit' class="btn btn-warning mt-3" style="margin-left:1000px" >Ajouter</button>

</div>

  </form>
    </div>
</div>

   </div>


      </div>
   @endsection


