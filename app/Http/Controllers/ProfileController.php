<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        if(request()->user()->role == 3)
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
            $data['siswa']      = Siswa::where('nama',request()->user()->name)->get();
            $Http               = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
            $response           = $Http['provinsi'];
            return view('siswa.profile.profile',$data,compact('response'));
        }else{
            $data['jurusan']        = Jurusan::all();
            $data['matapelajarans']  = Matapelajaran::all();
            $data['profile']        = Guru::where('nama',request()->user()->name)->first();
            return view('home.profile',$data);
        }
    }
    public function store(Request $request)
    {
        if (request()->user()->role == 3) {
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
        }else{
            // $mapel = null;
            // $jumlah_mapel = $request->mapel;
            // foreach ($jumlah_mapel as $data_items) {
            //     if ($mapel == null) {
            //         $mapel =  $data_items;
            //     }
            //     $mapels = $mapel . '/' . $data_items;
            // }

            // $jurusan = null;
            // $jumlah_jurusan = $request->jurusan;
            // foreach ($jumlah_jurusan as $data_itemss) {
            //     if ($jurusan == null) {
            //         $jurusan =  $data_itemss;
            //     }
            //     $jurusans = $jurusan . '/' . $data_itemss;
            // }

            // $kelas = null;
            // $jumlah_kelas = $request->kelas;
            // foreach ($jumlah_kelas as $data_itemsss) {
            //     if ($kelas == null) {
            //         $kelas =  $data_itemsss;
            //     }
            //     $kelass = $kelas . '/' . $data_itemsss;
            // }

            $file_berkas = Guru::where('nama',request()->user()->name)->first();
            
            if ($request->hasFile('sertifikat_pendidikan')) {

                if ($file_berkas->sertifikat_pendidikan) {
                    
                    Storage::delete('berkas/' . $file_berkas->sertifikat_pendidikan);
                }
                $file = $request->file('sertifikat_pendidikan');
                $sertifikat = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('berkas', $sertifikat);

                Guru::where('nama', request()->user()->name)
                    ->update([
                        'nama'                  => $request->nama,
                        'nuptk'                 => $request->nuptk,
                        'alamat'                => $request->alamat,
                        'nomer'                 => $request->nomer,
                        'email'                 => $request->email,
                        'lulusan'               => $request->lulusan,
                        'status'                => $request->status,
                        'sertifikat_pendidikan' => $sertifikat,
                    ]);
            }else if($request->hasFile('izasah')){

                if ($file_berkas->sertifikat_pendidikan) {

                    Storage::delete('berkas/' . $file_berkas->sertifikat_pendidikan);
                }
                $file = $request->file('izasah');
                $izasah = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('berkas', $izasah);

                Guru::where('nama', request()->user()->name)
                    ->update([
                        'nama'          => $request->nama,
                        'nuptk'         => $request->nuptk,
                        'alamat'        => $request->alamat,
                        'nomer'         => $request->nomer,
                        'email'         => $request->email,
                        'lulusan'       => $request->lulusan,
                        'status'        => $request->status,
                        'izasah'        => $izasah,
                    ]);

            }else if($request->hasFile('foto')){

                if ($file_berkas->foto) {

                    Storage::delete('profile/' . $file_berkas->foto);
                }
                $file = $request->file('foto');
                $foto = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('profile', $foto);

                Guru::where('nama', request()->user()->name)
                    ->update([
                        'nama'          => $request->nama,
                        'nuptk'         => $request->nuptk,
                        'alamat'        => $request->alamat,
                        'nomer'         => $request->nomer,
                        'email'         => $request->email,
                        'lulusan'       => $request->lulusan,
                        'status'        => $request->status,
                        'foto'          => $foto,
                    ]);

            }else if($request->hasFile('*')){

                if ($file_berkas->sertifikat_pendidikan) {

                    Storage::delete('berkas/' . $file_berkas->sertifikat_pendidikan);
                }
                $file = $request->file('izasah');
                $izasah = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('berkas', $izasah);

                if ($file_berkas->sertifikat_pendidikan) {

                    Storage::delete('berkas/' . $file_berkas->sertifikat_pendidikan);
                }
                $file = $request->file('sertifikat_pendidikan');
                $sertifikat = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('berkas', $sertifikat);

                if ($file_berkas->foto) {

                    Storage::delete('profile/' . $file_berkas->foto);
                }
                $file = $request->file('foto');
                $foto = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('profile', $foto);

                Guru::where('nama', request()->user()->name)
                    ->update([
                        'nama'                  => $request->nama,
                        'nuptk'                 => $request->nuptk,
                        'alamat'                => $request->alamat,
                        'nomer'                 => $request->nomer,
                        'email'                 => $request->email,
                        'lulusan'               => $request->lulusan,
                        'status'                => $request->status,
                        'foto'                  => $foto,
                        'sertifikat_pendidikan' => $sertifikat,
                        'izasah'                => $izasah,
                    ]);

            } else {
                Guru::where('nama',request()->user()->name)
                    ->update([
                        'nama'          => $request->nama,
                        'nuptk'         => $request->nuptk,
                        'alamat'        => $request->alamat,
                        'nomer'         => $request->nomer,
                        'email'         => $request->email,
                        'lulusan'       => $request->lulusan,
                        'status'        => $request->status,
                    ]);
            }
            return redirect()->back();
        }
    }
}
