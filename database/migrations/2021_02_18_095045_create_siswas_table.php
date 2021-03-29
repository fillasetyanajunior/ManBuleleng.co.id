<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('jenis_kelamin');
            $table->integer('agama');
            $table->string('nomer_hp');
            $table->string('email');
            $table->string('nama_ibu');
            $table->string('nama_bapak');
            $table->integer('pendidikan_ibu');
            $table->integer('pendidikan_bapak');
            $table->integer('pekerjaan_ibu');
            $table->integer('pekerjaan_bapak');
            $table->integer('penghasilan_ibu');
            $table->integer('penghasilan_bapak');
            $table->integer('pendidikan');
            $table->string('nama_sekolah');
            $table->string('alamat');
            $table->string('jurusan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
