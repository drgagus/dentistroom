<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dentist Room</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset ('plugins/fontawesome-free/css/all.min.css') }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset ('dist/css/adminlte.min.css') }}>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-arrow-alt-circle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          @if(Auth::user()->position == 'dentist')
          <a href={{route('dentist')}} class="dropdown-item">
            <i class="fas fa-clinic-medical mr-2"></i>Beranda
          </a>
          <a href={{route('dentist.create')}} class="dropdown-item">
            <i class="fas fa-folder-plus mr-2"></i> +Kunjungan
          </a>
          <a href={{route('dentist.record.year', ['year' => date('Y')])}} class="dropdown-item">
            <i class="fas fa-tooth mr-2"></i> Kunjungan Tahun {{date('Y')}}
          </a>
          <a href={{route('setting')}} class="dropdown-item">
            <i class="fas fa-user-cog  mr-3"></i>Pengaturan
          </a>
          @elseif (Auth::user()->position == 'dentistguest')
          <a href={{route('guest')}} class="dropdown-item">
            <i class="fas fa-clinic-medical mr-2"></i>Beranda
          </a>
          @for($i = date('Y'); $i >=  date('Y')-4 ; $i--  )
            @foreach($dentistguests as $guest)
              @if ($guest->tahun == $i)
          <a href={{route('guest.record', ['year' => $i])}} class="dropdown-item">
            <i class="fas fa-tooth mr-2"></i>Kunjungan Tahun {{$i}}
              @endif
            @endforeach
          @endfor
          </a>
          @else
          @endif
          <div class="dropdown-divider"></div>
          <a href={{route('logout')}} class="dropdown-item" data-toggle="modal" data-target="#modal-logout">
              <i class="fas fa-sign-out-alt  mr-3"></i>Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('storage/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href={{route('home')}} class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->position == 'dentist')
          <li class="nav-item">
            <a href={{route('dentist')}} class="nav-link @yield('dashboard' ?? '')">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{route('dentist.create')}} class="nav-link @yield('tambahkunjungan' ?? '')">
              <i class="nav-icon fas fa-folder-plus"></i>
              <p>
                +Kunjungan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview @yield('record' ?? '')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Kunjungan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @for($i = date('Y'); $i >=  date('Y')-1 ; $i--  )
              <li class="nav-item ml-2">
                <a href={{route('dentist.record.year', ['year'=> $i] )}} class="nav-link @yield('record'.$i)">
                  <i class="text-primary fas fa-tooth nav-icon"></i>
                  <p>Tahun {{$i}}</p>
                </a>
              </li>
                @endfor
            </ul>
          </li>         
          <li class="nav-item has-treeview @yield('guestmenu' ?? '')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun Guest
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item has-treeview ml-2 @yield('guestrecord' ?? '')">
                <a href="#" class="nav-link">
                  <i class="text-warning fas fa-book-medical nav-icon"></i>
                  <p>
                    Kunjungan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    @for($i = date('Y'); $i >=  date('Y')-4 ; $i--  )
                      @foreach($dentistguests as $guest)
                        @if ($guest->tahun == $i)
                          <li class="nav-item ml-4">
                            <a href={{route('dentist.guest.record', ['year' => $i])}} class="nav-link @yield('guestrecord'.$i)">
                              <i class="text-danger fas fa-tooth nav-icon"></i>
                              <p>Tahun {{$i}}</p>
                            </a>
                          </li>
                        @endif
                      @endforeach
                    @endfor
                </ul>
              </li>
              <li class="nav-item ml-2">
                <a href={{route('dentist.guest.setting')}} class="nav-link @yield('guestsetting' ?? '')">
                  <i class="fas fa-user-cog nav-icon text-warning"></i>
                  <p>Guest Setting</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @yield('etcmenu' ?? '')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Lainnya
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-2">
                <a href={{route('dentist.village')}} class="nav-link @yield('village' ?? '')">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Desa/Kelurahan</p>
                </a>
              </li>
              <li class="nav-item ml-2">
                <a href={{route('dentist.school')}} class="nav-link @yield('school' ?? '')">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Sekolah</p>
                </a>
              </li>
              <li class="nav-item ml-2">
                <a href={{route('dentist.diagnosa')}} class="nav-link @yield('diagnosa' ?? '')">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Diagnosa</p>
                </a>
              </li>
              <li class="nav-item ml-2">
                <a href={{route('dentist.treatment')}} class="nav-link @yield('treatment' ?? '')">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Tindakan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href={{route('setting')}} class="nav-link @yield('setting' ?? '')">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
          @elseif (Auth::user()->position == 'dentistguest')
          <li class="nav-item">
            <a href={{route('guest')}} class="nav-link @yield('dashboard' ?? '')">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview @yield('guestrecord' ?? '')">
            <a href="#" class="nav-link">
              <i class="fas fa-book-medical nav-icon"></i>
              <p>
                    Kunjungan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                    @for($i = date('Y'); $i >=  date('Y')-4 ; $i--  )
                      @foreach($dentistguests as $guest)
                        @if ($guest->tahun == $i)
                      <li class="nav-item ml-2">
                        <a href={{route('guest.record', ['year' => $i])}} class="nav-link @yield('guestrecord'.$i)">
                          <i class="text-danger fas fa-tooth nav-icon"></i>
                          <p>Tahun {{$i}}</p>
                        </a>
                      </li>
                        @endif
                      @endforeach
                    @endfor
            </ul>
          </li>
          @else
          @endif
          <li class="nav-item">
            <a href={{route('about')}} class="nav-link  @yield('about' ?? '')" >
              <i class="nav-icon fas fa-info-circle"></i>
              <p>Tentang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{route('logout')}} class="nav-link" data-toggle="modal" data-target="#modal-logout">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
@yield('content' ?? '')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Aplikasi Poli Kesehatan Gigi dan Mulut</b> Versi 1.0
    </div>
    <strong>Copyright &copy; <a href="https://drgagus.github.io" class="text-decoration-none" target=_blank >drg.agus</a> <?= date('Y');?>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- -----START MODAL LOGOUT----- -->
<div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">LOGOUT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action={{route('logout')}} class="dropdown-item" method="post">
                  @csrf
                  Yakin Ingin Keluar Dari Aplikasi Ini?
            </div>
            <div class="modal-footer text-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- -----END MODAL LOGOUT----- -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src={{ asset ('plugins/jquery/jquery.min.js') }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- bs-custom-file-input -->
<script src={{ asset ('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset ('dist/js/adminlte.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset ('dist/js/demo.js') }}></script>
<!-- jQuery UI -->
<script src={{ asset ('plugins/jquery-ui/jquery-ui.min.js') }}></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script> -->
</body>
</html>
