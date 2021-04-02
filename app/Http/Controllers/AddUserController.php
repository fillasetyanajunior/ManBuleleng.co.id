<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AddUserController extends Controller
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
            ]);
        if($request->role == 3){
            $no = User::orderBy('username')->first();
            if ($no->role == 3) {
                $no = User::orderBy('username', 'DESC')->where('role', 3)->first();
            }
            $nama = substr($no->username, 5, 4);
            $tambah = (int) $nama + 1;
            $thn = date('y');
            $jurusan = Siswa::where('nama',$request->name)->first();
            if(strlen($tambah) == 1){
                $username = $thn . $jurusan->jurusan . "000" . $tambah;
            }elseif(strlen($tambah) == 2){
                $username = $thn . $jurusan->jurusan . "00" . $tambah;
            }elseif(strlen($tambah) == 3){
                $username = $thn . $jurusan->jurusan . "0" . $tambah;
            }else{
                $username = $thn . $jurusan->jurusan . $tambah;
            }
    
            $int = '1234567890';
            $password = substr(str_shuffle($int), 0, 6);
    
            User::create([
                'name' => $request->name,
                'username' => $username,
                'password' => Hash::make($password),
                'password1' => Crypt::encrypt($password),
                'role' => $request->role,
            ]);
            return redirect()->route('user')->with('status', 'Tambah User Berhasil');
        }else{
            $ints = '1234567890';
            $acak = substr(str_shuffle($ints), 0, 5);
            $thn = date('ymd');
            $username = $thn . $acak;

            $int = '1234567890';
            $password = substr(str_shuffle($int), 0, 6);

            User::create([
                'name' => $request->name,
                'username' => $username,
                'password' => Hash::make($password),
                'password1' => Crypt::encrypt($password),
                'role' => $request->role,
            ]);
            return redirect()->route('user')->with('status', 'Tambah User Berhasil');
        }
    }
    public function ViewUser()
    {
        $data['user']   = User::paginate(10);
        $data['siswa']  = Siswa::all();
        $data['guru']   = Guru::all();

        return view('auth.register', $data);
    }
    public function editUser(Request $request)
    {
        $request->only('id');
        $query = User::where('id', $request->id)->get();
        foreach ($query as $item) {
            $data[] = [
                'name' => $item['name'],
                'username' => $item['username'],
                'password1' => Crypt::decrypt($item['password1']),
                'role' => $item['role'],
            ];
        }
        return response()->json([
            'status' => 'ok',
            'data' => $data
        ]);
    }
    public function updateUser(Request $request, User $user)
    {
        User::where('id', $user->id)
            ->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'role'          => $request->role,
            ]);
        return redirect()->route('user')->with('status', 'Upate User Berhasil');
    }
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('user')->with('status', 'Delete User Berhasil');

    }
}
