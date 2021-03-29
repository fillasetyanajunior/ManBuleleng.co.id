<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data['jurusan']      = Jurusan::paginate(10);
        return view('admin.jurusan.showjurusan', $data);
    }
    public function storeJurusan(Request $request)
    {
        $request->validate([
            'jurusan'                  => 'required',
        ]);

        $int = '1234567890';
        $kode = substr(str_shuffle($int), 0, 2);

        Jurusan::create([
            'kode'                  => $kode,
            'jurusan'               => $request->jurusan,
        ]);
        return redirect()->route('jurusan')->with('status', 'Tambah Jurusan Berhasil');
    }
    public function editJurusan(Request $request)
    {
        $request->only('id');
        $query = Jurusan::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateJurusan(Request $request, Jurusan $jurusan)
    {
        Jurusan::where('id', $jurusan->id)
            ->update([
                'jurusan'          => $request->jurusan,
            ]);
        return redirect()->route('jurusan')->with('status', 'Upate Jurusan Berhasil');
    }
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->id);
        return redirect()->route('jurusan')->with('status', 'Delete Jurusan Berhasil');
    }
}
