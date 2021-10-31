@extends('layouts.app')

@section('guestmenu')
menu-open
@endsection

@section('guestsetting')
active
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Guest</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
              <li class="breadcrumb-item active">Guest Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-dark border border-dark">
              <div class="card-header">
                <h3 class="card-title">Hak Akses</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('dentist.guest.permission')}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12">
                          @if (session('hakakses'))
                            <div class="alert alert-info">
                              {{ session('hakakses') }}
                            </div>
                          @endif
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        @for ($i = date('Y'); $i >= date('Y')-4 ; $i--)
                            <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="tahun{{$i}}" type="checkbox" id="tahun{{$i}}" value=1
                                @foreach ($guests as $guest)
                                  @if ($guest->tahun == $i AND $guest->cektahun == 1) checked @endif
                                @endforeach
                                >
                                <label for="tahun{{$i}}" class="custom-control-label">Tahun {{$i}}</label>
                              </div>
                            </div>
                        @endfor
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right p-0">
                  <button type="submit" class="btn btn-block btn-dark">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-dark border border-dark">
              <div class="card-header">
                <h3 class="card-title">Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('dentist.guest.password')}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                          @if (session('password'))
                            <div class="alert alert-info">
                              {{ session('password') }}
                            </div>
                          @endif
                            <div class="form-group">
                              <label for='password'>Password</label>
                              <input class="form-control" type="password" name='password' id='password' Placeholder='--password guest account--'>
                                @error('password')
                                  <div class="text text-danger">Password</div>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for='expired'>Date Expired</label>
                              <input class="form-control" type="date" name='expired' id='expired' value="{{ old('expired') ?? $guestaccount->expired}}" Placeholder='--date expired--'>
                                @error('expired')
                                  <div class="text text-danger">Date expired</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right p-0">
                  <button type="submit" class="btn btn-block btn-dark">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
