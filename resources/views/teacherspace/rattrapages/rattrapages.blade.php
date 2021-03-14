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
  <div  class="row">
    <div class="card col-lg-12">
        <div class="card-header">Ajouter un rattrapage</div>

        <div class="card-body">

            <div class="container">
                <h5 class="text-center">Planifier un rattrapage  </h5>
                <table class="table table-sm table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Séance</th>
                  <th scope="col">Date</th>
                  <th scope="col">Heure</th>
                  <th scope="col"></th>


                </tr>
              </thead>
              <tbody>
                  @foreach ($attendancets as $attendancet)
                  <tr>
                    <td >{{$attendancet->cours}}</td>
                    <td>{{$attendancet->date_a}}</td>
                    <td>{{$attendancet->heure_a}}</td>

                    <td >
<!-- Button trigger modal -->
<a  href="{{route('rattrapage.palnifier',$attendancet->id)}}"  class="btn btn-success">
    Planifier
</a>


@endforeach

                        </td>
                      </tr>
                  </tbody>
                    </table>
                </div>
            </div>
        <div style="margin-left: 500px">
    {{$attendancets->links()}}
  </div>
        </div>
      </div>
      </div>
      </div>
      <div class="container">
        <div  class="row">
          <div class="card col-lg-12">

              <div class="card-body">

                  <div class="container">
                      <h5 class="text-center">Les séances de rattrapage</h5>
                      <table class="table table-sm table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Séance</th>
                        <th scope="col">Date de rattrapage</th>
                        <th scope="col">Heure de rattrapage</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Action</th>


                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($rattrapages as $rattrapage)
                        <tr>
                            <td >{{$rattrapage->cours}}</td>
                          <td > {{$rattrapage->date_r}}</td>
                          <td>  {{ 'De : ' .$rattrapage->heure_rd  .' à: '.$rattrapage->heure_rd}} </td>
                          @if($rattrapage->etat == 'En cours')
                          <td><div class="badge badge-danger">{{$rattrapage->etat}}</div></td>
                          @else
                          <td><div class="badge badge-success">{{$rattrapage->etat}}</div></td>
                          @endif
                          <td >
                            <form method="GET" >
                           <a  type='button'   href="{{route("rattrapage.edit",$rattrapage->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/edit.png"/></a>
                            @csrf
                            @method('DELETE')
                            <a onclick="return confirm('Êtes-vous sûr de  de supprimer cette séance ?') ;  " href="{{route('rattrapage.delete',$rattrapage->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/trash.png"/></a>
                       </form>


                       </td>
      <!-- Button trigger modal -->




      @endforeach
                            </tr>
                        </tbody>
                          </table>
                      </div>
                  </div>
              <div style="margin-left: 500px">
          {{$rattrapages->links()}}
        </div>
              </div>
            </div>
            </div>
            </div>

   @endsection
