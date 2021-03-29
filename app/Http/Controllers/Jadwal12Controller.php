<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal12;
use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Tahun;
use Illuminate\Http\Request;

class Jadwal12Controller extends Controller
{
    public function index()
    {
        $data['jadwal_12']      = Jadwal12::paginate(20);
        $data['matapelajaran']  = Matapelajaran::all();
        $data['guru']           = Guru::all();
        $data['tahun']          = Tahun::all();
        $data['jurusan']        = Jurusan::all();
        return view('admin.jadwal_kelas.jadwal12.showjadwal', $data);
    }
    public function storeJadwal12(Request $request)
    {
        $request->validate([
            'hari'                  => 'required',
            'jam'                   => 'required',
            'matapelajaran'         => 'required',
            'guru'                  => 'required',
            'tahun'                 => 'required',
            'jurusan'               => 'required',
        ]);

        Jadwal12::create([
            'hari'              => $request->hari,
            'jam'               => $request->jam,
            'matapelajaran'     => $request->matapelajaran,
            'guru'              => $request->guru,
            'tahun'             => $request->tahun,
            'jurusan'           => $request->jurusan,
        ]);
        return redirect()->route('jadwal12')->with('status', 'Tambah Jadwal kelas Berhasil');
    }
    public function editJadwal12(Request $request)
    {
        $request->only('id');
        $query = Jadwal12::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateJadwal12(Request $request, Jadwal12 $jadwal12)
    {
        Jadwal12::where('id', $jadwal12->id)
            ->update([
                'hari'          => $request->hari,
                'jam'           => $request->jam,
                'matapelajaran' => $request->matapelajaran,
                'guru'          => $request->guru,
                'tahun'         => $request->tahun,
                'jurusan'       => $request->jurusan,
            ]);
        return redirect()->route('jadwal12')->with('status', 'Upate Jadwal kelas Berhasil');
    }
    public function destroy(Jadwal12 $jadwal12)
    {
        Jadwal12::destroy($jadwal12->id);
        return redirect()->route('jadwal12')->with('status', 'Delete Jadwal kelas Berhasil');
    }
}
