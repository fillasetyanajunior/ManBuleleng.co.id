<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Tahun;
use App\Models\Ulangan11;
use Illuminate\Http\Request;

class Ulangan11Controller extends Controller
{
    public function index()
    {
        $data['jadwal_11']      = Ulangan11::paginate(20);
        $data['matapelajaran']  = Matapelajaran::all();
        $data['tahun']          = Tahun::all();
        $data['jurusan']        = Jurusan::all();
        return view('admin.jadwal_ulangan.jadwal11.showjadwal', $data);
    }
    public function storeUlangan11(Request $request)
    {
        $request->validate([
            'tanggal'               => 'required',
            'jam'                   => 'required',
            'matapelajaran'         => 'required',
            'tahun'                 => 'required',
            'jurusan'               => 'required',
            'kursi'                 => 'required',
        ]);

        Ulangan11::create([
            'tanggal'           => $request->tanggal,
            'jam'               => $request->jam,
            'matapelajaran'     => $request->matapelajaran,
            'tahun'             => $request->tahun,
            'jurusan'           => $request->jurusan,
            'kursi'             => $request->kursi,
        ]);
        return redirect()->route('ulangan11')->with('status', 'Tambah Jadwal Ulangan Berhasil');
    }
    public function editUlangan11(Request $request)
    {
        $request->only('id');
        $query = Ulangan11::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateUlangan11(Request $request, Ulangan11 $ulangan11)
    {
        Ulangan11::where('id', $ulangan11->id)
            ->update([
                'tanggal'       => $request->tanggal,
                'jam'           => $request->jam,
                'matapelajaran' => $request->matapelajaran,
                'tahun'         => $request->tahun,
                'jurusan'       => $request->jurusan,
                'kursi'         => $request->kursi,
            ]);
        return redirect()->route('ulangan11')->with('status', 'Upate Jadwal Ulangan Berhasil');
    }
    public function destroy(Ulangan11 $ulangan11)
    {
        Ulangan11::destroy($ulangan11->id);
        return redirect()->route('ulangan11')->with('status', 'Delete Jadwal Ulangan Berhasil');
    }
}
