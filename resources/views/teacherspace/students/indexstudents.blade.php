@extends('layouts.interface')
@section('searchform')
<form class="form-inline ml-3" method="GET"  action="">
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
            <h1 class="m-0 text-dark">Ajout des Etudiants</h1>
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

  <!-- Button trigger modal -->
<button type="button" data-toggle="modal" class="btn btn-success" data-target="#emploimodel">Ajouter un étudiant<img src="https://img.icons8.com/dusk/40/000000/students.png"/> </button>

  <!-- Modal -->
  <div class="modal fade" id="emploimodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un Etudiant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id='addseance' method="POST" action="{{route('student.add')}}" enctype="multipart/form-data">
    @csrf
        <div class="modal-body">
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Prénom</div>
                    </div>
                    <input type="text" class="form-control"  name="f_name"  required>
                                    </div>
                 <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nom</div>
                    </div>
                    <input type="text" class="form-control"  name="l_name"  required>
                                    </div>

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Date de naissance</div>
                    </div>
                    <input type="date" class="form-control"  name="date_s" required>
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
                    <input type="text" class="form-control"  name="code_s"  required>
                </div>
            <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Classe</div>
                    </div>
                   <select name="classe_s" class='form-control'>
@foreach($classes as $classe=>$data )
                       <option>{{$data['classe']}}</option>

                       @endforeach

                </select>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Groupe</div>
                    </div>
                   <select name="groupe_s" class='form-control'>

@foreach($classes as $classe=>$data )
                       <option>{{$data['groupe']}}</option>

                       @endforeach
                </select>
                </div>
                 <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Niveau d'étude</div>
                    </div>
                   <select name="level_s" class='form-control'>
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
                            <input type="file" class="form-control"  name="pic_s"  required>
                        </div>
            <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          <button type="submit"  class="btn btn-success" id="ajouterseance" href="" >Ajouter</button>
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

  <div style="margin-left: 1100px">
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
