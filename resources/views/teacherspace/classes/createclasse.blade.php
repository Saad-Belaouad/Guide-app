@extends('layouts.interface')
@section('searchform')

@endsection
@section('contentheader')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gérer Mes Classes</h1>
            @if(Session::has('success'))
            <div id='alert' class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Séance bien ajouté! </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif

        <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   @endsection


@section('content')
  <div class="container">
   <div class="row">
<div class="card col-lg-12">
    <div class="card-header text-center">Ajouter une classe</div>
    <div class="card-body">

<form action="{{route('classe.add')}}"  method="POST">
    @csrf
    <div class="row container">
        <div class="col-lg-3">
<label class="col-form-label">Classe</label>

        </div>

      <div class="col-lg-9">
    <input type="text" name="classe" placeholder=" Saisir la classe " class="form-control text-uppercase">
      </div>
            </div>
     <div class="row container">
        <div class="col-lg-3">
<label class="col-form-label">Groupe</label>

        </div>

      <div class="col-lg-9 mt-2">
    <input type="number" name="groupe"  class="form-control">
      </div>
            </div>
     <div class="row container">
        <div class="col-lg-3">
<label class="col-form-label">Semestre</label>

        </div>

      <div class="col-lg-9 mt-2">
    <input type="number" name="semestre"  class="form-control">
      </div>
            </div>

    <div class="row">
                     <button type="submit"   class=" btn btn-success mt-3" style="margin-left:1000px" >Ajouter</button>
                       </div>

    </form>
        </div>
    </div>
       </div>
      </div>
        </div>
      </div>

@endsection
