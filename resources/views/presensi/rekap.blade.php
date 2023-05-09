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
        <form action="/export/presensi" method="GET">
            @csrf
            <div class="input-group">
                <a href="/rekap-presensi" class="btn btn-primary"><i class="fas fa-sync fa-sm"></i></a>
                <div class="input-group-prepend">
                    <span class="input-group-text ml-2">From</span>
                </div>
                <input type="date" class="form-control col-4" name="fromDate">
                <div class="input-group-prepend">
                    <span class="input-group-text">To</span>
                </div>
                <input type="date" class="form-control col-4" name="toDate">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success"><i class="fas fa-file-excel fa-sm"></i> Export</button>
                </div>
            </div>
        </form>
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
            @elseif(session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <small>{{ session('failed') }}</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="col">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="align-middle" style="text-align: center">No</th>
                                        <th class="align-middle" style="text-align: center">NIP</th>
                                        <th class="align-middle" style="text-align: center">Nama</th>
                                        <th class="align-middle" style="text-align: center">Tanggal</th>
                                        <th class="align-middle" style="text-align: center">Jam Masuk</th>
                                        <th class="align-middle" style="text-align: center">Jam Keluar</th>
                                        <th class="align-middle" style="text-align: center">Sesi</th>
                                        <th class="align-middle" style="text-align: center">Status</th>
                                        <th class="align-middle" style="text-align: center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_presensi as $item)
                                    <tr>
                                        <td class="align-middle" style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->pegawai->nip }}</td>
                                        <td>{{ $item->pegawai->nama }}</td>
                                        <td class="align-middle" style="text-align: center">{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                        <td class="align-middle" style="text-align: center">{{ $item->jam_masuk }}</td>
                                        <td class="align-middle" style="text-align: center">{{ $item->jam_keluar }}</td>
                                        <td class="align-middle" style="text-align: center">{{ $item->sesi }}</td>
                                        <td class="align-middle" style="text-align: center">{{ $item->status }}</td>
                                        <td class="align-middle" style="text-align: center">{{ $item->keterangan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection