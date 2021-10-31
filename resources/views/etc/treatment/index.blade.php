@extends('layouts.app')

@section('etcmenu')
    menu-open
@endsection

@section('treatment')
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
            <h1 class="m-0 text-dark">Tindakan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
              <li class="breadcrumb-item active">Tindakan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-dark border border-dark">
                <div class="card-header">
                    <h3 class="card-title">Tindakan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action={{route('dentist.treatment')}} class="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                            @if (session('status'))
                                <div class="alert alert-info">
                                {{ session('status') }}
                                </div>
                            @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <input type="text" name="tindakan" id="tindakan" class="form-control" value="{{ old('tindakan') ?? ''}}" placeholder="--tindakan--">
                                @error('tindakan')
                                <div class="text text-danger">tindakan harus diisi</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">TAMBAH</button>
                            </div>
                        </div>
                    </form>
                </div>
                    <!-- /.card-body -->
                <div class="card-footer border-top border-primary p-0">
                        <div class="row p-0">
                            <div class="col-lg-12">
                                <table class="table table-hover text-wrap">
                                    <tr class="">
                                    <th class="text-center">No.</th>
                                    <th class="">Tindakan</th>
                                    </tr>
                                <?php $no = 1; ?>
                                @foreach($treatments as $treatment)
                                    <tr>
                                    <th class="text-center" scope="col">
                                        <div class="btn-group dropright">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$no++}}</button>
                                            <div class="dropdown-menu p-0">
                                                <a class="dropdown-item bg-warning" href={{route('dentist.treatment.edit', ['id' => $treatment->id])}}>Edit</a>
                                                <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-treatment-{{$treatment->id}}">Hapus</a>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="text-left" scope="col" >{{$treatment->tindakan}}</th>
                                    </tr>
                                @endforeach
                                </table>
                            </div>
                        </div>
                </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- -----START MODAL DELETE TINDAKAN----- -->
@foreach($treatments as $treatment)
<div class="modal fade" id="modal-delete-treatment-{{$treatment->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">HAPUS TINDAKAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action={{route('dentist.treatment.delete', ['id' => $treatment->id])}} class="dropdown-item" method="post">
                  @csrf
                  @method('delete')
                  Yakin Ingin Hapus "<b>{{$treatment->tindakan ?? ''}}</b>" ?
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
@endforeach
<!-- -----END MODAL DELETE TINDAKAN----- -->
@endsection