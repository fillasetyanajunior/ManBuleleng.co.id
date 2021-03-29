<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal11;
use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Tahun;
use Illuminate\Http\Request;

class Jadwal11Controller extends Controller
{
    public function index()
    {
        $data['jadwal_11']      = Jadwal11::paginate(20);
        $data['matapelajaran']  = Matapelajaran::all();
        $data['guru']           = Guru::all();
        $data['tahun']          = Tahun::all();
        $data['jurusan']        = Jurusan::all();
        return view('admin.jadwal_kelas.jadwal11.showjadwal', $data);
    }
    public function storeJadwal11(Request $request)
    {
        $request->validate([
            'hari'                  => 'required',
            'jam'                   => 'required',
            'matapelajaran'         => 'required',
            'guru'                  => 'required',
            'tahun'                 => 'required',
            'jurusan'               => 'required',
        ]);

        Jadwal11::create([
            'hari'              => $request->hari,
            'jam'               => $request->jam,
            'matapelajaran'     => $request->matapelajaran,
            'guru'              => $request->guru,
            'tahun'             => $request->tahun,
            'jurusan'           => $request->jurusan,
        ]);
        return redirect()->route('jadwal11')->with('status', 'Tambah Jadwal kelas Berhasil');
    }
    public function editJadwal11(Request $request)
    {
        $request->only('id');
        $query = Jadwal11::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateJadwal11(Request $request, Jadwal11 $jadwal11)
    {
        Jadwal11::where('id', $jadwal11->id)
            ->update([
                'hari'          => $request->hari,
                'jam'           => $request->jam,
                'matapelajaran' => $request->matapelajaran,
                'guru'          => $request->guru,
                'tahun'         => $request->tahun,
                'jurusan'       => $request->jurusan,
            ]);
        return redirect()->route('jadwal11')->with('status', 'Upate Jadwal kelas Berhasil');
    }
    public function destroy(Jadwal11 $jadwal11)
    {
        Jadwal11::destroy($jadwal11->id);
        return redirect()->route('jadwal11')->with('status', 'Delete Jadwal kelas Berhasil');
    }
}
