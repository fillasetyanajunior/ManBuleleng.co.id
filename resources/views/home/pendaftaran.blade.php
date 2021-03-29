@extends('layouts.pemdaftaran')

@section('main')	
    <div class="col-11 container my-5">
        <h1 style="color: white" class="mb-5">From Pendaftaran Siswa Baru</h1>
        <div style="background: green;color:white;" class="alert">Selamat Datang Kepada Calon Siswa Baru, Isi Data Dengan SEBENAR - BENARNYA</div>
        <form action="/pendaftaran" method="POST">
            @csrf
            <div class="d-flex bd-highlight">
                <div class="p-2 w-50 bd-highlight mr-3">
                    <div class="card">
                        <div class="card-header">
                            Data Diri Anda
                        </div>
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Full Name" name="nama" value="{{old('nama')}}">
                                </div>
                                <div class="col">
                                    <label for="nisn">NIN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" placeholder="NISN" name="nisn" value="{{old('nisn')}}">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Place Of Birth" name="tempat_lahir" value="{{old('tempat_lahir')}}">
                                </div>
                                <div class="col">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Date Of Birth" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                   <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="agama">Agama</label>
                                    <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Hindu</option>
                                        <option value="3">Budha</option>
                                        <option value="4">Kristen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label for="nomerhp">Nomer Hp</label>
                                    <input type="text" class="form-control @error('nomer_hp') is-invalid @enderror" id="nomerhp" placeholder="Phone Number" name="nomer_hp" value="{{old('nomer_hp')}}">
                                </div>
                                <div class="col">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail" name="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" placeholder="Mother's Name" name="nama_ibu" value="{{old('nama_ibu')}}">
                                </div>
                                <div class="col">
                                    <label for="nama_bapak">Nama Bapak</label>
                                    <input type="text" class="form-control @error('nama_bapak') is-invalid @enderror" id="nama_bapak" placeholder="Father's Name" name="nama_bapak" value="{{old('nama_bapak')}}">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                   <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                    <select class="form-control @error('pendidikan_ibu') is-invalid @enderror" id="pendidikan_ibu" name="pendidikan_ibu">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="pendidikan_bapak">Pendidikan Bapak</label>
                                    <select class="form-control @error('pendidikan_bapak') is-invalid @enderror" id="pendidikan_bapak" name="pendidikan_bapak">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Hindu</option>
                                        <option value="3">Budha</option>
                                        <option value="4">Kristen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                   <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <select class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu" name="pekerjaan_ibu">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="pekerjaan_bapak">Pekerjaan Bapak</label>
                                    <select class="form-control @error('pekerjaan_bapak') is-invalid @enderror" id="pekerjaan_bapak" name="pekerjaan_bapak">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Hindu</option>
                                        <option value="3">Budha</option>
                                        <option value="4">Kristen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                   <label for="penghasilan_ibu">Penghasilan Ibu</label>
                                    <select class="form-control @error('penghasilan_ibu') is-invalid @enderror" id="penghasilan_ibu" name="penghasilan_ibu">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="penghasilan_bapak">Penghasilan Bapak</label>
                                    <select class="form-control @error('penghasilan_bapak') is-invalid @enderror" id="penghasilan_bapak" name="penghasilan_bapak">
                                        <option value="">--Pilih--</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Hindu</option>
                                        <option value="3">Budha</option>
                                        <option value="4">Kristen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            Data Pendidikan
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan Terakhir</label>
                                <select class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" >
                                    <option value="">--Pilih--</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group mt-5">
                                <label for="nama_sekolah">Nama Sekolah</label>
                                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" placeholder="School Name" name="nama_sekolah" value="{{old('nama_sekolah')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 flex-shrink-1 w-50 bd-highlight ml-3">
                    <div class="card">
                        <div class="card-header">
                            Data Alamat
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="alamat">Nama Jalan/Gang</label>
                                <input type="text" class="form-control @error('nama_jalan') is-invalid @enderror" id="alamat" placeholder="Street Name/Alley" name="nama_jalan" value="{{old('nama_jalan')}}" >
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="rt">RT</label>
                                    <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" placeholder="RT" name="rt" value="{{old('rt')}}">
                                </div>
                                <div class="col">
                                    <label for="rw">RW</label>
                                    <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw" placeholder="RW" name="rw" value="{{old('rw')}}">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label for="dusun">Dusun</label>
                                    <input type="text" class="form-control @error('dusun') is-invalid @enderror" id="dusun" placeholder="DUSUN" name="dusun" value="{{old('dusun')}}">
                                </div>
                                <div class="col">
                                    <label for="desa">Desa</label>
                                    <input type="text" class="form-control @error('desa') is-invalid @enderror" id="desa" placeholder="Village" name="desa" value="{{old('desa')}}">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                   <label for="provinsi">Provinsi</label>
                                    <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                                        <option value="">--Pilih--</option>
                                        @foreach ($response as $response)
                                        <option value="{{$response['id']}}">{{$response['nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="kabupaten">Kabupaten</label>
                                    <select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-5">Kode Pos</label>
                                <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Kode Pos" name="kode_pos" value="{{old('kode_pos')}}">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            Pilihan Jurusan MAN BULELENG
                        </div>
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col">
                                   <label for="pilihan_1">Pilihan 1</label>
                                    <select class="form-control @error('pilihan_1') is-invalid @enderror" id="pilihan_1" name="pilihan_1">
                                        <option value="">--Pilih Utama--</option>
                                        @foreach ($jurusan1 as $jurusan1)
                                        <option value="{{$jurusan1->kode}}">{{$jurusan1->jurusan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="pilihan_2">Pilihan 2</label>
                                    <select class="form-control @error('pilihan_2') is-invalid @enderror" id="pilihan_2" name="pilihan_2">
                                        <option value="">--Pilih--</option>
                                        @foreach ($jurusan2 as $jurusan2)
                                        <option value="{{$jurusan2->kode}}">{{$jurusan2->jurusan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <label for="info">Info Pendaftaran MAN BULELENG</label>
                                <select class="form-control @error('info') is-invalid @enderror" id="info" name="info">
                                    <option value="">--Pilih--</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Budha</option>
                                    <option value="4">Kristen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <button type="submit" class="btn btn-primary col-2">Daftar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection