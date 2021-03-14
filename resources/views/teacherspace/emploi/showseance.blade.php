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

       <form id='addseance' method="GET">
   @csrf
       <div class="modal-body">
           <div class="form-group">
    <label class='text-secondary'>Cours</label>
                   <input type="text" class="form-control" value='{{$seance->cours }}' readonly>
                                   </div>
                                       <label class="text-secondary">Jour</label>

               <div class="input-group mb-2">
                                   <input type="text" class="form-control"  value='{{$seance->jour}}' readonly>
               </div>
                  <label class="text-secondary">Heure </label>

               <div class="input-group mb-2">
                                   <input type="text" class="form-control"  value='{{'De '.$seance->tempsseance.' à ' . $seance->tempsseancef }}' readonly>
               </div>
            <label class="text-secondary">Date de début de cours</label>

               <div class="input-group mb-2">
                                   <input type="text" class="form-control"  value='{{$seance->dated}}' readonly>
               </div>
            <label class="text-secondary">Date de fin de cours </label>

               <div class="input-group mb-2">
                                   <input type="text" class="form-control"  value='{{$seance->datef}}' readonly>
               </div>

           </div>
           </div>
           <div class="modal-footer">
      <a  type='button'   href="{{route('seances')}}"><img src="https://img.icons8.com/bubbles/50/000000/back.png"/></a>

       </div>
   </div>

     </div>
   </div>
 </div>
   </div>
 </div>
</form>
   @endsection


