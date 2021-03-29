<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index()
    {
        $data['mapel'] = Matapelajaran::all();
        $data['materi'] = Materi::paginate(20);
        return view('guru.materi.showmateri', $data);
    }
    public function storeMateri(Request $request)
    {
        $request->validate([
            'mapel'     => 'required',
            'judul'     => 'required',
            'kelas'     => 'required',
            'filepdf'   => 'required',
        ]);

        if($request->file('filepdf')){

            $file = $request->file('filepdf');
            $name = $request->judul . rand(1, 100) . '.' . $file->extension();
            $file->storeAs('materi', $name);

            Materi::create([
                'mapel'         => $request->mapel,
                'judul'         => $request->judul,
                'kelas'         => $request->kelas,
                'file_pdf'      => $name,
            ]);
            return redirect()->route('materi')->with('status', 'Tambah Materi Berhasil');
        }else{
            return redirect()->route('materi')->with('status', 'Tambah Materi Gagal');
        }
    }
    public function editMateri(Request $request)
    {
        $request->only('id');
        $query = Materi::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateMateri(Request $request, Materi $materi)
    {
        if ($request->hasFile('filepdf')) {

            Storage::delete('file/' . $materi->file_pdf);

            $file = $request->file('filepdf');
            $name = $request->judul . rand(1, 100) . '.' . $file->extension();
            $file->storeAs('materi', $name);

            Materi::where('id', $materi->id)
                ->update([
                    'mapel'         => $request->mapel,
                    'judul'         => $request->judul,
                    'kelas'         => $request->kelas,
                    'file_pdf'      => $name,
                ]);
        } else {
        Materi::where('id', $materi->id)
                ->update([
                'mapel'         => $request->mapel,
                'judul'         => $request->judul,
                'kelas'         => $request->kelas,
            ]);
        }
        return redirect()->route('materi')->with('status', 'Upate Materi Berhasil');
    }
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi->id);
        return redirect()->route('materi')->with('status', 'Delete Materi Berhasil');
    }
}
