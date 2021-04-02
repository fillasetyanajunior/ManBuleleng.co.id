<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Absen;
use App\Models\Jadwal10;
use App\Models\Jadwal11;
use App\Models\Jadwal12;
use App\Models\KodeQr;
use App\Models\Nilai;
use App\Models\Siswa;

class AbsenController extends Controller
{
    public function Absen(Request $request)
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
        
        if($presensi == true){
            
            if ($hitung->semester <= 2) {
                $data = Jadwal10::where('jurusan',$siswa->jurusan)->get();
            }elseif ($hitung->senester <= 4) {
                $data = Jadwal11::where('jurusan',$siswa->jurusan)->get();
            }else {
                $data = Jadwal12::where('jurusan',$siswa->jurusan)->get();
            }

                $datas = null;
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
                        $datas = $items->matapelajaran;
                    }
                }

                if($siswa == true && $datas != null){
                    if ($cekpresensi == null) {
                        Absen::create([
                            'nama'      =>  $siswa->nama,
                            'nis'       =>  request()->user()->username,
                            'mapel'     =>  $datas,
                        ]);
                        $response = [
                            'status'    => 'Absen Berhasil',
                        ];
                        return response()->json($response,200);
                    }else{
                        if ($cekpresensi->mapel != $datas) {
                        
                            Absen::create([
                                'nama'      =>  $siswa->nama,
                                'nis'       =>  request()->user()->username,
                                'mapel'     =>  $datas,
                            ]);
                            $response = [
                                'status'    => 'Absen Berhasil',
                            ];
                            return response()->json($response, 200);
                        } else{
                            $response = [
                                'status'    => 'Anda Sudah Absen' . $datas,
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
    public function DeleteAbsen(Absen $absen)
    {
        Absen::destroy($absen->id);
        $response = [
            'status'    => 'Absen Berhasil Di Hapus',
        ];
        return response()->json($response, 200);
    }
}
