@extends('layouts.interface')

@section('contentheader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gérer l'assiduité</h1>
            @if(Session::has('success2'))
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
    </div>

   @endsection
   @section('content')
   <div class="container">
   <div class="row">

<div class="card col-lg-12">
    <div class="card-header">Chercher les étudiants </div>

    <div class="card-body">

<form action="{{route('attendacest.create')}}" method="GET">
    @csrf

    <div class="row">
        <div class="col-lg-2">
<label class="col-form-label">Classe </label>
        </div>
      <div class="col-lg-4">
          <select  name="query1" class="form-control">

 @foreach ($classes as $classe)
    <option>{{ $classe->classe}} <option>
@endforeach
          </select>
      </div>
      <div class="col-lg-2">
        <label class="col-form-label">Groupe</label>
                </div>
      <div class="col-lg-4">
          <select  name="query2" class="form-control">
@foreach ($classes as $classe )
    <option>{{ $classe->groupe}} <option>
@endforeach
          </select>
      </div>

                <button  type='submit' class="btn  mt-3" style="margin-left:1000px" ><img src="https://img.icons8.com/fluent/30/000000/search-client.png"/> Chercher</button>

</div>

  </form>
    </div>
</div>

   </div>

</div>

{{-- <div style="margin-left: 1000px">
    {{$attendancets->links()}}
  </div> --}}
<script>
    window.setTimeout(function() {
      $("#alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 1500);

 </script>

@endsection

