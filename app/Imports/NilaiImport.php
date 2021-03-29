<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\ToModel;

class NilaiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        $guru = Guru::where('nama', request()->user()->name)->first();
        return new Nilai([
            'nama'     => $row[1],
            'angka'    => $row[2],
            'huruf'    => $row[3],
            'mapel'    => $row[4],
            'guru'     => $guru->id,
        ]);
    }
}
