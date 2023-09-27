@extends('layouts/main')
@section('container')
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <div class="col">
        Home / <a href="#">{{ $title }}</a>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- belum ada -->
    </ul>

</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <div class="col">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <small>{{ session('success') }}</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow-sm mb-2">
                <div class="card border-left-primary">
                    <div class="card-body px-1 py-1">
                        <div class="form-row">
                            <div class="col-xl-1 col-md-2">
                                <div class="badge badge-primary py-2" style="width:100%">
                                    <i class="fas fa-bullhorn mr-2"></i> Info
                                </div>
                            </div>
                            <div class="col-xl-11 col-md-10 modal-dialog-centered">
                                <marquee>
                                    <?php
                                    $tanggal_masuk = new DateTime("$pegawai->tanggal_masuk");
                                    $sekarang = new DateTime("today");
                                    if ($tanggal_masuk > $sekarang) {
                                        $thn = "0";
                                        $bln = "0";
                                        $tgl = "0";
                                    }
                                    $thn = $sekarang->diff($tanggal_masuk)->y;
                                    $bln = $sekarang->diff($tanggal_masuk)->m;
                                    $tgl = $sekarang->diff($tanggal_masuk)->d;
                                    ?>
                                    @if($pegawaiBerulangTahun == false && $pegawaiNaikGolongan == false)
                                    <small><b>Tanggal Masuk</b> : {{ $pegawai->tanggal_masuk }} | <b>Lama Bekerja</b> : {{ $thn." Tahun " . $bln." Bulan ".$tgl." Hari" }}.</small>
                                    @else
                                    @if(date('d F', strtotime($pegawai->tanggal_lahir)) == date('d F', strtotime(now())) )
                                    <small class="ml-3"><i class="fas fa-gift"></i> Hari ini <b>{{ $pegawai->nama }}</b> Berulang Tahun yang ke- {{ date('Y', strtotime(now())) - date('Y', strtotime($pegawai->tanggal_lahir)) }} Tahun.</small>
                                    @endif
                                    @if($lamaBekerja[0] > $pegawai->riwayatJabatan->golongan->min_masa_kerja && $lamaBekerja[0] != $pegawai->riwayatJabatan->golongan->max_masa_kerja)
                                    <small class="ml-3">Tahun ini <b>{{ $pegawai->nama }}</b> harus naik golongan.
                                        @endif
                                        @endif
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow-sm mb-2">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-8 d-flex justify-content-start">
                            <h6 class="font-weight-bold text-primary mt-auto"><i class="fas fa-user"></i> Detail Pribadi</h6>
                        </div>
                        <div class="col-4">
                            <div class="float-right">
                                <a href="{{ route('editPegawai', $pegawai->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit fa-sm"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-lg-3 col-md-12 card">
                            <div class="modal-dialog-centered justify-content-center" style="width:100%">
                                <div style="max-height: 500px; max-width: 250px; overflow: hidden;">
                                    @if($pegawai->foto)
                                    <img src="{{ asset('storage/' . $pegawai->foto) }}" class="img-preview mb-2 mt-3" style="height: 300px; width: 250px; overflow: hidden;">
                                    @elseif(!$pegawai->foto)
                                    <img src="{{ asset('assets/img') }}/user_default.png" class="img-preview mb-2 mt-3" style="height: 300px; width: 250px; overflow: hidden;">
                                    @endif
                                    <div class=" text-center my-3 small">
                                        <b>{{ $pegawai->nama }}</b><br>
                                        NIP. {{ $pegawai->nip }}
                                    </div>
                                    <div class="badge badge-primary align-middle small mb-3" style="width:100%">{{ $thn." Tahun" }} <br> {{ $bln." Bulan ".$tgl." Hari" }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <table class="table small">
                                <tr>
                                    <th>NIK</th>
                                    <td>: {{ $pegawai->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat, Tanggal lahir</th>
                                    <td>: {{ $pegawai->cities->city_name . ", " . ucwords(strtoupper(date('d F Y', strtotime($pegawai->tanggal_lahir)))) }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>: {{ $pegawai->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $pegawai->alamat . " " . $pegawai->subdistricts->subdis_name . ", " . $pegawai->cities->city_name . " " . $pegawai->districts->dis_name . " " . $pegawai->provinces->prov_name . " " . $pegawai->kode_pos . "(" . ($pegawai->status_kepemilikan_rumah) . ")" }}</td>
                                </tr>
                                <tr>
                                    <th>No. Handphone</th>
                                    <td>: {{ $pegawai->no_hp }} <a href="https://wa.me/62{{ $pegawai->no_hp }}" class="badge badge-success" target="_blank"><i class="fab fa-whatsapp"></i></a></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: {{ $pegawai->email }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pernikahan</th>
                                    <td>: {{ $pegawai->status_pernikahan }}</td>
                                </tr>
                                <tr class="bg-light">
                                    <th><b># Pengalaman Kerja Sebelumnya</b></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Nama Instansi</th>
                                    <td>: {{ $pegawai->instansi_sebelumnya }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td>: {{ $pegawai->pekerjaan_sebelumnya }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>: {{ $pegawai->jabatan_sebelumnya }}</td>
                                </tr>
                                <tr>
                                    <th>Masa Jabatan</th>
                                    <td>: {{ $pegawai->masa_jabatan_sebelumnya . " Tahun" }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm mb-2">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-8 d-flex justify-content-start">
                            <h6 class="font-weight-bold text-primary mt-auto"><i class="fas fa-briefcase"></i> Detail Jabatan</h6>
                        </div>
                        <div class="col-4">
                            <div class="float-right">
                                @if( $pegawai->riwayatJabatan == null)
                                @else
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModalJabatan{{ $pegawai->riwayatJabatan->id }}"><i class="fas fa-edit fa-sm"></i> Edit</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <table class="table small">
                                <tr>
                                    <th>Bidang</th>
                                    @if($pegawai->riwayatJabatan === null)
                                    <td>:</td>
                                    @elseif($pegawai->riwayatJabatan)
                                    <td>: {{ $pegawai->riwayatJabatan->bidang->nama_bidang }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    @if($pegawai->riwayatJabatan === null)
                                    <td>:</td>
                                    @elseif($pegawai->riwayatJabatan)
                                    <td>: {{ $pegawai->riwayatJabatan->jabatan->nama_jabatan }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Golongan</th>
                                    @if($pegawai->riwayatJabatan === null)
                                    <td>:</td>
                                    @elseif($pegawai->riwayatJabatan)
                                    <td>: {{ $pegawai->riwayatJabatan->golongan->golongan }}
                                        @if( $pegawai->riwayatJabatan->golongan->status == 'Kontrak')
                                        <div class="badge badge-warning">KONTRAK</div>
                                        @elseif( $pegawai->riwayatJabatan->golongan->status == 'Tetap')
                                        <div class="badge badge-primary">TETAP</div>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>TMT Bekerja</th>
                                    @if($pegawai->riwayatJabatan === null)
                                    <td>:</td>
                                    @elseif($pegawai->riwayatJabatan)
                                    <td>: {{ $pegawai->riwayatJabatan->tmt_bekerja }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Scan SK.</th>
                                    @if($pegawai->riwayatJabatan === null)
                                    <td>:</td>
                                    @elseif($pegawai->riwayatJabatan)
                                    @if($pegawai->riwayatJabatan->scan_sk != null)
                                    <td>: <a href="{{asset('storage/' . $pegawai->riwayatJabatan->scan_sk)}}" target="_blank" class="badge badge-sm badge-danger ml-1"><i class="fas fa-file-pdf"></i> Show</a></td>
                                    @else
                                    <td>: <div class="badge badge-warning">Tidak Ada</div>
                                    </td>
                                    @endif
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm mb-2">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-8 d-flex justify-content-start">
                            <h6 class="font-weight-bold text-primary mt-auto"><i class="fas fa-graduation-cap"></i> Detail Pendidikan</h6>
                        </div>
                        <div class="col-4">
                            <div class="float-right">
                                @if($pegawai->riwayatPendidikan === null)
                                @else
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModalPendidikan{{ $pegawai->riwayatPendidikan->id }}"><i class="fas fa-edit fa-sm"></i> Edit</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <table class="table small">
                                @if($pegawai->riwayatPendidikan === null)
                                <tr>
                                    <th>Jenjang</th>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>: </td>
                                </tr>
                                <tr>
                                    <th>Nama Institusi</th>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <th>Tahun Lulus</th>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <th>Scan Ijazah</th>
                                    <td>:</td>
                                </tr>
                                @else
                                <tr>
                                    <th>Jenjang</th>
                                    <td>: {{ $pegawai->riwayatPendidikan->jenjang }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>: {{ $pegawai->riwayatPendidikan->jurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Institusi</th>
                                    <td>: {{ $pegawai->riwayatPendidikan->institusi }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Lulus</th>
                                    <td>: {{ $pegawai->riwayatPendidikan->tahun_lulus }}</td>
                                </tr>
                                <tr>
                                    <th>Scan Ijazah</th>
                                    @if($pegawai->riwayatPendidikan->scan_ijazah != null)
                                    <td>: <a href="{{asset('storage/' . $pegawai->riwayatPendidikan->scan_ijazah)}}" target="_blank" class="badge badge-sm badge-danger ml-1"><i class="fas fa-file-pdf"></i> Show</a></td>
                                    @else
                                    <td>: <div class="badge badge-warning">Tidak Ada</div>
                                    </td>
                                    @endif
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-2">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8 d-flex justify-content-start">
                    <h6 class="font-weight-bold text-primary mt-auto"><i class="fas fa-history"></i> Riwayat Pendidikan</h6>
                </div>
                <div class="col-4">
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModalPendidikan"><i class="fas fa-plus fa-sm"></i> Add</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table small">
                    <tr>
                        <th>No</th>
                        <th>Jenjang</th>
                        <th>Jurusan</th>
                        <th>Nama Institusi</th>
                        <th>Tahun Lulus</th>
                        <th>Scan Ijazah</th>
                    </tr>
                    @foreach($data_riwayatPendidikan as $item)
                    <tr>
                        <td>{{ $loop->iteration . "." }}</td>
                        <td>{{ $item->jenjang }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->institusi }}</td>
                        <td>{{ $item->tahun_lulus }}</td>
                        @if($pegawai->riwayatPendidikan->scan_ijazah != null)
                        <td><a href="{{asset('storage/' . $pegawai->riwayatPendidikan->scan_ijazah)}}" target="_blank" class="badge badge-sm badge-danger ml-1"><i class="fas fa-file-pdf"></i> Show</a></td>
                        @else
                        <td>
                            <div class="badge badge-warning">Tidak Ada</div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Riwayat Jabatan -->
    <div class="card shadow-sm mb-2">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8 d-flex justify-content-start">
                    <h6 class="font-weight-bold text-primary mt-auto"><i class="fas fa-history"></i> Riwayat Jabatan</h6>
                </div>
                <div class="col-4">
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModalJabatan"><i class="fas fa-plus fa-sm"></i> Add</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table small">
                    <tr>
                        <th>No</th>
                        <th>Bidang</th>
                        <th>jabatan</th>
                        <th>Golongan</th>
                        <th>TMT Golongan</th>
                        <th>TMT Bekerja</th>
                        <th>Scan SK.</th>
                    </tr>
                    @foreach($data_riwayatJabatan as $item)
                    <tr>
                        <td>{{ $loop->iteration . "." }}</td>
                        <td>{{ $item->bidang->nama_bidang }}</td>
                        <td>{{ $item->jabatan->nama_jabatan }}</td>
                        <td>
                            {{ $item->golongan->golongan}}
                            @if( $pegawai->riwayatJabatan->golongan->status == 'Kontrak')
                            <div class="badge badge-warning">KONTRAK</div>
                            @elseif( $pegawai->riwayatJabatan->golongan->status == 'Tetap')
                            <div class="badge badge-primary">TETAP</div>
                            @endif
                        </td>
                        <td>{{ $item->tmt_golongan }}</td>
                        <td>{{ $item->tmt_bekerja }}</td>
                        @if($pegawai->riwayatJabatan->scan_sk != null)
                        <td><a href="{{asset('storage/' . $pegawai->riwayatJabatan->scan_sk)}}" target="_blank" class="badge badge-sm badge-danger ml-1"><i class="fas fa-file-pdf"></i> Show</a></td>
                        @else
                        <td>
                            <div class="badge badge-warning">Tidak Ada</div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Riwayat Sertifikasi & Pelatihan -->
    <div class="card shadow-sm mb-2">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8 d-flex justify-content-start">
                    <h6 class="font-weight-bold text-primary mt-auto"><i class="fas fa-history"></i> Riwayat Sertifikasi & Pelatihan</h6>
                </div>
                <div class="col-4">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table small">
                    <tr>
                        <th>No</th>
                        <th>Pelatihan</th>
                        <th>Sifat Pelatihan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                    </tr>
                    @foreach($data_riwayatPelatihan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_pelatihan }}</td>
                        <td>{{ $item->sifat_pelatihan }}</td>
                        <td>{{ $item->tanggal_mulai }}</td>
                        <td>{{ $item->tanggal_berakhir }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8 d-flex justify-content-start">
                    <h6 class="font-weight-bold text-primary mt-auto"><i class="fas fa-file"></i> Pemberkasan</h6>
                </div>
                <div class="col-4">
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModalBerkas"><i class="fas fa-plus fa-sm"></i> Add</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-border table-hover">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Jenis Berkas</th>
                            <th>Keterangan</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_jenisBerkas as $item)
                        <tr>
                            <td>{{ $data_jenisBerkas->firstItem() + $loop->index }}</td>
                            <td>{{ $item->jenis_berkas }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td style="text-align: center">
                                <a href="{{asset('storage/' . $item->file)}}" class="btn-circle btn-sm btn-primary" target="_blank"><i class="fas fa-eye fa-sm"></i></a>
                                <form action="{{ route('destroyBerkas', $item->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn-circle btn-sm btn-danger border-0" onclick="return confirm('Apakah kamu yakin?')"><i class="fas fa-trash fa-sm"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-end">
                        {{ $data_jenisBerkas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('pegawai/modal/create-pendidikan')
    @include('pegawai/modal/create-jabatan')
    @include('pegawai/modal/edit-pendidikan')
    @include('pegawai/modal/edit-jabatan')
    @include('pegawai/modal/create-pemberkasan')
    @endsection