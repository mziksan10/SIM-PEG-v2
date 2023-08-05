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
        <a href="/reward-punishment" class="btn btn-primary"><i class="fas fa-sync fa-sm"></i></a>
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
                        DAFTAR PEGAWAI PENERIMA REWARD & PUNISHMET<br>POLITEKNIK PIKSI GANESHA TAHUN {{date('Y')}}
                    </center>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="reward-tab" data-toggle="tab" data-target="#reward" type="button" role="tab" aria-controls="reward" aria-selected="true">Reward</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="punishment-tab" data-toggle="tab" data-target="#punishment" type="button" role="tab" aria-controls="punishment" aria-selected="false">Punishment</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php foreach ($status as $tab) : if ($tab != null) { ?>
                                <div class="tab-pane fade show <?php if ($tab == 'REWARD') {
                                                                    echo 'active';
                                                                } ?>" id="<?php if ($tab == 'REWARD') {
                                                                                echo 'reward';
                                                                            } else {
                                                                                echo 'punishment';
                                                                            } ?>" role="tabpanel" aria-labelledby="<?php if ($tab == 'REWARD') {
                                                                                                                        echo 'reward-tab';
                                                                                                                    } else {
                                                                                                                        echo 'punishment-tab';
                                                                                                                    } ?>">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="<?php if ($tab == 'REWARD') {
                                                            echo 'myTable';
                                                        } else {
                                                            echo 'myTable2';
                                                        } ?>" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr class="bg-light">
                                                        <th style="text-align: center">No</th>
                                                        <th style="text-align: center">Nama Bentuk</th>
                                                        <th style="text-align: center">Tanggal</th>
                                                        <th style="text-align: center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    @foreach($dataRewardPunishment as $item)
                                                    @if($item->status == $tab)
                                                    @if($item->id)
                                                    <tr>
                                                        <td style="text-align: center">{{ $no++ }}</td>
                                                        <td style="text-align: center">{{ $item->nama_bentuk }}</td>
                                                        <td style="text-align: center">{{ $item->tanggal }}</td>
                                                        <td style="text-align: center">
                                                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#showModal{{ $item->id }}"><i class="fas fa-eye fa-sm text-primary"></i></button>
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

    @include('reward-punishment/modal/create')
    @include('reward-punishment/modal/show')
    @endsection