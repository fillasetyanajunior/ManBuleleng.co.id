@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Pendaftaran</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <input type="text" class="form-control" id="search" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Pendaftaran</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>kode</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @php
                                            $i = 1;
                                        @endphp 
                                        @foreach ($showpendaftaran as $showpendaftarans)    
                                        <tr>
                                            <th>{{$i++}}</th>
                                            <td>{{$showpendaftarans->nama}}</td>
                                            <td>{{$showpendaftarans->nisn}}</td>
                                            <td>{{$showpendaftarans->kode}}</td>
                                            <td>
                                                @if ($showpendaftarans->is_active == 1)
                                                    Belum Test
                                                @elseif ($showpendaftarans->is_active == 2)
                                                    Sedang Test
                                                @else
                                                    Lulus
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editpendaftaran" data-toggle="modal" data-target="#pendaftaranModal" data-id="{{$showpendaftarans->id}}">Edit</a>
                                                        <form action="/pendaftaran/{{$showpendaftarans->id}}" method="post" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$showpendaftaran->links()}}
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="pendaftaranModal" tabindex="-1" aria-labelledby="ModalPendaftaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalPendaftaranLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_pendaftaran">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn">
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Pendaftaran</label>
                        <input type="text" class="form-control" id="kode" name="kode">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="">-- Pilih --</option>
                            @foreach ($jurusan as $jurusan)
                            <option value="{{$jurusan->kode}}">{{$jurusan->jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="active">Status</label>
                        <select class="form-control" id="active" name="active">
                            <option value="">-- Pilih --</option>
                            <option value="1">Belum Test</option>
                            <option value="2">Sedang Test</option>
                            <option value="3">Lulus</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer footer_pendaftaran">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection