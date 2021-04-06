<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Absen;
use App\Models\Jadwal10;
use App\Models\Jadwal11;
use App\Models\Jadwal12;
use App\Models\Jurusan;
use App\Models\KodeQr;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Tahun;
use App\Models\User;

class AbsenController extends Controller
{
    public function AbsenMobile(Request $request)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $presensi       = KodeQr::where('kode_qr',$request->kodeqr)->first();
        $siswa          = Siswa::where('nama',request()->user()->name)->first();
        $hitung         = Nilai::orderBy('semester','DESC')->where('nama', request()->user()->name)->first();
        $date           = date('h:i');
        $dateHari       = $hari[date('N')];
        $cekpresensi    = Absen::orderBy('created_at','DESC')->where('nis', request()->user()->username)->first();
        $tahun          = Tahun::orderBy('created_at', 'DESC')->first();
        $jurusans       = Jurusan::all();
        
        if($presensi == true){
            
            if ($hitung->semester <= 2) {
                $data = Jadwal10::where('jurusan',$siswa->jurusan)->get();
                $kelas = "10";
            }elseif ($hitung->senester <= 4) {
                $data = Jadwal11::where('jurusan',$siswa->jurusan)->get();
                $kelas = "11";
            }else {
                $data = Jadwal12::where('jurusan',$siswa->jurusan)->get();
                $kelas = "12";
            }

            $jurusan = null;
            foreach ($jurusans as $itemjurusan) {
                if ($siswa->jurusan == $itemjurusan->kode) {
                    $jurusan = $itemjurusan->jurusan;
                }
            }

            $datas = null;
            $guru = null;
            foreach ($data as $items) {
                    if ($items->hari == '1') {
                        $hari = "Senin";
                    } elseif ($items->hari == '2') {
                        $hari = "Selasa";
                    } elseif ($items->hari == '3') {
                        $hari = "Rabu";
                    } elseif ($items->hari == '4') {
                        $hari = "Kamis";
                    } elseif ($items->hari == '5') {
                        $hari = "Jum`at";
                    }else {
                        $hari = "Sabtu";
                    }
                    if ($date >= $items->jam && $dateHari == $hari) {
                        $datas  = $items->matapelajaran;
                        $guru   = $items->guru;
                    }
                }

                if($siswa == true && $datas != null){
                    if ($cekpresensi == null) {
                        Absen::create([
                            'jam'       => date('h:m:i'),
                            'tanggal'   => date('DD/MM/YY'),
                            'nama'      =>  $siswa->nama,
                            'nis'       =>  request()->user()->username,
                            'mapel'     =>  $datas,
                            'kelas'     =>  $kelas . " " . $jurusan,
                            'tahun'     =>  $tahun,
                            'guru'      =>  $guru,
                        ]);
                        $response = [
                            'status'    => 'Absen Berhasil',
                        ];
                        return response()->json($response,200);
                    }else{
                        if ($cekpresensi->mapel != $datas) {
                        
                            Absen::create([
                                'jam'       => date('h:m:i'),
                                'tanggal'   => date('DD/MM/YY'),
                                'nama'      =>  $siswa->nama,
                                'nis'       =>  request()->user()->username,
                                'mapel'     =>  $datas,
                                'kelas'     =>  $kelas . " " . $jurusan,
                                'tahun'     =>  $tahun,
                                'guru'      =>  $guru,
                            ]);
                            $response = [
                                'status'    => 'Absen Berhasil',
                            ];
                            return response()->json($response, 200);
                        } else{
                            $response = [
                                'status'    => 'Anda Sudah Absen',
                            ];
                            return response()->json($response, 200);
                        }
                    }
                }else{
                    $response = [
                        'status'    => 'Absen Gagal' ,
                    ];
                    return response()->json($response, 200);
                }
        }else{
            $response = [
                'status'    => 'Absen Gagal',
            ];
            return response()->json($response,200);
        }
    }
    public function AbsenDekstop(Request $request)
    {
        $user           = User::where('username',$request->nis)->first();
        $siswa          = Siswa::where('nama', $user->name)->first();
        $tahun          = Tahun::orderBy('created_at','DESC')->first();
        $absen          = Absen::orderBy('tanggal','DESC')->where('nama',$user->name)->first();

        if ($user == true) {
            if ($siswa == true) {
               
                Absen::create([
                    'jam'       =>  date('h:i:s'),
                    'tanggal'   =>  date('Y/m/d'),
                    'nama'      =>  $siswa->nama,
                    'nis'       =>  $request->nis,
                    'mapel'     =>  $request->mapel,
                    'kelas'     =>  $request->kelas,
                    'tahun'     =>  $tahun->tahun,
                    'guru'      =>  request()->user()->name,
                ]);

                $response = [
                    'status'        => 200,
                    'status_text'   => 'Absen Berhasil'
                ];
                return response()->json($response, 200);
            }else {
                    $response = [
                        'status'        => 200,
                        'status_text'   => 'Anda Sudah Absen'.  date('Y/m/d'),
                    ];
                    return response()->json($response, 200);
            }
        } else {
            $response = [
                'status'        => 200,
                'status_text'   => 'Absen Gagal',
            ];
            return response()->json($response, 200);
        }
    }
    public function showAbsen(Request $request)
    {
        $response = Absen::where('mapel',$request->mapel)
                        ->where('guru',request()->user()->name)
                        ->get();
        return response()->json($response, 200);
    }
    public function DeleteAbsen(Absen $absen)
    {
        Absen::destroy($absen->id);
        $response = [
            'status'    => 'Absen Berhasil Di Hapus'
        ];
        return response()->json($response, 200);
    }
}
