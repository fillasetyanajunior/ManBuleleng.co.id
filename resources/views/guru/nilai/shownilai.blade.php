@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Input Nilai</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <a href="" class="btn mb-2 btn-primary" id="tambahnilai" data-toggle="modal" data-target="#nilaiModal" ><i class="fas fa-plus"></i><span>&nbsp; Tambah Nilai</span></a>
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
                                            <th>Nama</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Angka</th>
                                            <th>Huruf</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($nilai as $nilai)
                                        @php
                                            $mapel = DB::table('nilais')
                                                        ->join('matapelajarans','matapelajarans.id','=','nilais.mapel')
                                                        ->where('matapelajarans.id','=',$nilai->mapel)
                                                        ->limit(1)
                                                        ->get();
                                        @endphp
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$nilai->nama}}</td>
                                            @foreach ($mapel as $item)
                                            <td>{{$item->matapelajaran}}</td>
                                            @endforeach
                                            <td>{{$nilai->angka}}</td>
                                            <td>{{$nilai->huruf}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editnilai" data-toggle="modal" data-target="#nilaiModal" data-id="{{$nilai->id}}">Edit</a>
                                                        <form action="/nilai/delete/{{$nilai->id}}" method="post" >
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
<div class="modal fade" id="nilaiModal" tabindex="-1" aria-labelledby="ModalNilaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalNilaiLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_nilai">
                <form action="" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3 angka">
                        <label for="angka">Nilai Angka</label>
                        <input type="text" class="form-control" id="angka" name="angka">
                    </div>
                    <div class="form-group mb-3 huruf">
                        <label for="huruf">Nilai Huruf</label>
                        <input type="text" class="form-control" id="huruf" name="huruf">
                    </div>
                    <div class="form-group mb-3 import_excel">
                        <label for="import_excel">Import File Nilai Excel</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="import_excel" name="import_excel">
                            <label class="custom-file-label" for="import_excel">Import File Nilai Excel</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer footer_nilai">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection