<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Inputmaterikelas;
use App\Models\KodeQr;

class CodeqrController extends Controller
{
    public function Materi(Request $request)
    {
        $data = Inputmaterikelas::where('guru',request()->user()->name)
                                ->where('mapel',$request->mapel)
                                ->where('kelas',$request->kelas)
                                ->get();

        return response()->json($data, 200);
    }
    public function Inputmateri(Request $request)
    {
        Inputmaterikelas::create([
            'judul'         => $request->judul,
            'pembahasan'    => $request->pembahasan,
            'kelas'         => $request->kelas,
            'mapel'         => $request->mapel,
            'guru'          => request()->user()->name,
        ]);

        $response = [
            'status_code' => 200,
        ];

        return response()->json($response, 200);
    }
    public function CreateCode()
    {
        $int = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode =  substr(str_shuffle($int), 0, 6);
        $Qr = KodeQr::create([
            'kode_qr'    =>  $kode
        ]);

        $response = [
            'qr'        => $Qr->kode_qr,
        ];

        return response()->json($response, 200);
    }
    public function UpdateCode(Request $request)
    {
        KodeQr::where('kode_qr', $request->qr)->delete();

        $int = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode =  substr(str_shuffle($int), 0, 6);
        $Qr = KodeQr::create([
            'kode_qr'    =>  $kode
        ]);

        $response = [
            'qr'        => $Qr->kode_qr,
        ];

        return response()->json($response, 200);
    }
    public function DeleteCode(Request $request)
    {
        KodeQr::where('kode_qr', $request->qr)->delete();

        $response = [
            'status' => 200
        ];

        return response()->json($response, 200);
    }
}
