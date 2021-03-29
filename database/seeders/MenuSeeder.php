<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'title' => 'Home',
            'icon'  => 'fas fa-home'
        ]);
        DB::table('menus')->insert([
            'title' => 'Management Menu',
            'icon'  => 'fas fa-folder'
        ]);
        DB::table('menus')->insert([
            'title' => 'Management Jadwal',
            'icon'  => 'fas fa-calendar-alt'
        ]);
        DB::table('menus')->insert([
            'title' => 'Management Ulangan',
            'icon'  => 'fas fa-edit'
        ]);
        DB::table('menus')->insert([
            'title' => 'Management Sekolah',
            'icon'  => 'fas fa-school'
        ]);
        DB::table('menus')->insert([
            'title' => 'Nilai',
            'icon'  => 'far fa-clipboard'
        ]);
        DB::table('menus')->insert([
            'title' => 'Perpustakaan',
            'icon'  => 'fas fa-book'
        ]);
        DB::table('menus')->insert([
            'title' => 'Ujian Akhir',
            'icon'  => 'fas fa-edit'
        ]);
        DB::table('menus')->insert([
            'title' => 'Input Nilai',
            'icon'  => 'fas fa-file-import'
        ]);
        DB::table('menus')->insert([
            'title' => 'Input Materi',
            'icon'  => 'fas fa-upload'
        ]);
    }
}
