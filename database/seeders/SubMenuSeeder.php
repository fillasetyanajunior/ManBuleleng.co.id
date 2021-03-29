<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_menus')->insert([
            'id_menu'   => '1',
            'title'     => 'Dashboard',
            'icon'      => 'fas fa-home',
            'url'       => 'home',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '1',
            'title'     => 'My Profile',
            'icon'      => 'fas fa-user-edit',
            'url'       => 'profile',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '2',
            'title'     => 'Menu',
            'icon'      => 'fas fa-folder',
            'url'       => 'menu',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '2',
            'title'     => 'Sub Menu',
            'icon'      => 'fas fa-folder',
            'url'       => 'submenu',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '2',
            'title'     => 'Access Menu',
            'icon'      => 'fas fa-folder',
            'url'       => 'accessmenu',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '3',
            'title'     => 'Jadwal Kelas 10',
            'icon'      => 'far fa-calendar-alt',
            'url'       => 'jadwal10',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '3',
            'title'     => 'Jadwal Kelas 11',
            'icon'      => 'far fa-calendar-alt',
            'url'       => 'jadwal11',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '3',
            'title'     => 'Jadwal Kelas 12',
            'icon'      => 'far fa-calendar-alt',
            'url'       => 'jadwal12',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '4',
            'title'     => 'Jadwal Ulangan Kelas 10',
            'icon'      => 'far fa-edit',
            'url'       => 'ulangan10',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '4',
            'title'     => 'Jadwal Ulangan Kelas 11',
            'icon'      => 'far fa-edit',
            'url'       => 'ulangan11',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '4',
            'title'     => 'Jadwal Ulangan Kelas 12',
            'icon'      => 'far fa-edit',
            'url'       => 'ulangan12',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '5',
            'title'     => 'Matapelajaran',
            'icon'      => 'fas fa-chalkboard-teacher',
            'url'       => 'matapelajaran',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '5',
            'title'     => 'Jurusan',
            'icon'      => 'fas fa-laptop-code',
            'url'       => 'jurusan',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '5',
            'title'     => 'Tahun Ajaran',
            'icon'      => 'fas fa-file-signature',
            'url'       => 'tahun',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '5',
            'title'     => 'Data Pendaftaran',
            'icon'      => 'fas fa-bars',
            'url'       => 'pendaftaran/show',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '5',
            'title'     => 'Tambah User',
            'icon'      => 'fas fa-address-card',
            'url'       => 'user',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '6',
            'title'     => 'Nilai',
            'icon'      => 'fas fa-clipboard',
            'url'       => 'nilai',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '7',
            'title'     => 'Perpustakaan',
            'icon'      => 'fas fa-book',
            'url'       => 'perpustakaan',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '8',
            'title'     => 'Ujian Akhir',
            'icon'      => 'fas fa-edit',
            'url'       => 'ujian',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '9',
            'title'     => 'Input Nilai',
            'icon'      => 'fas fa-file-import',
            'url'       => 'inputnilai',
        ]);
        DB::table('sub_menus')->insert([
            'id_menu'   => '10',
            'title'     => 'Input Materi',
            'icon'      => 'fas fa-upload',
            'url'       => 'materi',
        ]);
    }
}
