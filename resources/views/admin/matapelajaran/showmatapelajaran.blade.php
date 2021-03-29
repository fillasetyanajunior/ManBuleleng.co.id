@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Mata Pelajaran</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <a href="" class="btn mb-2 btn-primary " id="tambahmatapelajaran" data-toggle="modal" data-target="#matapelajaranModal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Mata Pelajaran</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Mata Pelajaran</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($matapelajaran as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->matapelajaran}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editmatapelajaran" data-toggle="modal" data-target="#matapelajaranModal" data-id="{{$item->id}}">Edit</a>
                                                        <form action="/matapelajaran/{{$item->id}}" method="post" >
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
                                {{$matapelajaran->links()}}
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="matapelajaranModal" tabindex="-1" aria-labelledby="ModalMatapelajaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalMatapelajaranLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_matapelajaran">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="matapelajaran">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="matapelajaran" name="matapelajaran">
                    </div>
                </div>
                <div class="modal-footer footer_matapelajaran">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection