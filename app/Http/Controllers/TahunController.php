<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $data['tahun']      = Tahun::paginate(20);
        return view('admin.tahun.showtahun', $data);
    }
    public function storeTahun(Request $request)
    {
        $request->validate([
            'tahun'                  => 'required',
        ]);

        Tahun::create([
            'tahun'              => $request->tahun,
        ]);
        return redirect()->route('tahun')->with('status', 'Tambah Tahun Berhasil');
    }
    public function editTahun(Request $request)
    {
        $request->only('id');
        $query = Tahun::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateTahun(Request $request, Tahun $tahun)
    {
        Tahun::where('id', $tahun->id)
            ->update([
                'tahun'          => $request->tahun,
            ]);
        return redirect()->route('tahun')->with('status', 'Upate Tahun Berhasil');
    }
    public function destroy(Tahun $tahun)
    {
        Tahun::destroy($tahun->id);
        return redirect()->route('tahun')->with('status', 'Delete Tahun Berhasil');
    }
}
