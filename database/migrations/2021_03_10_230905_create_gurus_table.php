<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nuptk');
            $table->string('alamat');
            $table->string('nomer');
            $table->string('email');
            $table->string('lulusan');
            $table->string('mapel');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('status');
            $table->string('foto')->nullable();
            $table->string('sertifikat_pendidikan')->nullable();
            $table->string('izasah')->nullable();
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
        Schema::dropIfExists('gurus');
    }
}
