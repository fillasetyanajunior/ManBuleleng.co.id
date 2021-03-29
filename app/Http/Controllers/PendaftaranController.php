<?php

namespace App\Http\Controllers;

use App\Models\DetailPendaftaran;
use App\Models\Jurusan;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PendaftaranController extends Controller
{
    public function ViewOfPendaftaran()
    {
        $Http = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
        $data['response']   = $Http['provinsi'];
        $data['jurusan1']    = Jurusan::all();
        $data['jurusan2']    = Jurusan::all();
        return view('home.pendaftaran',$data);
    }

    public function StoreOfPendaftaran(Request $request)
    {
        $request->validate([
            'nama'                  => ['required','max:255'],
            'nisn'                  => ['required','max:15'],
            'tempat_lahir'          => ['required','max:255'],
            'tanggal_lahir'         => ['required'],
            'jenis_kelamin'         => ['required'],
            'agama'                 => ['required'],
            'nomer_hp'              => ['required','max:12'],
            'email'                 => ['required','email'],
            'nama_ibu'              => ['required'],
            'nama_bapak'            => ['required'],
            'pendidikan_ibu'        => ['required'],
            'pendidikan_bapak'      => ['required'],
            'pekerjaan_ibu'         => ['required'],
            'pekerjaan_bapak'       => ['required'],
            'penghasilan_ibu'       => ['required'],
            'penghasilan_bapak'     => ['required'],
            'pendidikan'            => ['required'],
            'nama_sekolah'          => ['required'],
            'nama_jalan'            => ['required'],
            'rt'                    => ['required'],
            'rw'                    => ['required'],
            'dusun'                 => ['required'],
            'desa'                  => ['required'],
            'kecamatan'             => ['required'],
            'kabupaten'             => ['required'],
            'provinsi'              => ['required'],
            'kode_pos'              => ['required'],
            'pilihan_1'             => ['required'],
            'pilihan_2'             => ['required'],
            'info'                  => ['required'],
        ]);

        $alamat =   $request->nama_jalan . '/' . $request->rt 
                    . '/' . $request->rw . '/' . $request->dusun
                    . '/' . $request->desa . '/' . $request->kecamatan
                    . '/' . $request->kabupaten . '/' . $request->provinsi
                    . '/' . $request->kode_pos;

        $siswa = DetailPendaftaran::create([
            'nama'                  => $request->nama,
            'nisn'                  => $request->nisn,
            'tempat_lahir'          => $request->tempat_lahir,
            'tanggal_lahir'         => $request->tanggal_lahir,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'agama'                 => $request->agama,
            'nomer_hp'              => $request->nomer_hp,
            'email'                 => $request->email,
            'nama_ibu'              => $request->nama_ibu,
            'nama_bapak'            => $request->nama_bapak,
            'pendidikan_ibu'        => $request->pendidikan_ibu,        
            'pendidikan_bapak'      => $request->pendidikan_bapak,
            'pekerjaan_ibu'         => $request->pekerjaan_ibu,
            'pekerjaan_bapak'       => $request->pekerjaan_bapak,
            'penghasilan_ibu'       => $request->penghasilan_ibu,
            'penghasilan_bapak'     => $request->penghasilan_bapak,
            'pendidikan'            => $request->pendidikan,
            'nama_sekolah'          => $request->nama_sekolah,
            'alamat'                => $alamat,
        ]);

        $permitted_chars = '0123456789';
        $kode = substr(str_shuffle($permitted_chars), 0, 8);
        $int = '1234567890';
        $password = substr(str_shuffle($int), 0, 6);

        Pendaftaran::create([
            'id_siswa'              => $siswa->id,
            'kode'                  => $kode,
            'pilihan_1'             => $request->pilihan_1,
            'pilihan_2'             => $request->pilihan_2,
            'info'                  => $request->info,
            'password'              => $password,
            'is_active'             => '1',
        ]);

        return redirect()->route('pendaftaran');
    }

    public function ShowOfPendaftaran()
    {
        $data['showpendaftaran'] = DB::table('pendaftarans')
                                    ->join('detail_pendaftarans','detail_pendaftarans.id','=','pendaftarans.id_siswa')
                                    ->paginate(20);
        $data['jurusan']   =   Jurusan::all();
        return view('admin.pendaftaran.showpendaftaran',$data);
    }

    public function editOfPendaftaran(Request $request)
    {
        $request->only('id');
        $query = DB::table('pendaftarans')
                    ->join('detail_pendaftarans', 'detail_pendaftarans.id','=','pendaftarans.id_siswa')
                    ->where('pendaftarans.id', $request->id)
                    ->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
        
    }

    public function updateOfPendaftaran(Request $request, Pendaftaran $pendaftaran)
    {
        Pendaftaran::where('id', $pendaftaran->id)
            ->update([
                'is_active'         => $request->active,
            ]);
        if($request->active == 3)
        {
            $pindah = DB::table('pendaftarans')
                        ->join('detail_pendaftarans', 'detail_pendaftarans.id', '=', 'pendaftarans.id_siswa')
                        ->where('pendaftarans.id', $pendaftaran->id)
                        ->get();
            Siswa::create([
                'nama'                  => $pindah['0']->nama,
                'nisn'                  => $pindah['0']->nisn,
                'tempat_lahir'          => $pindah['0']->tempat_lahir,
                'tanggal_lahir'         => $pindah['0']->tanggal_lahir,
                'jenis_kelamin'         => $pindah['0']->jenis_kelamin,
                'agama'                 => $pindah['0']->agama,
                'nomer_hp'              => $pindah['0']->nomer_hp,
                'email'                 => $pindah['0']->email,
                'nama_ibu'              => $pindah['0']->nama_ibu,
                'nama_bapak'            => $pindah['0']->nama_bapak,
                'pendidikan_ibu'        => $pindah['0']->pendidikan_ibu,
                'pendidikan_bapak'      => $pindah['0']->pendidikan_bapak,
                'pekerjaan_ibu'         => $pindah['0']->pekerjaan_ibu,
                'pekerjaan_bapak'       => $pindah['0']->pekerjaan_bapak,
                'penghasilan_ibu'       => $pindah['0']->penghasilan_ibu,
                'penghasilan_bapak'     => $pindah['0']->penghasilan_bapak,
                'pendidikan'            => $pindah['0']->pendidikan,
                'nama_sekolah'          => $pindah['0']->nama_sekolah,
                'alamat'                => $pindah['0']->alamat,
                'jurusan'               => $request->jurusan,
                'foto'                  => '',
            ]);
        }
        return redirect()->route('showpendaftaran')->with('status', 'Upate Jadwal Ulangan Berhasil');
    }
}
