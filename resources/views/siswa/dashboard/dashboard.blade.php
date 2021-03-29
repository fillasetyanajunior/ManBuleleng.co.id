@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Dashboard</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Status</strong>
                            </div>
                            <div class="card-body my-n2">
                                
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12 mt-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Jadwal Sekolah</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Mate Pelajaran</th>
                                            <th>Guru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12 mt-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Jadwal Ulangan</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection