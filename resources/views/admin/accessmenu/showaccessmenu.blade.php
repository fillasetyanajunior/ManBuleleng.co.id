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
                                <a href="" class="btn mb-2 btn-primary " id="tambahaccessmenu" data-toggle="modal" data-target="#accessmenuModal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Menu</span></a>
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
                                            <th>Menu</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($accessmenu as $item)
                                        <?php 
                                            $id = $item->id;
                                            $query =  DB::table('menus')
                                                        ->join('access_menus','access_menus.id_menu','=','menus.id')
                                                        ->select('title')
                                                        ->where('access_menus.id', '=' ,$id)
                                                        ->orderBy('id_role')
                                                        ->get();
                                        ?>    
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                @foreach ($query as $items)
                                                {{$items->title}}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($item->id_role == 1)
                                                    Admin
                                                @elseif($item->id_role == 2)
                                                    Guru
                                                @elseif($item->id_role == 3)
                                                    Siswa
                                                @else
                                                    Developer
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editaccessmenu" data-toggle="modal" data-target="#accessmenuModal" data-id="{{$item->id}}">Edit</a>
                                                        <form action="/accessmenu/delete/{{$item->id}}" method="post" >
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
                                {{$accessmenu->links()}}
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="accessmenuModal" tabindex="-1" aria-labelledby="ModalAccessMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAccessMenuLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_accessmenu">
                <form action="" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id_menu">Menu</label>
                        <select class="form-control" id="id_menu" name="id_menu">
                            <option value="">-- Pilih --</option>
                            @foreach ($menu as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_role">Role</label>
                        <select class="form-control" id="id_role" name="id_role">
                            <option value="">-- Pilih --</option>
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Siswa</option>
                            @if (request()->user()->role == 4)
                            <option value="4">Developer</option>
                            @else

                            @endif
                        </select>
                    </div>
                </div>
                <div class="modal-footer footer_accessmenu">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection