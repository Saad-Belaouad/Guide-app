@extends('layouts.interface')
@section('contentheader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">TABLEAU DE BORD             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Acceuil</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   @endsection

   @section('content')


        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  @if($studentcounts)
                    @foreach( $studentcounts as $studentcount)
                        <h3>
                            {{$studentcount}}
                        </h3>

                    @endforeach
                    @else
                    <h3>
                        {{0}}
                    </h3>
@endif
                <p>Etudiants</p>
              </div>
              <div class="icon">
                <i class="ion ">   <img src="https://img.icons8.com/dusk/64/000000/students.png"/> </i>
            </div>
              <a href="{{route('student.show')}}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  @if($classecounts)
                @foreach( $classecounts as $classecount)
                <h3>
                    {{$classecount}}
                </h3>

            @endforeach
            @else
            <h3>
                {{0}}
            </h3>
            @endif


                <p>Classes</p>
              </div>
              <div class="icon">
                <i class="ion"><img src="https://img.icons8.com/dusk/64/000000/university.png"/></i>
              </div>
              <a href="{{route('class.show')}}" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  @if($rattrapagecounts)
                @foreach( $rattrapagecounts as $rattrapagecount)
                <h3>
                    {{$rattrapagecount}}
                </h3>

            @endforeach
            @else
            <h3>
                {{0}}
            </h3>
            @endif
                <p>Séances de rattrapage</p>
              </div>
              <div class="icon">
                <i class="ion "><img src="https://img.icons8.com/cotton/64/000000/task-planning.png"/></i>
              </div>
              <a href="{{route('rattrapage.index')}}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                  @if($attendancecounts)
                @foreach( $attendancecounts as $attendancecount)
                <h3>
                    {{$attendancecount}}
                </h3>

            @endforeach
            @else
            <h3>
                {{0}}
            </h3>
            @endif
                <p>Séance rattées</p>
              </div>
              <div class="icon">
                <i class="ion "><img src="https://img.icons8.com/bubbles/64/000000/cancel.png"/></i>
              </div>
              <a href="{{route('attendancet.index')}}" class="small-box-footer">Plus d'info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

  @endsection

