<?php

namespace App\Http\Controllers;

use App\Imports\NilaiImport;
use App\Models\Guru;
use App\Models\Matapelajaran;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index()
    {
        $guru = Guru::where('nama', request()->user()->name)->first();
        $data['nilai'] = Nilai::where('guru',$guru->id)->paginate(20);
        return view('guru.nilai.shownilai', $data);
    }
    public function storeNilai(Request $request)
    {
        Excel::import(new NilaiImport,$request->import_excel);
        return redirect()->route('nilai')->with('status', 'Tambah Nilai Berhasil');
    }
    public function editnilai(Request $request)
    {
        $request->only('id');
        $query = Nilai::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateNilai(Request $request, Nilai $nilai)
    {
        
        Nilai::where('id', $nilai->id)
            ->update([
                'angka'         => $request->angka,
                'huruf'         => $request->huruf,
            ]);
        return redirect()->route('nilai')->with('status', 'Upate Nilai Berhasil');
    }
    public function destroy(Nilai $nilai)
    {
        Nilai::destroy($nilai->id);
        return redirect()->route('nilai')->with('status', 'Delete Nilai Berhasil');
    }
}
