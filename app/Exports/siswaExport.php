<?php

namespace App\Exports;

use App\siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class siswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return siswa::all();
    }

    public function map($siswa): array
    {
        return [
		   $siswa->Nis,	
           $siswa->namaLengkap(),
           $siswa->tgllahir,
           $siswa->jenis_kelamin,
           $siswa->alamat,
           $siswa->rataRataNilai()
        ];
    }

     public function headings(): array
    {
        return [
            'Nis',
            'Nama Lengkap',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Rata-rata Nilai'
        ];
    }
}
