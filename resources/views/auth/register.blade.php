@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Tambah User</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <a href="" class="btn mb-2 btn-primary " id="tambahuser" data-toggle="modal" data-target="#userModal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Siswa</span></a>
                                <a href="" class="btn mb-2 btn-primary " id="tambahguru" data-toggle="modal" data-target="#guruModal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Guru</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Tambah User</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($user as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->username}}</td>
                                            <td>{{Crypt::decrypt($item->password1)}}</td>
                                            <td>
                                                @if ($item->role == 1)
                                                    Admin
                                                @elseif($item->role == 2)
                                                    Guru
                                                @elseif($item->role == 3)
                                                    Siswa
                                                @else
                                                    Developer
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->role == 4)
                                                    
                                                @else    
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        @if ($item->role == 1 || $item->role == 2)
                                                            <a class="dropdown-item" href="" id="editguru" data-toggle="modal" data-target="#guruModal" data-id="{{$item->id}}">Edit Guru</a> 
                                                        @else
                                                            <a class="dropdown-item" href="" id="edituser" data-toggle="modal" data-target="#userModal" data-id="{{$item->id}}">Edit Siswa</a> 
                                                        @endif
                                                        <form action="/user/delete/{{$item->id}}" method="post" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @endif
                                            </td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$user->links()}}
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="ModalUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalUserLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_user">
                <form action="" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name Siswa</label>
                        <select class="form-control" id="name" name="name">
                            <option value="">-- Pilih --</option>
                            @foreach ($siswa as $siswa)
                            <option value="{{$siswa->nama}}">{{$siswa->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 username">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group mb-3 password">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="">-- Pilih --</option>
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer footer_user">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="guruModal" tabindex="-1" aria-labelledby="ModalGuruLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalGuruLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_guru">
                <form action="" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="names">Name Guru</label>
                        <select class="form-control" id="names" name="name">
                            <option value="">-- Pilih --</option>
                            @foreach ($guru as $guru)
                            <option value="{{$guru->nama}}">{{$guru->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 usernames">
                        <label for="usernames">NIS</label>
                        <input type="text" class="form-control" id="usernames" name="username">
                    </div>
                    <div class="form-group mb-3 passwords">
                        <label for="passwords">Password</label>
                        <input type="text" class="form-control" id="passwords" name="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="roles">Role</label>
                        <select class="form-control" id="roles" name="role">
                            <option value="">-- Pilih --</option>
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer footer_guru">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection