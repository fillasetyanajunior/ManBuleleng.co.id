@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Jadwal Kelas 12</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <a href="" class="btn mb-2 btn-primary " id="tambahjadwal12" data-toggle="modal" data-target="#jadwal12Modal"><i class="fas fa-plus"></i><span>&nbsp; Tambah Jadwal</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Jadwal Kelas 12</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Guru</th>
                                            <th>Tahun</th>
                                            <th>Jurusan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($jadwal_12 as $jadwal)
                                        @php
                                            $query = DB::table('jadwal12s')
                                                        ->join('matapelajarans','matapelajarans.id','=','jadwal12s.matapelajaran')
                                                        ->join('gurus','gurus.id','=','jadwal12s.guru')
                                                        ->join('tahuns','tahuns.id','=','jadwal12s.tahun')
                                                        ->join('jurusans','jurusans.id','=','jadwal12s.jurusan')
                                                        ->select('nama','matapelajaran','tahun','jurusan')
                                                        ->where('jadwal12s.id','=',$jadwal->id)
                                                        ->get();
                                        @endphp
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                @switch($jadwal->hari)
                                                    @case(1)
                                                        Senin
                                                        @break
                                                    @case(2)
                                                        Selasa
                                                        @break
                                                    @case(3)
                                                        Rabu
                                                        @break
                                                    @case(4)
                                                        Kamis
                                                        @break
                                                    @case(5)
                                                        Juam'at
                                                        @break
                                                    @case(6)
                                                        Sabtu
                                                        @break
                                                    @default
                                                @endswitch
                                            </td>
                                            <td>
                                                @switch($jadwal->hari)
                                                    @case(1)
                                                        1 Jam Pelajaran
                                                        @break
                                                    @case(2)
                                                        2 Jam Pelajaran
                                                        @break
                                                    @case(3)
                                                        3 Jam Pelajaran
                                                        @break
                                                    @default
                                                @endswitch
                                            </td>
                                            @foreach ($query as $items)
                                            <td>{{$items->matapelajaran}}</td>
                                            <td>{{$items->nama}}</td>
                                            <td>{{$items->tahun}}</td>
                                            <td>{{$items->jurusan}}</td>
                                            @endforeach
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                        <a class="dropdown-item" href="" id="editjadwal12" data-toggle="modal" data-target="#jadwal12Modal" data-id="{{$jadwal->id}}">Edit</a>
                                                        <form action="/jadwal12/delete/{{$jadwal->id}}" method="post" >
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
                                {{$jadwal_12->links()}}
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Modal -->
<div class="modal fade" id="jadwal12Modal" tabindex="-1" aria-labelledby="ModalJadwal12Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalJadwal12Label">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body_jadwal12">
                <form action="" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="hari">Hari</label>
                        <select class="form-control" id="hari" name="hari">
                            <option value="">-- Pilih --</option>
                            <option value="1">Senin</option>
                            <option value="2">Selasa</option>
                            <option value="3">Rabu</option>
                            <option value="4">Kamis</option>
                            <option value="5">Jum'at</option>
                            <option value="6">Sabtu</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jam">Jam Pelajaran</label>
                        <select class="form-control" id="jam" name="jam">
                            <option value="">-- Pilih --</option>
                            <option value="1">1 Jam Pelajaran</option>
                            <option value="2">2 Jam Pelajaran</option>
                            <option value="3">3 Jam Pelajaran</option>
                        </select>
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
                        <label for="guru">Guru</label>
                        <select class="form-control" id="guru" name="guru">
                            <option value="">-- Pilih --</option>
                            @foreach ($guru as $guru)
                            <option value="{{$guru->id}}">{{$guru->nama}}</option>
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
                </div>
                <div class="modal-footer footer_jadwal12">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection