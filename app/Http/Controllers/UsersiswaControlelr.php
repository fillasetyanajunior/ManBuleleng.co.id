<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Perpustakaan;
use App\Models\Siswa;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UsersiswaControlelr extends Controller
{
    public function perpustakaan()
    {
        $data['perpustakaan'] = Perpustakaan::where('nama',request()->user()->name)->get();
        return view('siswa.perpustakaan.pinjaman',$data);
    }
    public function nilai()
    {
        $data['nilai'] = Nilai::where('nama',request()->user()->name)->get();
        return view('siswa.nilai.nilai',$data);
    }
    public function ujian()
    {
        $jurusan = Siswa::where('nama',request()->user()->name)->first();
        $data['ujianpraktek'] = Ujian::where('jurusan',$jurusan->jurusan)->where('tipe_ujian',1)->get();
        $data['ujiantulis'] = Ujian::where('jurusan',$jurusan->jurusan)->where('tipe_ujian',2)->get();
        return view('siswa.ujian.ujianakhir',$data);
    }
}
