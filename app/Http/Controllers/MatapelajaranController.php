<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    public function index()
    {
        $data['matapelajaran']      = Matapelajaran::paginate(20);
        return view('admin.matapelajaran.showmatapelajaran', $data);
    }
    public function storeMatapelajaran(Request $request)
    {
        $request->validate([
            'matapelajaran'                  => 'required',
        ]);

        Matapelajaran::create([
            'matapelajaran'              => $request->matapelajaran,
        ]);
        return redirect()->route('matapelajaran')->with('status', 'Tambah Matapelajaran Berhasil');
    }
    public function editMatapelajaran(Request $request)
    {
        $request->only('id');
        $query = Matapelajaran::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateMatapelajaran(Request $request, Matapelajaran $matapelajaran)
    {
        Matapelajaran::where('id', $matapelajaran->id)
            ->update([
                'matapelajaran'          => $request->matapelajaran,
            ]);
        return redirect()->route('matapelajaran')->with('status', 'Upate Matapelajaran Berhasil');
    }
    public function destroy(Matapelajaran $matapelajaran)
    {
        Matapelajaran::destroy($matapelajaran->id);
        return redirect()->route('matapelajaran')->with('status', 'Delete Matapelajaran Berhasil');
    }
}
