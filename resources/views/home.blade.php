@extends('layouts.app')

@section('dashboard')
    active
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Poli Kesehatan Gigi Dan Mulut</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @if (Auth::user()->position == 'dentist')
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3></h3>
                <h4 class="font-weight-bold">+ Kunjungan</h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href={{route('dentist.create')}} class="small-box-footer">Go to <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          @for($i = date('Y'); $i >=  date('Y')-3 ; $i--  )
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{count($kunjungan[$i])}}</h3>
                <h4 class="font-weight-bold">Kunjungan<br><span class="text-warning">Tahun {{$i}}</span></h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href={{route('dentist.record.year', ['year' => $i])}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endfor
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
              <div class="inner">
                <h3></h3>
                <h4 class="font-weight-bold">Guest</h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href={{route('dentist.guest.setting')}} class="small-box-footer">Go to <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      @elseif (Auth::user()->position == 'dentistguest')
        <div class="row">
          @for($g = date('Y'); $g >=  date('Y')-4 ; $g--  )
            @foreach($dentistguests as $guest)
              @if ($guest->tahun == $g)
              <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3></h3>
                    <h4 class="font-weight-bold">Kunjungan<br><span class="text-warning">Tahun {{$g}}</span></h4>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href={{route('guest.record', ['year'=>$g])}} class="small-box-footer">Go to <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              @endif
            @endforeach
          @endfor
        </div>
      @else
      @endif
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection