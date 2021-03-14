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

<form method="POST" action="{{route('attendacest.store')}}" >
    @csrf
<div class="col-lg-2 ">
    <label class="col-form-label">Séance</label>
            </div>
  <div class="col-lg-4 ">
    <select  name="query4" class="form-control">
        @foreach ($seances as $seance )
            <option>{{ $seance->cours}} <option>
        @endforeach
                  </select>
  </div>
<div class="col-lg-2 ">
    <label class="col-form-label">Date de séance</label>
            </div>
  <div class="col-lg-4 ">
      <input  type='date' class="form-control" name="date_a"  >
      </div>
  </div>
                <table class="table table-sm table-bordered table-hover mt-2">
        <thead class="thead-light">
          <tr>
            <th scope="col">CNE</th>
            <th scope="col">Nom </th>
            <th scope="col">Prénom</th>
            <th scope="col">Etat</th>
            <th scope="col">Durée de retard</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <input hidden type="text" class="form-control"  name="student_id[]" value="{{$student->id}}">

            <tr>
              <input hidden type="text"  name="code_s[]" value="{{$student->code_s}}" >
              <input hidden type="text"  name="f_name[]" value="{{$student->f_name}}" >
              <input hidden type="text"  name="l_name[]" value="{{$student->l_name}}" >

              <td>{{$student->code_s}}</td>
              <td>{{$student->l_name}}</td>
              <td >{{$student->f_name}}</td>
  <td>
    <select class="form-control"  name="etat[]" >
        <option>Absent</option>
                                <option>Present</option>
                                <option>Retard</option>

        </select>

  </td>
<td>
<input  type="text" class="form-control col-9"  name="time_rt[]" >

</td>
      </tr>
            @endforeach
        </tbody>

      </table>
          <button type="submit" class="btn btn-info" >Marquer</button>

      </div>

                      </form>

   @endsection

