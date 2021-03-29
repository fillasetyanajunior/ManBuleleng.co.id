<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Tahun;
use App\Models\Ulangan10;
use Illuminate\Http\Request;

class Ulangan10Controller extends Controller
{
    public function index()
    {
        $data['jadwal_10']      = Ulangan10::paginate(20);
        $data['matapelajaran']  = Matapelajaran::all();
        $data['tahun']          = Tahun::all();
        $data['jurusan']        = Jurusan::all();
        return view('admin.jadwal_ulangan.jadwal10.showjadwal', $data);
    }
    public function storeUlangan10(Request $request)
    {
        $request->validate([
            'tanggal'               => 'required',
            'jam'                   => 'required',
            'matapelajaran'         => 'required',
            'tahun'                 => 'required',
            'jurusan'               => 'required',
            'kursi'                 => 'required',
        ]);

        Ulangan10::create([
            'tanggal'           => $request->tanggal,
            'jam'               => $request->jam,
            'matapelajaran'     => $request->matapelajaran,
            'tahun'             => $request->tahun,
            'jurusan'           => $request->jurusan,
            'kursi'             => $request->kursi,
        ]);
        return redirect()->route('ulangan10')->with('status', 'Tambah Jadwal Ulangan Berhasil');
    }
    public function editUlangan10(Request $request)
    {
        $request->only('id');
        $query = Ulangan10::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateUlangan10(Request $request, Ulangan10 $ulangan10)
    {
        Ulangan10::where('id', $ulangan10->id)
            ->update([
                'tanggal'       => $request->tanggal,
                'jam'           => $request->jam,
                'matapelajaran' => $request->matapelajaran,
                'tahun'         => $request->tahun,
                'jurusan'       => $request->jurusan,
                'kursi'         => $request->kursi,
            ]);
        return redirect()->route('ulangan10')->with('status', 'Upate Jadwal Ulangan Berhasil');
    }
    public function destroy(Ulangan10 $ulangan10)
    {
        Ulangan10::destroy($ulangan10->id);
        return redirect()->route('ulangan10')->with('status', 'Delete Jadwal Ulangan Berhasil');
    }
}
