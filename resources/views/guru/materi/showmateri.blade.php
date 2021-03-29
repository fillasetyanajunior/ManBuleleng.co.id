@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Menu</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <a href="" class="btn mb-2 btn-primary " id="tambahmateri" data-toggle="modal" data-target="#materiModal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Materi</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Menu</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Judul Materi</th>
                                            <th>Kelas</th>
                                            <th>File Materi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($materi as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->mapel}}</td>
                                            <td>{{$item->judul}}</td>
                                            <td>
                                                @if ($item->kelas == 1)
                                                    10
                                                @elseif ($item->kelas == 2)
                                                    11
                                                @else
                                                    12
                                                @endif
                                            </td>
                                            <td>{{$item->file_pdf}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editmateri" data-toggle="modal" data-target="#materiModal" data-id="{{$item->id}}">Edit</a>
                                                        <form action="/materi/delete/{{$item->id}}" method="post" >
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
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="materiModal" tabindex="-1" aria-labelledby="ModalMateriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalMateriLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_materi">
                <form action="" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control" id="mapel" name="mapel">
                            <option value="">-- Pilih --</option>
                            @foreach ($mapel as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" id="judul" class="form-control" name="judul">
                    </div>
                    <div class="form-group mb-3">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas">
                            <option value="">-- Pilih --</option>
                            <option value="1">10</option>
                            <option value="2">11</option>
                            <option value="3">12</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="filepdf">File Materi</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="filepdf" name="filepdf">
                            <label class="custom-file-label" for="filepdf">File Materi</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer footer_materi">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection