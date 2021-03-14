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
            <h1 class="m-0 text-dark">Modifier mes séaces de rattrapage</h1>
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
    <div class="card-header">Séance planifier</div>

    <div class="card-body">

<form action="{{route('rattrapage.store',$rattrapage->id)}}" method="POST">
    @csrf

    <div class="row">
        <div class="col-lg-2">
<label class="col-form-label">La séance</label>
        </div>
      <div class="col-lg-4">
        <input readonly type="text" class="form-control" placeholder="" name="cours"  value='{{$rattrapage->cours}}'>

      </div>
      <div class="col-lg-2">
        <label class="col-form-label">Heure de début séance</label>
                </div>
      <div class="col-lg-4">
        <input readonly type="time" class="form-control" placeholder=""  name="heure_rd" value="{{$rattrapage->heure_rd}}">
      </div>
      <div class="col-lg-2 mt-2">
        <label class="col-form-label">Date de fin séance</label>
                </div>
      <div class="col-lg-4 mt-2">
        <input readonly type="time" class="form-control" placeholder="" name="heure_rf" value="{{$rattrapage->heure_rf}}" >
    </div>
        <div class="col-lg-2 mt-2">
        <label class="col-form-label">Date de  rattrapage </label>
                </div>
      <div class="col-lg-4 mt-2">
        <input  type="text" class="form-control" placeholder="" name="date_r" value="{{$rattrapage->date_r}}"  readonly>
      </div>
         <div class="col-lg-2 mt-2">
        <label class="col-form-label">Etat </label>
                </div>
      <div class="col-lg-4 mt-2">
        <select  type="text" class="form-control"  name="etat" >
<option>En cours</option>
<option>Déja Fait</option>
        </select>
      </div>

      <button  type='submit' class="btn btn-warning mt-3" style="margin-left:1000px" >Ajouter</button>

</div>

  </form>
    </div>
</div>

   </div>


      </div>
   @endsection


