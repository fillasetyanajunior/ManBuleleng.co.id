<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Tahun;
use App\Models\Ulangan12;
use Illuminate\Http\Request;

class Ulangan12Controller extends Controller
{
    public function index()
    {
        $data['jadwal_12']      = Ulangan12::paginate(20);
        $data['matapelajaran']  = Matapelajaran::all();
        $data['tahun']          = Tahun::all();
        $data['jurusan']        = Jurusan::all();
        return view('admin.jadwal_ulangan.jadwal12.showjadwal', $data);
    }
    public function storeUlangan12(Request $request)
    {
        $request->validate([
            'tanggal'               => 'required',
            'jam'                   => 'required',
            'matapelajaran'         => 'required',
            'tahun'                 => 'required',
            'jurusan'               => 'required',
            'kursi'                 => 'required',
        ]);

        Ulangan12::create([
            'tanggal'           => $request->tanggal,
            'jam'               => $request->jam,
            'matapelajaran'     => $request->matapelajaran,
            'tahun'             => $request->tahun,
            'jurusan'           => $request->jurusan,
            'kursi'             => $request->kursi,
        ]);
        return redirect()->route('ulangan12')->with('status', 'Tambah Jadwal Ulangan Berhasil');
    }
    public function editUlangan12(Request $request)
    {
        $request->only('id');
        $query = Ulangan12::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateUlangan12(Request $request, Ulangan12 $ulangan12)
    {
        Ulangan12::where('id', $ulangan12->id)
            ->update([
                'tanggal'       => $request->tanggal,
                'jam'           => $request->jam,
                'matapelajaran' => $request->matapelajaran,
                'tahun'         => $request->tahun,
                'jurusan'       => $request->jurusan,
                'kursi'         => $request->kursi,
            ]);
        return redirect()->route('ulangan12')->with('status', 'Upate Jadwal Ulangan Berhasil');
    }
    public function destroy(Ulangan12 $ulangan12)
    {
        Ulangan12::destroy($ulangan12->id);
        return redirect()->route('ulangan12')->with('status', 'Delete Jadwal Ulangan Berhasil');
    }
}
