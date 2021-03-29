<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function siswa()
    {
        return $this->hasMany(Pendaftaran::class,'id_siswa');
    }
}
