@extends('layouts.app')

@section('record')
menu-open
@endsection

@section('record'.date('Y', strtotime($record->tanggalkunjungan)) )
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
            <h1 class="m-0 text-dark">+Kunjungan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
              <li class="breadcrumb-item active">+kunjungan</li>
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
            <div class="col-lg-12">
                @if (session('status'))
                    <div class="alert alert-info">
                      {{ session('status') }}
                    </div>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-warning border border-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Kunjungan</h3>
                    </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action={{route('dentist.edit', ['id'=> $record->id])}} method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tanggalkunjungan">Tanggal Kunjungan</label>
                                    <input type="date" class="form-control" name="tanggalkunjungan" id="tanggalkunjungan" placeholder="--tanggal kunjungan--" value="{{old('tanggalkunjungan') ?? $record->tanggalkunjungan }}">
                                    @error('tanggalkunjungan')
                                        <div class="text text-danger">tanggal kunjungan harus diisi</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="norm">Nomor Rekam Medik</label>
                                    <input type="text" class="form-control" name="norm" id="norm" placeholder="--nomor rekam medik--" value="{{old('norm') ?? $record->norm}}">
                                    @error('norm')
                                        <div class="text text-danger">nomor rekam medik harus diisi dengan angka</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="--nama--" value="{{old('nama') ?? $record->nama}}">
                                    @error('nama')
                                        <div class="text text-danger">nama harus diisi</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="Laki-laki" {{ old('jeniskelamin') ?? $record->jeniskelamin  === "Laki-laki" ? 'checked':'' }} value="Laki-laki">
                                        <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="Perempuan" {{ old('jeniskelamin') ?? $record->jeniskelamin  === "Perempuan" ? 'checked':'' }} value="Perempuan">
                                        <label class="form-check-label" for="Perempuan">Perempuan</label>
                                    </div>
                                        @error('jeniskelamin')
                                        <div class="text text-danger">jenis kelamin harus dipilih</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggallahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="--tanggal lahir--" value="{{old('tanggallahir') ?? $record->tanggallahir}}">
                                    @error('tanggallahir')
                                        <div class="text text-danger">tanggal lahir harus diisi</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="village_id">Alamat</label>
                                    <select class="form-control" id="village_id" name="village_id">
                                        @foreach($villages as $village)
                                        <option {{ old('village_id') ?? $record->village_id == $village->id ? 'selected' : '' }} value={{$village->id}}>{{$village->desa}}</option>
                                        @endforeach
                                    </select>
                                    @error('village_id')
                                        <div class="text text-danger">alamat harus dipilih</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="school_id">Sekolah</label>
                                    <select class="form-control" id="school_id" name="school_id">
                                        <option value="">--sekolah--</option>
                                        @foreach($schools as $school)
                                        <option {{ old('school_id') ?? $record->school_id  == $school->id ? 'selected':'' }} value={{$school->id}}>{{$school->sekolah}}</option>
                                        @endforeach
                                    </select>
                                    @error('school_id')
                                        <div class="text text-danger">sekolah harus dipilih</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Pasien</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pasien" id="Baru" {{ old('pasien') ?? $record->pasien  === "Baru" ? 'checked':'' }} value="Baru">
                                        <label class="form-check-label" for="Baru">Baru</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pasien" id="Lama" {{ old('pasien') ?? $record->pasien  === "Lama" ? 'checked':'' }} value="Lama">
                                        <label class="form-check-label" for="Lama">Lama</label>
                                    </div>
                                        @error('pasien')
                                        <div class="text text-danger">pasien harus dipilih</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="diag_id">Diagnosa</label>
                                    <select class="form-control" id="diag_id" name="diag_id">
                                        @foreach($diags as $diag)
                                        <option {{ old('diag_id') ?? $record->diag_id == $diag->id ? 'selected':'' }} value={{$diag->id}}>{{$diag->kode}} {{$diag->diagnosa}}</option>
                                        @endforeach
                                    </select>
                                    @error('diag_id')
                                        <div class="text text-danger">diagnosa harus dipilih</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="treatment_id">Tindakan</label>
                                    <select class="form-control" id="treatment_id" name="treatment_id">
                                        @foreach($treatments as $treatment)
                                        <option {{ old('treatment_id') ?? $record->treatment_id == $treatment->id ? 'selected':'' }} value={{$treatment->id}}>{{$treatment->tindakan}}</option>
                                        @endforeach
                                    </select>
                                    @error('treatment_id')
                                        <div class="text text-danger">tindakan harus dipilih</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="obat">Obat</label>
                                    <textarea class="form-control" type="text" name="obat" id="obat" rows="3">{{ old('obat') ?? $record->obat}}</textarea>
                                    @error('obat')
                                        <div class="text text-danger">obat harus diisi</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto</label>
                                    <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    </div>
                                    @error('image')
                                        <div class="text text-danger">foto harus dipilih (jpg,jpeg,png|max:2MB)</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <textarea class="form-control" type="text" name="catatan" id="catatan" rows="3">{{ old('catatan') ?? $record->catatan}}</textarea>
                                    @error('catatan')
                                        <div class="text text-danger">catatan harus diisi</div>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-0">
                        <button type="submit" class="btn btn-block btn-warning">SIMPAN</button>
                    </div>
                </form>
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

@endsection