<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('nama', request()->user()->name)->first();

        $alamat = explode('/', $siswa->alamat);

        $kabupaten = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota', [
            'id_provinsi' => $alamat['7']
        ])->json();

        $kecamatan = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kecamatan', [
            'id_kota' =>  $alamat['6']
        ])->json();
        
        
        $data['kabupaten']  = $kabupaten['kota_kabupaten'];
        $data['kecamatan']  = $kecamatan['kecamatan'];
        $data['jurusan']    = Jurusan::all();
        $data['siswa'] = Siswa::where('nama',request()->user()->name)->get();
        $Http = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
        $response = $Http['provinsi'];
        return view('siswa.profile.profile',$data,compact('response'));
    }
    public function store(Request $request)
    {
        $alamat =   $request->nama_jalan . '/' . $request->rt
            . '/' . $request->rw . '/' . $request->dusun
            . '/' . $request->desa . '/' . $request->kecamatan
            . '/' . $request->kabupaten . '/' . $request->provinsi
            . '/' . $request->kode_pos;

        Siswa::where('nama',request()->user()->name)
            ->update([
            'nama'                  => $request->nama,
            'nisn'                  => $request->nisn,
            'tempat_lahir'          => $request->tempat_lahir,
            'tanggal_lahir'         => $request->tanggal_lahir,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'agama'                 => $request->agama,
            'nomer_hp'              => $request->nomer_hp,
            'email'                 => $request->email,
            'nama_ibu'              => $request->nama_ibu,
            'nama_bapak'            => $request->nama_bapak,
            'pendidikan_ibu'        => $request->pendidikan_ibu,
            'pendidikan_bapak'      => $request->pendidikan_bapak,
            'pekerjaan_ibu'         => $request->pekerjaan_ibu,
            'pekerjaan_bapak'       => $request->pekerjaan_bapak,
            'penghasilan_ibu'       => $request->penghasilan_ibu,
            'penghasilan_bapak'     => $request->penghasilan_bapak,
            'pendidikan'            => $request->pendidikan,
            'nama_sekolah'          => $request->nama_sekolah,
            'alamat'                => $alamat,
            'jurusan'               => $request->jurusan,
        ]);
        return redirect()->back();
    }
}
