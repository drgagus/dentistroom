@extends('layouts.app')

@section('record')
menu-open
@endsection

@section('record'.$tahun)
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
            <h1 class="m-0 text-dark">Data Kunjungan Tahun {{$tahun ?? ''}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
              <li class="breadcrumb-item active">Kunjungan</li>
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
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">REKAPITULASI</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-januari-tab" data-toggle="pill" href="#pills-januari" role="tab" aria-controls="pills-januari" aria-selected="false">JANUARI</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-februari-tab" data-toggle="pill" href="#pills-februari" role="tab" aria-controls="pills-februari" aria-selected="false">FEBRUARI</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-maret-tab" data-toggle="pill" href="#pills-maret" role="tab" aria-controls="pills-maret" aria-selected="false">MARET</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-april-tab" data-toggle="pill" href="#pills-april" role="tab" aria-controls="pills-april" aria-selected="false">APRIL</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-mei-tab" data-toggle="pill" href="#pills-mei" role="tab" aria-controls="pills-mei" aria-selected="false">MEI</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-juni-tab" data-toggle="pill" href="#pills-juni" role="tab" aria-controls="pills-juni" aria-selected="false">JUNI</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-juli-tab" data-toggle="pill" href="#pills-juli" role="tab" aria-controls="pills-juli" aria-selected="false">JULI</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-agustus-tab" data-toggle="pill" href="#pills-agustus" role="tab" aria-controls="pills-agustus" aria-selected="false">AGUSTUS</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-september-tab" data-toggle="pill" href="#pills-september" role="tab" aria-controls="pills-september" aria-selected="false">SEPTEMBER</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-oktober-tab" data-toggle="pill" href="#pills-oktober" role="tab" aria-controls="pills-oktober" aria-selected="false">OKTOBER</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-november-tab" data-toggle="pill" href="#pills-november" role="tab" aria-controls="pills-november" aria-selected="false">NOVEMBER</a>
                    </li>
                    <li class="nav-item border rounded border-dark" role="presentation">
                        <a class="nav-link" id="pills-desember-tab" data-toggle="pill" href="#pills-desember" role="tab" aria-controls="pills-desember" aria-selected="false">DESEMBER</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="">Jumlah Kunjungan : <span class="font-weight-bold">{{count($records)}} Kunjungan</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h6 class="text-font-weight text-center">JENIS KELAMIN</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover text-wrap">
                                            <tbody>
                                                <tr class="">
                                                    <th class="">1</th>
                                                    <th class="">Laki-laki</th>
                                                    <th class="text-center">{{$men}}</th>
                                                </tr>
                                                <tr class="">
                                                    <th class="">2</th>
                                                    <th class="">Perempuan</th>
                                                    <th class="text-center">{{$women}}</th>
                                                </tr>
                                                <tr class="bg-success">
                                                    <th class="" colspan="2">Jumlah</th>
                                                    <th class="text-center">{{$all}}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                @if (count($recorddesa))
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h6 class="text-font-weight text-center">DESA/KELURAHAN</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover text-wrap">
                                            <tbody>
                                                <?php $no=1;?>
                                                @foreach($villages as $village)
                                                <?php $id = $village->id ;?>
                                                <tr class="">
                                                    <th class="">{{$no++}}</th>
                                                    <th class="">{{$village->desa}}<br><span class="pl-3 text-secondary">Laki-laki</span><br><span class="pl-3 text-secondary">Perempuan</span></th>
                                                    <th class="text-center"><br>{{$recorddesa[$id][1]}}<br>{{$recorddesa[$id][2]}}</th>
                                                </tr>
                                                @endforeach
                                                <tr class="bg-success">
                                                    <th class="" colspan="2">Jumlah</th>
                                                    <th class="text-center">{{$all}}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                @endif
                                @if (count($recordsekolah))
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h6 class="text-font-weight text-center">SEKOLAH</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover text-wrap">
                                            <tbody>
                                                <?php $no=1;?>
                                                @foreach($schools as $school)
                                                <?php $id = $school->id ;?>
                                                <tr class="">
                                                    <th class="">{{$no++}}</th>
                                                    <th class="">{{$school->sekolah}}<br><span class="pl-3 text-secondary">Laki-laki</span><br><span class="pl-3 text-secondary">Perempuan</span></th>
                                                    <th class="text-center"><br>{{$recordsekolah[$id][1]}}<br>{{$recordsekolah[$id][2]}}</th>
                                                </tr>
                                                @endforeach
                                                <tr class="bg-success">
                                                    <th class="" colspan="2">Jumlah</th>
                                                    <th class="text-center">{{$recordallschool}}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                @endif
                        </div>
                        <div class="row">
                                @if (count($recorddiagnosa))
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                        <h6 class="font-weight-bold text-center">DIAGNOSA</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover text-wrap">
                                                <?php $no=1; $jumlah = 0 ;?>
                                                @foreach($diags as $diagnosa)
                                                <?php $id = $diagnosa->id ;?>
                                                <?php $jumlah += $recorddiagnosa[$id] ; ?>
                                                <tr class="">
                                                    <th class="">{{$no++}}</th>
                                                    <th class="">{{$diagnosa->kode}}</th>
                                                    <th class="">{{$diagnosa->diagnosa}}</th>
                                                    <th class="text-center">@if ($recorddiagnosa[$id] != 0) {{$recorddiagnosa[$id]}} @endif </th>
                                                </tr>
                                                @endforeach
                                                <tr class="bg-success">
                                                    <th class="" colspan="3">Jumlah</th>
                                                    <th class="text-center">{{$jumlah}}</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if (count($recordtindakan))
                            <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                        <h6 class="font-weight-bold text-center">TINDAKAN</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover text-wrap">
                                                <?php $no=1;?>
                                                @foreach($treatments as $treatment)
                                                <?php $id = $treatment->id ;?>
                                                <tr class="">
                                                    <th class="">{{$no++}}</th>
                                                    <th class="">{{$treatment->tindakan}}<br><span class="pl-3 text-secondary">Laki-laki</span><br><span class="pl-3 text-secondary">Perempuan</span></th>
                                                    <th class="text-center"><br>{{$recordtindakan[$id][1]}}<br>{{$recordtindakan[$id][2]}}</th>
                                                </tr>
                                                @endforeach
                                                <tr class="bg-success">
                                                    <th class="" colspan="2">Jumlah</th>
                                                    <th class="text-center">{{$all}}</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                                @endif
                        </div>                        
                    </div>
                    <div class="tab-pane fade" id="pills-januari" role="tabpanel" aria-labelledby="pills-januari-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 1 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-februari" role="tabpanel" aria-labelledby="pills-februari-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 2 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-maret" role="tabpanel" aria-labelledby="pills-maret-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 3 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-april" role="tabpanel" aria-labelledby="pills-april-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 4 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-mei" role="tabpanel" aria-labelledby="pills-mei-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 5 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-juni" role="tabpanel" aria-labelledby="pills-juni-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 6 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-juli" role="tabpanel" aria-labelledby="pills-juli-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 7 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-agustus" role="tabpanel" aria-labelledby="pills-agustus-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 8 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-september" role="tabpanel" aria-labelledby="pills-september-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 9 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-oktober" role="tabpanel" aria-labelledby="pills-oktober-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 10 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-november" role="tabpanel" aria-labelledby="pills-november-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 11 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-desember" role="tabpanel" aria-labelledby="pills-desember-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-hover text-nowrap">
                                    <thead >
                                        <tr>
                                        <th class="text-center" scope="col" rowspan="2">No</th>
                                        <th class="text-center" scope="col" rowspan="2">Tanggal<br>Kunjungan</th>
                                        <th class="text-center" scope="col" rowspan="2">Nomor<br>Rekam Medik</th>
                                        <th class="text-center" scope="col" rowspan="2">Nama</th>
                                        <th class="text-center" scope="col" colspan="2">Baru</th>
                                        <th class="text-center" scope="col" colspan="2">Lama</th>
                                        <th class="text-center" scope="col" rowspan="2">Alamat</th>
                                        <th class="text-center" scope="col" colspan="2">Diagnosa</th>
                                        <th class="text-center" scope="col" rowspan="2">Tindakan</th>
                                        <th class="text-center" scope="col" rowspan="2">Obat</th>
                                        <th class="text-center" scope="col" rowspan="2">Foto</th>
                                        </tr>
                                        <tr>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >LK</th>
                                        <th class="text-center" scope="col" >PR</th>
                                        <th class="text-center" scope="col" >Kode</th>
                                        <th class="text-center" scope="col" >Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jumlah = 1 ;?>
                                        @foreach($records as $record)
                                        @if (date('m', strtotime($record->tanggalkunjungan)) == 12 )
                                        <tr>
                                            <td class="">
                                                <div class="btn-group dropright">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$jumlah++}}</button>
                                                    <div class="dropdown-menu p-0">
                                                        <a class="dropdown-item bg-warning" href={{route('dentist.edit', ['id' => $record->id])}}>Edit</a>
                                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-record-{{$record->id}}">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                                            <td class="text-center">{{$record->norm ?? '-'}}</td>
                                            <td class=""><span class="font-weight-bold">{{$record->nama ?? '-'}}</span><br>{{$record->umurtahun ?? ''}} Tahun {{$record->umurbulan ?? ''}} Bulan {{$record->umurhari ?? ''}} Hari</td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Baru')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Laki-laki' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($record->jeniskelamin == 'Perempuan' AND $record->pasien == 'Lama')
                                                    <div class="font-weight-bold">&#10003</div>
                                                @endif
                                            </td>
                                            <td class="">{{$record->village->desa ?? '-'}}</td>
                                            <td class="">{{($record->diag->kode) ?? '-'}}</td>
                                            <td class="">{{($record->diag->diagnosa) ?? '-'}}</td>
                                            <td class="">{{($record->treatment->tindakan) ?? '-' }}</td>
                                            <td class="">{!! nl2br($record->obat) ?? '-' !!}</td>
                                            <td class="">
                                            @if ($record->image)
                                            <a href="{{asset('storage/'.$record->image)}}" class="" target=_balnk>foto</a>
                                            @else
                                            tidak ada foto
                                            @endif
                                            </td>
                                        @endif
                                        @endforeach
                                        @if ($jumlah == 1)
                                        <tr class=""><td class="text-danger font-weight-bold" colspan="14">TIDAK ADA PASIEN</td></tr>
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- -----START MODAL DELETE KUNJUNGAN----- -->
@foreach($records as $record)
<div class="modal fade" id="modal-delete-record-{{$record->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">HAPUS KUNJUNGAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action={{route('dentist.delete', ['id' => $record->id])}} class="dropdown-item" method="post">
                  @csrf
                  @method('delete')
                  Yakin Ingin Hapus Kunjungan Ini ?
                  <table class="">
                    <tr class="">
                        <td class="">Tanggal kunjungan</td>
                        <td class="">:</td>
                        <td class="">{{date('d-m-Y', strtotime($record->tanggalkunjungan))}}</td>
                    </tr>
                    <tr class="">
                        <td class="">Nama</td>
                        <td class="">:</td>
                        <td class="">{{$record->nama ?? ''}}</td>
                    </tr>
                    <tr class="">
                        <td class="">Alamat</td>
                        <td class="">:</td>
                        <td class="">{{$record->village->desa ?? ''}}</td>
                    </tr>
                  </table>
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
<!-- -----END MODAL DELETE KUNJUNGAN----- -->
@endsection