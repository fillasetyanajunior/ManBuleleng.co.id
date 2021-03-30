@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Profile</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Profile</strong>
                            </div>
                            <div class="card-body my-n2">
                                <form action="/profile" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if ($profile->foto == null)

                                            @else
                                            <center>
                                                <img class="avatar-img" src="{{asset('profile/' . $profile->foto)}} " alt="" width="500px">
                                            </center>
                                            @endif
                                            <div class="form-group mb-3">
                                                <label for="foto">Upload File Foto</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                                    <label class="custom-file-label" for="foto">Choose file</label>
                                                </div>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" class="form-control" name="nama" value="{{$profile->nama}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="nuptk">NUPTK</label>
                                                <input type="text" id="nuptk" class="form-control" name="nuptk" value="{{$profile->nuptk}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" id="alamat" class="form-control" name="alamat" value="{{$profile->alamat}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="nomer">Nomer Hp</label>
                                                <input type="text" id="nomer" class="form-control" name="nomer" value="{{$profile->nomer}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control" name="email" value="{{$profile->email}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="lulusan">Lulusan</label>
                                                <input type="text" id="lulusan" class="form-control" name="lulusan" value="{{$profile->lulusan}}">
                                            </div>
                                            @php
                                                $mapel = explode('/',$profile->mapel);
                                                foreach ($mapel as $item) :
                                            @endphp
                                            <div class="form-group mb-3">
                                                <label for="mapel">Pengampu Mata Pelajaran {{$item}}</label>
                                                <select class="form-control" id="mapel" name="mapel[]">
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($matapelajarans as $matapelajaran)
                                                    <option value="{{$matapelajaran->id}}" @if ($item == $matapelajaran->id) selected @endif>{{$matapelajaran->matapelajaran}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @php
                                                endforeach;
                                                $kelas = explode('/',$profile->kelas);
                                                foreach ($kelas as $items) :
                                            @endphp
                                            <div class="form-group mb-3">
                                                <label for="kelas">Pengampu Kelas {{$items}} </label>
                                                <select class="form-control" id="kelas" name="kelas[]">
                                                    <option value="">--Pilih--</option>
                                                    <option value="10" @if ($items == 10) selected @endif>10</option>
                                                    <option value="11" @if ($items == 11) selected @endif>11</option>
                                                    <option value="12" @if ($items == 12) selected @endif>12</option>
                                                </select>
                                            </div>
                                            @php
                                                endforeach;
                                                $jurusans = explode('/',$profile->jurusan);
                                                foreach ($jurusans as $itemss) :
                                            @endphp
                                            <div class="form-group mb-3">
                                                <label for="jurusans">Pengampu Jurusan {{$itemss}}</label>
                                                <select class="form-control" id="jurusans" name="jurusan[]">
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($jurusan as $jurusan)
                                                    <option value="{{$jurusan->kode}}" @if ($itemss == $jurusan->kode) selected @endif>{{$jurusan->jurusan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @php
                                                endforeach;
                                            @endphp
                                            <div class="form-group mb-3">
                                                <label for="status">Pengampu Jurusan</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="">--Pilih--</option>
                                                   <option value="">--Pilih--</option>
                                                    <option value="1" @if ($profile->status == 1) selected @endif>Non PNS</option>
                                                    <option value="2" @if ($profile->status == 2) selected @endif>PNS</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>File Sertifikat Pendidikan</label>
                                                <input type="text" class="form-control" value="{{$profile->sertifikat_pendidikan}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="sertifikat_pendidikan">Upload File Sertifikat Pendidikan</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sertifikat_pendidikan" name="sertifikat_pendidikan">
                                                    <label class="custom-file-label" for="sertifikat_pendidikan">Choose file PDF</label>
                                                </div>
                                            </div>
                                             <div class="form-group mb-3">
                                                <label>File Sertifikat Pendidikan</label>
                                                <input type="text" class="form-control" value="{{$profile->izasah}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="izasah">Upload File Izasah</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="izasah" name="izasah">
                                                    <label class="custom-file-label" for="ijasah">Choose file PDF</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection