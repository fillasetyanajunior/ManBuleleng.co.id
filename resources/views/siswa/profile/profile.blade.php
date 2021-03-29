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
                </div>
                @foreach ($siswa as $siswa)
                <form action="/profile" method="post">
                    @method('patch')
                    @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Biodata</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-5">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="nama" value="{{$siswa->nama}}">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="nisn">NISN</label>
                                    <input type="text" id="nisn" class="form-control" name="nisn" value="{{$siswa->nisn}}">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" value="{{$siswa->tempat_lahir}}">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="{{$siswa->tanggal_lahir}}">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        <option value="">--Pilih--</option>
                                        @foreach ($jurusan as $jurusan)
                                        <option value="{{$jurusan->kode}}" @if ($siswa->jurusan == $jurusan->kode) selected @endif>{{$jurusan->jurusan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">--Pilih--</option>
                                        <option value="1" @if ($siswa->jenis_kelamin == 1) selected @endif>Laki - Laki</option>
                                        <option value="2" @if ($siswa->jenis_kelamin == 2) selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="agama">Agama</label>
                                    <select class="form-control" id="agama" name="agama">
                                        <option value="">--Pilih--</option>
                                        <option value="1" @if ($siswa->agama == 1) selected @endif>Islam</option>
                                        <option value="2" @if ($siswa->agama == 2) selected @endif>Hindu</option>
                                        <option value="3" @if ($siswa->agama == 3) selected @endif>Budha</option>
                                        <option value="4" @if ($siswa->agama == 4) selected @endif>Kristen</option>
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="nomer_hp">Nomer Hp</label>
                                    <input type="text" id="nomer_hp" class="form-control" name="nomer_hp" value="{{$siswa->nomer_hp}}">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" name="email" value="{{$siswa->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="card shadow mt-4">
                            <div class="card-header">
                                <strong class="card-title">Pendidikan Terakhir</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-5">
                                    <label for="pendidikan">Pendidikan</label>
                                    <select class="form-control" id="pendidikan" name="pendidikan">
                                        <option value="">--Pilih--</option>
                                        <option value="1" @if ($siswa->pendidikan == 1) selected @endif>SMP</option>
                                        <option value="2" @if ($siswa->pendidikan == 2) selected @endif>MTS</option>
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="nama_sekolah">Nama Sekolah</label>
                                    <input type="text" id="nama_sekolah" class="form-control" name="nama_sekolah" value="{{$siswa->nama_sekolah}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Biodata Orang tua</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="nama_bapak">Nama Bapak</label>
                                            <input type="text" id="nama_bapak" class="form-control" name="nama_bapak" value="{{$siswa->nama_bapak}}">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="pendidikan_bapak">Pendidikan Bapak</label>
                                            <select class="form-control" id="pendidikan_bapak" name="pendidikan_bapak">
                                                <option value="">--Pilih--</option>
                                                <option value="1" @if ($siswa->pendidikan_bapak == 1) selected @endif>Islam</option>
                                                <option value="2" @if ($siswa->pendidikan_bapak == 2) selected @endif>Hindu</option>
                                                <option value="3" @if ($siswa->pendidikan_bapak == 3) selected @endif>Budha</option>
                                                <option value="4" @if ($siswa->pendidikan_bapak == 4) selected @endif>Kristen</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="nama_ibu">Nama Ibu</label>
                                            <input type="text" id="nama_ibu" class="form-control" name="nama_ibu" value="{{$siswa->nama_ibu}}">
                                            
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                            <select class="form-control" id="pendidikan_ibu" name="pendidikan_ibu">
                                                <option value="">--Pilih--</option>
                                                <option value="1" @if ($siswa->pendidikan_ibu == 1) selected @endif>Islam</option>
                                                <option value="2" @if ($siswa->pendidikan_ibu == 2) selected @endif>Hindu</option>
                                                <option value="3" @if ($siswa->pendidikan_ibu == 3) selected @endif>Budha</option>
                                                <option value="4" @if ($siswa->pendidikan_ibu == 4) selected @endif>Kristen</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="pekerjaan_bapak">Pekerjaan Bapak</label>
                                            <select class="form-control" id="pekerjaan_bapak" name="pekerjaan_bapak">
                                                <option value="">--Pilih--</option>
                                                <option value="1" @if ($siswa->pekerjaan_bapak == 1) selected @endif>Islam</option>
                                                <option value="2" @if ($siswa->pekerjaan_bapak == 2) selected @endif>Hindu</option>
                                                <option value="3" @if ($siswa->pekerjaan_bapak == 3) selected @endif>Budha</option>
                                                <option value="4" @if ($siswa->pekerjaan_bapak == 4) selected @endif>Kristen</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="penghasilan_bapak">Penghasilan Bapak</label>
                                            <select class="form-control" id="penghasilan_bapak" name="penghasilan_bapak">
                                                <option value="">--Pilih--</option>
                                                <option value="1" @if ($siswa->penghasilan_bapak == 1) selected @endif>Islam</option>
                                                <option value="2" @if ($siswa->penghasilan_bapak == 2) selected @endif>Hindu</option>
                                                <option value="3" @if ($siswa->penghasilan_bapak == 3) selected @endif>Budha</option>
                                                <option value="4" @if ($siswa->penghasilan_bapak == 4) selected @endif>Kristen</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                            <select class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu">
                                                <option value="">--Pilih--</option>
                                                <option value="1" @if ($siswa->pekerjaan_ibu == 1) selected @endif>Islam</option>
                                                <option value="2" @if ($siswa->pekerjaan_ibu == 2) selected @endif>Hindu</option>
                                                <option value="3" @if ($siswa->pekerjaan_ibu == 3) selected @endif>Budha</option>
                                                <option value="4" @if ($siswa->pekerjaan_ibu == 4) selected @endif>Kristen</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="penghasilan_ibu">Penghasilan Ibu</label>
                                            <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu">
                                                <option value="">--Pilih--</option>
                                                <option value="1" @if ($siswa->penghasilan_ibu == 1) selected @endif>Islam</option>
                                                <option value="2" @if ($siswa->penghasilan_ibu == 2) selected @endif>Hindu</option>
                                                <option value="3" @if ($siswa->penghasilan_ibu == 3) selected @endif>Budha</option>
                                                <option value="4" @if ($siswa->penghasilan_ibu == 4) selected @endif>Kristen</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow mt-4">
                            <div class="card-header">
                                <strong class="card-title">Alamat</strong>
                            </div>
                            @php
                                $alamat = explode('/',$siswa->alamat);
                            @endphp
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="alamat">Nama Jalan/Gang</label>
                                            <input type="text" id="alamat" class="form-control" name="alamat" value="{{$alamat[0]}}">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="rt">RT</label>
                                            <input type="text" id="rt" class="form-control" name="rt" value="{{$alamat[1]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="rw">RW</label>
                                            <input type="text" id="rw" class="form-control" name="rw" value="{{$alamat[2]}}">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="dusun">Dusun</label>
                                            <input type="text" id="dusun" class="form-control" name="dusun" value="{{$alamat[3]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="desa">Desa</label>
                                            <input type="text" id="desa" class="form-control" name="desa" value="{{$alamat[4]}}">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="kabupaten">Kabupaten</label>
                                            <select class="form-control" id="kabupaten" name="kabupaten">
                                                <option value="">--Pilih--</option>
                                                @foreach ($kabupaten as $items)
                                                <option value="{{$items['id']}}" @if ($alamat['6'] == $items['id']) selected @endif>{{$items['nama']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="provinsi">Provinsi</label>
                                            <select class="form-control" id="provinsi" name="provinsi">
                                                <option value="">--Pilih--</option>
                                                @foreach ($response as $item)
                                                <option value="{{$item['id']}}" @if ($alamat['7'] == $item['id']) selected @endif>{{$item['nama']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="kecamatan">Kecamatan</label>
                                            <select class="form-control" id="kecamatan" name="kecamatan">
                                                <option value="">--Pilih--</option>
                                                @foreach ($kecamatan as $itemss)
                                                <option value="{{$itemss['id']}}" @if ($alamat['5'] == $itemss['id']) selected @endif>{{$itemss['nama']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group mb-5">
                                            <label for="kode_pos">Kode Pos</label>
                                            <input type="text" id="kode_pos" class="form-control" name="kode_pos" value="{{$alamat[8]}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                    </div>
                </div>
                </form>
                @endforeach
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection