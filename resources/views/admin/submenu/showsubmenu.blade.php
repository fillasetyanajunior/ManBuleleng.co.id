@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Sub Menu</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <a href="" class="btn mb-2 btn-primary " id="tambahsubmenu" data-toggle="modal" data-target="#submenuModal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Menu</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Sub Menu</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Title</th>
                                            <th>Icon</th>
                                            <th>Url</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        foreach ($submenu as $item) :
                                        $query = DB::table('menus')
                                                    ->join('sub_menus','sub_menus.id_menu','=','menus.id')
                                                    ->select('menus.title')
                                                    ->where('sub_menus.id','=',$item->id)
                                                    ->get();
                                        @endphp
                                        <tr>
                                            <td>{{$i++}}</td>
                                            @foreach ($query as $id)
                                                <th>{{$id->title}}</th>
                                            @endforeach
                                            <th>{{$item->title}}</th>
                                            <td>{{$item->icon}}</td>
                                            <td>{{$item->url}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editsubmenu" data-toggle="modal" data-target="#submenuModal" data-id="{{$item->id}}">Edit</a>
                                                        <form action="/submenu/{{$item->id}}" method="post" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                        @php endforeach; @endphp
                                    </tbody>
                                </table>
                                {{$submenu->links()}}
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="submenuModal" tabindex="-1" aria-labelledby="ModalSubMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalSubMenuLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_submenu">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id_menu">Menu</label>
                        <select class="form-control" id="id_menu" name="id_menu">
                            <option value="">-- Pilih --</option>
                            @foreach ($menu as $items)
                            <option value="{{$items->id}}">{{$items->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon">
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>
                </div>
                <div class="modal-footer footer_submenu">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection