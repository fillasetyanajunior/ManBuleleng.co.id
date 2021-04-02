@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Jadwal Ulangan Kelas 11</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <a href="" class="btn mb-2 btn-primary " id="tambahulangan11" data-toggle="modal" data-target="#ulangan11Modal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Jadwal</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Jadwal Ulangan Kelas 11</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Tahun</th>
                                            <th>Jurusan</th>
                                            <th>Kursi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($jadwal_11 as $jadwal)
                                        @php
                                            $query = DB::table('ulangan11s')
                                                        ->join('matapelajarans','matapelajarans.id','=','ulangan11s.matapelajaran')
                                                        ->join('tahuns','tahuns.id','=','ulangan11s.tahun')
                                                        ->join('jurusans','jurusans.id','=','ulangan11s.jurusan')
                                                        ->select('matapelajarans.matapelajaran','tahuns.tahun','jurusans.jurusan')
                                                        ->where('ulangan11s.id','=',$jadwal->id)
                                                        ->get();
                                        @endphp
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$jadwal->tanggal}}</td>
                                            <td>{{$jadwal->jam}}</td>
                                            @foreach ($query as $items)
                                            <td>{{$items->matapelajaran}}</td>
                                            <td>{{$items->tahun}}</td>
                                            <td>{{$items->jurusan}}</td>
                                            @endforeach
                                            <td>{{$jadwal->kursi}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editulangan11" data-toggle="modal" data-target="#ulangan11Modal" data-id="{{$jadwal->id}}">Edit</a>
                                                        <form action="/ulangan11/delete/{{$jadwal->id}}" method="post" >
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
                                {{$jadwal_11->links()}}
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="ulangan11Modal" tabindex="-1" aria-labelledby="ModalUlangan11Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalUlangan11Label">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_ulangan11">
                <form action="" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jam">Jam Ulangan</label>
                        <input type="text" class="form-control" id="jam" name="jam">
                    </div>
                    <div class="form-group mb-3">
                        <label for="matapelajaran">Mata Pelajaran</label>
                        <select class="form-control" id="matapelajaran" name="matapelajaran">
                            <option value="">-- Pilih --</option>
                            @foreach ($matapelajaran as $matapelajaran)
                            <option value="{{$matapelajaran->id}}">{{$matapelajaran->matapelajaran}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tahun">Tahun Pelajaran</label>
                        <select class="form-control" id="tahun" name="tahun">
                            <option value="">-- Pilih --</option>
                            @foreach ($tahun as $tahun)
                            <option value="{{$tahun->id}}">{{$tahun->tahun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="">-- Pilih --</option>
                            @foreach ($jurusan as $jurusan)
                            <option value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kursi">Jumlah Kursi</label>
                        <input type="text" class="form-control" id="kursi" name="kursi">
                    </div>
                </div>
                <div class="modal-footer footer_ulangan11">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection