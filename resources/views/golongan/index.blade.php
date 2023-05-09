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
        <a href="/golongan" class="btn btn-primary"><i class="fas fa-sync fa-sm"></i></a>
        <button type="button" class="btn btn btn-warning shadow ml-1" data-toggle="modal" data-target="#importModal"><i class="fas fa-upload fa-sm"></i></button>
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
                        DAFTAR GOLONGAN<br>POLITEKNIK PIKSI GANESHA TAHUN {{date('Y')}}
                    </center>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tetap-tab" data-toggle="tab" data-target="#tetap" type="button" role="tab" aria-controls="tetap" aria-selected="true">Golongan Tetap</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kontrak-tab" data-toggle="tab" data-target="#kontrak" type="button" role="tab" aria-controls="kontrak" aria-selected="false">Golongan Kontrak</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php foreach ($status as $tab) : if ($tab != null) { ?>
                                <div class="tab-pane fade show <?php if ($tab == 'Tetap') {
                                                                    echo 'active';
                                                                } ?>" id="<?php if ($tab == 'Tetap') {
                                                                                echo 'tetap';
                                                                            } else {
                                                                                echo 'kontrak';
                                                                            } ?>" role="tabpanel" aria-labelledby="<?php if ($tab == 'Tetap') {
                                                                                                                        echo 'tetap-tab';
                                                                                                                    } else {
                                                                                                                        echo 'kontrak-tab';
                                                                                                                    } ?>">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="<?php if ($tab == 'Tetap') {
                                                            echo 'tetapTable';
                                                        } else {
                                                            echo 'kontrakTable';
                                                        } ?>" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr class="bg-light">
                                                        <th style="text-align: center">No</th>
                                                        <th style="text-align: center">Golongan</th>
                                                        <th style="text-align: center">Jenjang</th>
                                                        <th style="text-align: center">Masa Kerja</th>
                                                        <th style="text-align: center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    @foreach($data_golongan as $item)
                                                    @if($item->status == $tab)
                                                    @if($item->golongan)
                                                    <tr>
                                                        <td style="text-align: center">{{ $no++ }}</td>
                                                        <td style="text-align: center">{{ $item->golongan }}</td>
                                                        <td style="text-align: center">{{ $item->jenjang }}</td>
                                                        <td style="text-align: center">@if($item->max_masa_kerja !== null) {{ $item->min_masa_kerja . ' - ' . $item->max_masa_kerja }} @else {{ $item->min_masa_kerja }} @endif Tahun</td>
                                                        <td style="text-align: center">
                                                            <button class="btn btn-sm" data-toggle="modal" data-target="#showModal{{ $item->id }}"><i class="fas fa-eye fa-sm text-primary"></i> Show</button>
                                                            |
                                                            <button class="btn btn-sm" data-toggle="modal" data-target="#editModal{{ $item->id }}"><i class="fas fa-edit fa-sm text-warning"></i> Edit</button>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('golongan/modal/create')
    @include('golongan/modal/edit')
    @include('golongan/modal/show')
    @include('golongan/modal/import')
    @endsection