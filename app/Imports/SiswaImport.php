<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\siswa;

class SiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $row) {
            $tglLahir = ($row[2] - 25569) * 86400;
            siswa::create([
                'Nis' => $row[0],
                'nama_depan' => $row[1],
                'nama_belakang' => ' ',
                'tgllahir' => gmdate('Y-m-d', $tglLahir),
                'jenis_kelamin' => $row[3],
                'alamat' => $row[4]
            ]);
        }
    }
}
