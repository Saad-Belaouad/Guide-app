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
            <h1 class="m-0 text-dark">Informations sur la séance</h1>
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
   <form id='addseance' method="POST" action="{{route('seance.update',$seance->id)}}">
    @csrf
        <div class="modal-body">
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                    </div>
                    <input type="text" class="form-control"  name="cours" placeholder=" Votre cours  " value='{{$seance->cours}}'>
                                    </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                    </div>
                    <select class="form-control" name="jour">
     @if($days)
      @foreach ($days as $day)
      @if($day == $seance->jour)
          <option  selected>{{$day}}</option>
          @else
          <option >{{$day}}</option>
          @endif

      @endforeach
     @endif

                      </select>


                    </select>
                </div>
            </div>
              <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-clipboard text-info"></i></div>
                    </div>
                    <input type="time" class="form-control"  name="tempsseance" value="{{$seance->tempsseance}}" >
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone-square-alt text-info"></i></div>
                    </div>
                    <input type="time" class="form-control"  name="tempsseancef" placeholder=" Saisir la durée" value="{{$seance->tempsseancef}}">
                </div>
            </div>
            <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone-square-alt text-info"></i></div>
                    </div>
                    <input type="text" class="form-control"  name="nombreseance" placeholder="Nombre des séances"  value="{{$seance->nombreseance}}" >
                </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone-square-alt text-info"></i></div>
                    </div>
                    <input type="text" class="form-control"  name="classe" placeholder=" Saisir le classe" value="{{$seance->classe}}" >
                </div>

                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                        </div>
                        <input type="date" class="form-control"  name="dated" placeholder="date du début" value="{{$seance->dated}}">
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                            </div>
                            <input type="date" class="form-control"  name="datef" placeholder="date du fin" value="{{$seance->datef}}" >
                        </div>
            </div>
            <form method="post">
            <button  type='submit' class="btn btn-success ml-1 "><i class="fas fa-pen-alt"></i></button>
            </form>
    </div>

      </div>
    </div>
  </div>
    </div>
  </div>
</form>
   @endsection


