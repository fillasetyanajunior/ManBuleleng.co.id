<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal10;
use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Tahun;
use Illuminate\Http\Request;

class Jadwal10Controller extends Controller
{
    public function index()
    {
        $data['jadwal_10']      = Jadwal10::paginate(20);
        $data['matapelajaran']  = Matapelajaran::all();
        $data['guru']           = Guru::all();
        $data['tahun']          = Tahun::all();
        $data['jurusan']        = Jurusan::all();
        return view('admin.jadwal_kelas.jadwal10.showjadwal', $data);
    }
    public function storeJadwal10(Request $request)
    {
        $request->validate([
            'hari'                  => 'required',
            'jam'                   => 'required',
            'matapelajaran'         => 'required',
            'guru'                  => 'required',
            'tahun'                 => 'required',
            'jurusan'               => 'required',
        ]);

        Jadwal10::create([
            'hari'              => $request->hari,
            'jam'               => $request->jam,
            'matapelajaran'     => $request->matapelajaran,
            'guru'              => $request->guru,
            'tahun'             => $request->tahun,
            'jurusan'           => $request->jurusan,
        ]);
        return redirect()->route('jadwal10')->with('status', 'Tambah Jadwal kelas Berhasil');
    }
    public function editJadwal10(Request $request)
    {
        $request->only('id');
        $query = Jadwal10::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateJadwal10(Request $request, Jadwal10 $jadwal10)
    {
        Jadwal10::where('id', $jadwal10->id)
            ->update([
                'hari'          => $request->hari,
                'jam'           => $request->jam,
                'matapelajaran' => $request->matapelajaran,
                'guru'          => $request->guru,
                'tahun'         => $request->tahun,
                'jurusan'       => $request->jurusan,
            ]);
        return redirect()->route('jadwal10')->with('status', 'Upate Jadwal kelas Berhasil');
    }
    public function destroy(Jadwal10 $jadwal10)
    {
        Jadwal10::destroy($jadwal10->id);
        return redirect()->route('jadwal10')->with('status', 'Delete Jadwal kelas Berhasil');
    }
}
