<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access_menus')->insert([
            'id_menu' => '1',
            'id_role'  => '1'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '2',
            'id_role'  => '1'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '3',
            'id_role'  => '1'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '4',
            'id_role'  => '1'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '5',
            'id_role'  => '1'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '1',
            'id_role'  => '2'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '9',
            'id_role'  => '2'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '10',
            'id_role'  => '2'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '1',
            'id_role'  => '3'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '6',
            'id_role'  => '3'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '7',
            'id_role'  => '3'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '8',
            'id_role'  => '3'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '1',
            'id_role'  => '4'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '2',
            'id_role'  => '4'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '3',
            'id_role'  => '4'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '4',
            'id_role'  => '4'
        ]);
        DB::table('access_menus')->insert([
            'id_menu' => '5',
            'id_role'  => '4'
        ]);
    }
}
