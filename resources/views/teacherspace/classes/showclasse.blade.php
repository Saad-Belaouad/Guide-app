@extends('layouts.interface')
@section('searchform')
@endsection

@section('contentheader')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mes Classes</h1>
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
<div class="row">
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="120" height="120"
viewBox="0 0 172 172"
style=" fill:#000000;"><defs><linearGradient x1="118.60475" y1="39.98642" x2="125.27692" y2="75.83408" gradientUnits="userSpaceOnUse" id="color-1_SlLFSjF7CKvw_gr1"><stop offset="0" stop-color="#3498db"></stop><stop offset="1" stop-color="#16528c"></stop></linearGradient><linearGradient x1="52.39192" y1="13.41242" x2="65.2955" y2="57.03233" gradientUnits="userSpaceOnUse" id="color-2_SlLFSjF7CKvw_gr2"><stop offset="0" stop-color="#3498db"></stop><stop offset="1" stop-color="#16528c"></stop></linearGradient><linearGradient x1="66.71092" y1="59.46542" x2="91.90175" y2="151.00883" gradientUnits="userSpaceOnUse" id="color-3_SlLFSjF7CKvw_gr3"><stop offset="0" stop-color="#3498db"></stop><stop offset="1" stop-color="#16528c"></stop></linearGradient><linearGradient x1="16.125" y1="47.04558" x2="16.125" y2="72.12892" gradientUnits="userSpaceOnUse" id="color-4_SlLFSjF7CKvw_gr4"><stop offset="0" stop-color="#3498db"></stop><stop offset="1" stop-color="#16528c"></stop></linearGradient><linearGradient x1="125.74992" y1="127.20833" x2="84.57383" y2="127.20833" gradientUnits="userSpaceOnUse" id="color-5_SlLFSjF7CKvw_gr5"><stop offset="0" stop-color="#1ea2e4"></stop><stop offset="1" stop-color="#32bdef"></stop></linearGradient><linearGradient x1="46.25008" y1="127.20833" x2="87.42617" y2="127.20833" gradientUnits="userSpaceOnUse" id="color-6_SlLFSjF7CKvw_gr6"><stop offset="0" stop-color="#1ea2e4"></stop><stop offset="1" stop-color="#32bdef"></stop></linearGradient></defs><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><circle cx="34" cy="16" transform="scale(3.58333,3.58333)" r="5" fill="url(#color-1_SlLFSjF7CKvw_gr1)"></circle><circle cx="16.25" cy="9.25" transform="scale(3.58333,3.58333)" r="6.25" fill="url(#color-2_SlLFSjF7CKvw_gr2)"></circle><path d="M122.47117,82.42383c-10.22325,-0.19708 -19.38583,4.36808 -25.42733,11.62433c-5.01308,-18.10658 -22.2955,-31.1105 -42.36217,-29.39408c-21.027,1.79525 -36.765,20.22075 -36.765,41.32658v40.936c0,3.95958 3.20708,7.16667 7.16667,7.16667h121.83333c3.95958,0 7.16667,-3.20708 7.16667,-7.16667v-31.09258c0,-17.759 -13.85675,-33.05983 -31.61217,-33.40025z" fill="url(#color-3_SlLFSjF7CKvw_gr3)"></path><path d="M11.18717,54.18717c-6.364,6.364 -9.31308,13.73492 -6.58617,16.46542c2.72692,2.72692 10.09783,-0.22217 16.46183,-6.58617c6.364,-6.364 9.31308,-13.73492 6.58617,-16.46542c-2.72692,-2.7305 -10.09783,0.21858 -16.46183,6.58617z" fill="url(#color-4_SlLFSjF7CKvw_gr4)"></path><path d="M121.75808,100.33692c-22.81508,0.96392 -35.75808,10.67117 -35.75808,10.67117v43.07525h35.83333c1.978,0 3.58333,-1.60533 3.58333,-3.58333v-46.57975c0,-2.01025 -1.65192,-3.66933 -3.65858,-3.58333z" fill="url(#color-5_SlLFSjF7CKvw_gr5)"></path><path d="M50.24192,100.33692c22.81508,0.96392 35.75808,10.67117 35.75808,10.67117v43.07525h-35.83333c-1.978,0 -3.58333,-1.60533 -3.58333,-3.58333v-46.57975c0,-2.01025 1.65192,-3.66933 3.65858,-3.58333z" fill="url(#color-6_SlLFSjF7CKvw_gr6)"></path></g></g></svg>
    <table  class="table  table-bordered  table-hover">
        <thead>
          <tr>
            <th scope="col" class='bg-primary'>#</th>
            <th scope="col" class='bg-primary'>Classe</th>
            <th scope="col" class='bg-primary'>Groupe</th>
            <th scope="col" class='bg-primary'>Semestre</th>
            <th  scope="col" class='bg-primary'>Actions</th>
          </tr>
        </thead>
        <tbody>
            @if(isset($classes))
            @php
         $i = 1
     @endphp
                @foreach($classes as $classe)
          <tr>

            <th scope="row">{{$i++ }}</th>
            <td> {{$classe->classe}}</td>
            <td>{{$classe->groupe}}</td>
            <td>S{{$classe->semestre}}</td>
            <td >
             <form method="GET"  >
                     @csrf
             <a onclick="return confirm('Êtes-vous sûr de  de supprimer cette classe ?') ;  " href="{{route('classe.delete',$classe->id)}}"><img src="https://img.icons8.com/bubbles/50/000000/trash.png"/></a>
            </form>



        </td>


        </tr>

          @endforeach
          @endif







        </tbody>
      </table>
       </div>

</div>
    </div>





<div style="margin-left: 1000px">
    {{$classes->links()}}
  </div>
<script>
    window.setTimeout(function() {
      $("#alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 1500);

 </script>

@endsection
