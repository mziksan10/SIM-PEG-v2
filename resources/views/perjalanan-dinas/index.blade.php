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
        <a href="/pelatihan" class="btn btn-primary"><i class="fas fa-sync fa-sm"></i></a>
        <button type="button" class="btn btn btn-primary shadow ml-1" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus fa-sm"></i> Add</button>
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
                <div class="card-header">
                    <center>
                        PERJALANAN DINAS<br>POLITEKNIK PIKSI GANESHA
                    </center>
                </div>
                <div class="card-body">
                    <div class="col">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="align-middle" style="text-align: center">No</th>
                                        <th class="align-middle" style="text-align: center">Keperluan</th>
                                        <th class="align-middle" style="text-align: center">Tempat Tujuan</th>
                                        <th class="align-middle" style="text-align: center">Status</th>
                                        <th class="align-middle" style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataPerjalananDinas as $item)
                                    <tr>
                                        <td class="align-middle" style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->keperluan }}</td>
                                        <td class="align-middle" style="text-align: center">{{ $item->tempat_tujuan }}</td>
                                        <td class="align-middle" style="text-align: center">
                                            @if(date('d F Y', strtotime($item->tanggal_kembali)) <= date('d F Y', strtotime(now()))) <div class="badge badge-success">Selesai
                        </div>
                        @else
                        <div class="badge badge-warning">Belum Selesai</div>
                        @endif
                        </td>

                        <td class="align-middle" style="text-align: center">
                            <button class="btn btn-sm" data-toggle="modal" data-target="#showModal{{ $item->id }}"><i class="fas fa-eye fa-sm text-primary"></i> Show</button>
                        </td>
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

@include('perjalanan-dinas/modal/create')
@include('perjalanan-dinas/modal/show')
@endsection