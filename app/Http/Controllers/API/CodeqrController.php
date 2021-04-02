<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Inputmaterikelas;
use App\Models\KodeQr;

class CodeqrController extends Controller
{
    public function Materi()
    {
        $data = Inputmaterikelas::where('nama',request()->user()->name)->get();

        $response = [
            'status'    => 'Success',
            'data'      => $data,
        ];

        return response()->json($response, 200);
    }
    public function Inputmateri(Request $request)
    {
        Inputmaterikelas::create([
            'judul'         => $request->judul,
            'pembahasan'    => $request->pembahasan,
            'deskripsi'     => $request->deskripsi,
            'kelas'         => $request->kelas,
            'guru'          => request()->user()->name,
        ]);

        $response = [
            'status' => 'Success',
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
            'qr' => $Qr->kode_qr,
            'status' => 'Success',
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
            'qr' => $Qr->kode_qr,
            'status' => 'Success',
        ];

        return response()->json($response, 200);
    }
    public function DeleteCode(Request $request)
    {
        KodeQr::where('kode_qr', $request->qr)->delete();

        $response = [
            'status' => 'Success',
        ];

        return response()->json($response, 200);
    }
}
