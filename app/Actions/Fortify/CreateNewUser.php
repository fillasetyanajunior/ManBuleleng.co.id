<?php

namespace App\Actions\Fortify;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'username',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $no = User::orderBy('username','DSC')->first();

        dd($no->username);

        User::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
            'password1' => Crypt::encrypt($input['password']),
            'role' => $input['role'],
        ]);
        return
        redirect()->route('user')->with('status', 'Tambah User Berhasil');
    }
    public function ViewUser()
    {
        $data['user'] = User::paginate(10);
        $data['siswa'] = Siswa::all();
        $data['guru'] = Guru::all();

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
