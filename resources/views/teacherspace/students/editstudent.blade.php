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
            <h1 class="m-0 text-dark">Informations sur l'étudiant</h1>
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
   <form id='addseance' method="POST" action="{{route('student.update',$student->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="jumbotron">
        <div class="form-group">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Prénom</div>
                </div>
                <input type="text" class="form-control"  name="f_name" required  value="{{$student->f_name}}">
                                </div>
             <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Nom</div>
                </div>
                <input type="text" class="form-control"  name="l_name"  required value="{{$student->l_name}}">
                                </div>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Date de naissance</div>
                </div>
                <input type="date" class="form-control"  name="date_s"  value="{{$student->date_s}}" required>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Sexe</div>
                </div>
                <select class="form-control"  name="sexe" >
                    <option>Homme</option>
                     <option>Femme</option>

                    </select>
            </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">CNE</div>
                </div>
                <input type="text" class="form-control"  name="code_s"  required  value="{{$student->code_s}}">
            </div>
        <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Classe</div>
                </div>
               <select name="classe_s" class='form-control'>
                   <option selected>{{$student->classe}}</option>
            </select>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Groupe</div>
                </div>
               <select name="groupe_s" class='form-control'>
                   <option selected>{{$student->groupe}}</option>


            </select>
            </div>
             <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Niveau d'étude</div>
                </div>
               <select name="level_s" class='form-control' required>
<option>1er</option>
<option>2eme</option>
<option>3eme</option>
<option>4eme</option>
<option>5eme</option>

            </select>
            </div>


                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Image</div>
                        </div>
                        <input type="file" class="form-control"  name="pic_s" value="{{$student->pic_s}}" >
                    </div>
                        <span><img  style="width: 90px; height: 90px; margin-left:40px; " src="{{asset('images/students/'.$student->pic_s)}}"></span>

        <div class="modal-footer">
      <button type="submit"  class="btn btn-success" id="ajouterseance" href="" >Editer</button>
    </div>
</div>

  </div>
</div>
</div>
</div>
</div>
</form>
</div>
  </div>
</div>
@endsection


