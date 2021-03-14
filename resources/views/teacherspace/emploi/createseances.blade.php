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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gérer Mon Emploi du temps</h1>
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#emploimodel"><i class="far fa-calendar-plus"></i><span>Ajouter séance</span> </button>
<span><a href="{{route('exportseancepdf')}}"><img src="https://img.icons8.com/cute-clipart/30/000000/pdf.png"/>Exporter pdf</a></span>

  <!-- Modal -->
  <div class="modal fade" id="emploimodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une séance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id='addseance' method="POST" action="{{route('seanceadd')}}">
    @csrf
        <div class="modal-body">
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text font-weight-light">Cour</div>
                    </div>
                    <input type="text" class="form-control text-uppercase"  name="cours" placeholder=" Votre cours  " required>
                                    </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text font-weight-light">Jour</div>
                    </div>
                    <select class="form-control text-uppercase" name="jour">
                        <option>Lundi</option>
                        <option>Mardi</option>
                        <option>Mercredi</option>
                        <option>Jeudi</option>
                        <option>Vendredi</option>
                        <option>Samedi</option>

                      </select>


                    </select>
                </div>
            </div>
              <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text font-weight-light">Heure de début</div>
                    </div>
                    <input type="time" class="form-control"  name="tempsseance" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text font-weight-light">Heure de fin </div>
                    </div>
                    <input type="time" class="form-control"  name="tempsseancef" placeholder=" Saisir la durée" required>
                </div>
            </div>
            <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text font-weight-light">Nombre de séance</div>
                    </div>
                    <input type="text" class="form-control"  name="nombreseance" placeholder="Nombre des séances"  >
                </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text font-weight-light ">Classe</div>
                    </div>
                    <select class="form-control"  name="classe"  required>
                        @foreach($classes as $classe)
                        <option>{{$classe->classe.'-S'.$classe->semestre.'G('.$classe->groupe.')'}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text font-weight-light">Date de début</div>
                        </div>
                        <input type="date" class="form-control"  name="dated" required>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text font-weight-light">Date d'arrêt</div>
                            </div>
                            <input type="date" class="form-control"  name="datef" placeholder="date du fin" required>
                        </div>
            </div>
            <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          <button type="submit"  class="btn btn-success" id="ajouterseance" href="{{ route('seanceadd')}}" >Ajouter</button>
        </div>
    </div>

      </div>
    </div>
  </div>
    </div>
  </div>
</form>
<span>


</span>
   <div class="row">

<h2 class="text-primary font-italic  ">Mon Emploi </h2>
<table  class="table  table-bordered  table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cours</th>
        <th scope="col">Jour</th>
        <th scope="col">Durée du cours</th>
        <th scope="col">Classe</th>
        <th scope="col">Nombre du séance</th>

        <th  scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @if(isset($seances))
        @php
     $i = 1
 @endphp
            @foreach($seances as $seance)
      <tr>

        <th scope="row">{{$i++ }}</th>
        <td> {{$seance->cours}}</td>
        <td>{{$seance->jour}}</td>
        <td> @php echo  'De : <span class="badge badge-pill badge-success">'. $seance->tempsseance .'</span>'.' à : <span class="badge badge-pill badge-warning">'. $seance->tempsseancef . '</span>' @endphp</td>
        <td>{{$seance->classe}}</td>
        <td>{{$seance->nombreseance}}</td>

       <td >
             <form method="GET" >
            <a  type='button'   href="{{route('seance.show',$seance->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/view-file.png"/></a>
            <a  href="{{route('seance.edit',$seance->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/edit.png"/></i></a>
             @csrf
             @method('DELETE')
             <a onclick="return confirm('Êtes-vous sûr de  de supprimer cette séance ?') ;  "href="{{route('seance.delete',$seance ->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/trash.png"/></a>
            </form>
        </form>



        </td>

    </tr>
      @endforeach
      @endif







    </tbody>
  </table>
   </div>
    </div>
  <div style="margin-left: 1100px">
    {{$seances->links()}}
  </div>
    <script>
  window.setTimeout(function() {
    $("#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 1500);

        </script>

   @endsection
