<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\KodeQr;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
   public function CreateCode()
   {
        $int = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode =  substr(str_shuffle($int), 0, 6);
        $Qr = KodeQr::create([
            'kode_qr'    =>  $kode
        ]);

        $response = [
            'qr' => $Qr->kode_qr,
        ];

        return response()->json($response,200);
   }
   public function UpdateCode(Request $request)
   {
        KodeQr::where('kode_qr',$request->qr)->delete();
    
        $int = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode =  substr(str_shuffle($int), 0, 6);
        $Qr = KodeQr::create([
            'kode_qr'    =>  $kode
        ]);

        $response = [
            'qr' => $Qr->kode_qr,
            'status' => $request->qr,
        ];

        return response()->json($response, 200);
      
   }

}
