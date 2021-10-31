@extends('layouts.app')

@section('setting')
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
            <h1 class="m-0 text-dark">Dashboard</h1>
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
        <div class="row p-3">
            @if (Auth::user()->position == 'dentist')
            <div class="col-lg-3">
                <div class="card card-primary card-outline border-bottom border-primary">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        @if(Auth::user()->image)
                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('storage/'.Auth::user()->image)}}"
                                            alt="User profile picture">
                        @else
                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('storage/images/profil/default.jpg')}}"
                                            alt="User profile picture">
                        @endif
                        </div>

                        <h3 class="profile-username text-center">{{Auth::User()->name}}</h3>

                        <p class="text-muted text-center">Dokter Gigi</p>

                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nama</b> <a class="float-right">{{Auth::user()->name ?? ''}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Username</b> <a class="float-right">{{Auth::user()->username ?? ''}}</a>
                        </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            @else
            @endif
            <div class="col-lg-3">
              <div class="card card-dark">
                  <div class="card-header">
                      <h3 class="card-title">Ganti Password</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="post" action={{route('password')}} >
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
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="input-group mt-3">
                                <input type="password" name="old_password" class="form-control" placeholder="--password lama--">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                              </div>
                              @error('old_password')
                                <div class="text text-danger">{{$message}}</div>
                              @enderror
                              <div class="input-group mt-3">
                                <input type="password" name="new_password" class="form-control" placeholder="--password baru--">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                              </div>
                              @error('new_password')
                                <div class="text text-danger">{{$message}}</div>
                              @enderror
                              <div class="input-group mt-3">
                                <input type="password" name="new_password_confirmation" class="form-control" placeholder="--retype password baru--">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                              </div>
                              @error('password_confirmation')
                                <div class="text text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
                  </form>
              </div>
            </div>
            @if (Auth::user()->position == 'dentist')
            <div class="col-lg-3">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Ganti Username</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action={{route('username')}} >
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12">
                            @if (session('username'))
                              <div class="alert alert-info">
                                {{ session('username') }}
                              </div>
                            @endif
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group mt-3">
                                  <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="--username baru--">
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                      </div>
                                  </div>
                                </div>
                                @error('username')
                                  <div class="text text-danger">{{$message}}</div>
                                @enderror
                                <div class="input-group mt-3">
                                  <input type="password" name="password" class="form-control" placeholder="--password--">
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                      </div>
                                  </div>
                                </div>
                                @error('password')
                                  <div class="text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Ganti Photo Profil</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action={{route('photoprofile')}} enctype="multipart/form-data" >
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12">
                            @if (session('photo'))
                              <div class="alert alert-info">
                                {{ session('photo') }}
                              </div>
                            @endif
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" name="photo" id="photo" class="custom-file-input" id="exampleInputFile">
                                      <label class="custom-file-label" for="exampleInputFile">--pilih photo--</label>
                                    </div>
                                  </div>
                                  @error('photo')
                                    <div class="text text-danger">photo harus dipilih (jpg,jpeg,png|max:2MB)</div>
                                  @enderror
                                </div>
                                <div class="input-group mt-3">
                                  <input type="password" name="passsword" class="form-control" placeholder="--password--">
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                      </div>
                                  </div>
                                </div>
                                @error('passsword')
                                  <div class="text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
            @else
            @endif
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection