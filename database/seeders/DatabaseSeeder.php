<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'      => 'Filla Setyana Junior',
            'username'  => 'Fillaputri217',
            'password'  => Hash::make('Fillaputri217'),
            'password1' => Crypt::encrypt('Fillaputri217'),
            'role'      => '4',
        ]);
        DB::table('siswas')->insert([
            'nama'                  => 'paijo',
            'nisn'                  => '12365478',
            'tempat_lahir'          => 'batam',
            'tanggal_lahir'         => '2002/03/31',
            'jenis_kelamin'         => 1,
            'agama'                 => 1,
            'nomer_hp'              => 23324234234,
            'email'                 => 'pantai@gmail.com',
            'nama_ibu'              => 'dawdaw',
            'nama_bapak'            => 'awdada',
            'pendidikan_ibu'        => 1,
            'pendidikan_bapak'      => 2,
            'pekerjaan_ibu'         => 3,
            'pekerjaan_bapak'       => 1,
            'penghasilan_ibu'       => 2,
            'penghasilan_bapak'     => 3,
            'pendidikan'            => 1,
            'nama_sekolah'          => 'sefsfsf',
            'alamat'                => 'wawawd/awdada/awdad/awdad/waeea/11/122/1232/123123',
            'jurusan'               => 1,
        ]);
        DB::table('gurus')->insert([
            'nama'              => 'Filla Setyana Junior',
            'nuptk'             => '1234234',
            'alamat'            => 'wawawd/awdada/awdad/awdad/waeea/11/122/1232/123123',
            'nomer'             => 2345435345,
            'email'             => 'aasasd@asda.com',
            'lulusan'           => '2345435345',
            'mapel'             => 'matematika',
            'kelas'             => '12',
            'jurusan'           => 'ipa',
            'kelas_mengajar'    => '12 ipa',
            'status'            => '1',
        ]);
        $this->call([
            MenuSeeder::class,
            SubMenuSeeder::class,
            AccessMenuSeeder::class,
        ]);
    }
}
