@extends('layouts.interface')

@section('contentheader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails</h1>
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
     <h5 class="text-center font-italic text-danger">Assiduité de mes éudiants</h5>
     <table class="table table-sm table-bordered table-hover">
   <thead class="thead-light">
     <tr>
       <th scope="col">CNE</th>
       <th scope="col">Nom </th>
       <th scope="col">Prénom</th>
       <th>Date</th>
       <th scope="col">Détails</th>


     </tr>
   </thead>
   <tbody>
       @foreach ($attendancests as $attendance)
       <tr>
         <td>{{$attendance->code_s}}</td>
         <td>{{$attendance->l_name}}</td>
         <td>{{$attendance->f_name}}</td>
         <td >{{$attendance->date_a}}  </td>
         <td >{{$attendance->etat .'('.$attendance->time_rt.')' }} </td>
 </tr>
       @endforeach
   </tbody>

 </table>

 </div>
         </div>
       </div>




  <script>
    window.setTimeout(function() {
      $("#alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 1500);

 </script>
   @stop
