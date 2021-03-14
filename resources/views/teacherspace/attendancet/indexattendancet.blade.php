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
    <div class="card-header">Ajouter absence</div>

    <div class="card-body">

<form action="{{route('attendancet.add')}}" method="POST">
    @csrf

    <div class="row">
        <div class="col-lg-2">
<label class="col-form-label">La séance</label>
        </div>
      <div class="col-lg-4">
          <select  name="cours" class="form-control">
@foreach ($cours as $cour=>$data)
    <option>{{ $data['cours']}} <option>
@endforeach
          </select>
      </div>
      <div class="col-lg-2">
        <label class="col-form-label">Date de séance</label>
                </div>
      <div class="col-lg-4">
        <input type="date" class="form-control" placeholder="" name="date_a">
      </div>
      <div class="col-lg-2 mt-2">
        <label class="col-form-label">Heure de séance</label>
                </div>
      <div class="col-lg-4 mt-2">
        <input type="time" class="form-control" placeholder="" name="heure_a">
    </div>
    <div class="col-lg-2 mt-2">
        <label class="col-form-label">Etat</label>
                </div>
      <div class="col-lg-4 mt-2">
        <select readonly class="form-control"  name="etat">
<option selected>Absent</option>
        </select>
      </div>
    </div>
                <button  type='submit' class="btn btn-success mt-3" style="margin-left:1000px" ><i  class="fas fa-plus-circle "></i></button>

</div>

  </form>
    </div>
</div>

   </div>


      </div>
<div class="container">
    <h5 class="text-center">Historique de mes séances </h5>
    <table class="table table-sm table-bordered table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">Séance</th>
      <th scope="col">Date</th>
      <th scope="col">Heure</th>
      <th scope="col">Etat</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
      @foreach ($attendancets as $attendancet)
      <tr>
        <td >{{$attendancet->cours}}</td>
        <td>{{$attendancet->date_a}}</td>
        <td>{{$attendancet->heure_a}}</td>

        <td class="badge badge-warning mt-3 mx-4">{{$attendancet->etat}}  </td>

<td>
        <form>
            @csrf
            @method('DELETE')
<span>
    <a onclick="return confirm('Êtes-vous sûr de  de supprimer cette séance ?') ;  "href="{{route('attendancet.delete',$attendancet ->id)}}"  class="btn btn-danger ml-1 "><i class="fas fa-trash"></i></a>
</span>
        </form>
</td>
</tr>
      @endforeach
  </tbody>

</table>

</div>
<div style="margin-left: 1000px">
    {{$attendancets->links()}}
  </div>
<script>
    window.setTimeout(function() {
      $("#alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 1500);

 </script>

@endsection

