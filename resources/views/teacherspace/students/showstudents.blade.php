@extends('layouts.interface')
@section('searchform')
<form class="form-inline ml-3" method="GET"  action="{{route('student.search')}}">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-primary text-uppercase font-weight-bold">Mes Etudiants</h1>
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
   <a href="{{route('student.exportexcel')}}" style="margin-left: 1000px"> <img src="https://img.icons8.com/dusk/30/000000/ms-excel.png"/>Exporter Excel</a>
    <h5 class="text-center font-italic text-danger">Mes Etudiants</h5>
    <table class="table table-sm table-bordered table-hover">
  <thead class="thead-light">
    <tr>
        <th scope="col">Image</th>
      <th scope="col">CNE</th>
      <th scope="col">Nom </th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de Naissance</th>
      <th scope="col">Classe</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
      @foreach ($students as $student)
      <tr>
        <td ><img  style="width: 90px; height: 90px; margin-left:40px; " src="{{asset('images/students/'.$student->pic_s)}}"></td>
        <td>{{$student->code_s}}</td>
        <td>{{$student->l_name}}</td>
        <td>{{$student->f_name}}</td>
        <td >{{$student->date_s}}  </td>
        <td >{{$student->classe . ' Groupe : ' . $student->groupe . ' S : ' .$student->groupe }} </td>

        <td >
            <form method="GET" >
           <a  href="{{route('student.edit',$student->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/edit.png"/></i></a>
            @csrf
            @method('DELETE')
            <a onclick="return confirm('Êtes-vous sûr de  de supprimer ce etudiant ?') ;  "href="{{route('student.delete',$student ->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/trash.png"/></a>
       </form>



       </td>
</tr>
      @endforeach
  </tbody>

</table>

</div>
        </div>
      </div>

<div style="margin-left: 1000px">
    {{$students->links()}}
  </div>
<script>
    window.setTimeout(function() {
      $("#alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 1500);

 </script>

@endsection
