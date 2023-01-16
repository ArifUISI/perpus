<?php

namespace App\Imports;

use App\Models\BukuModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BukuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BukuModel([
            'seri_buku' => $row['seri_buku'],
            'tahun_anggaran' => $row['tahun_anggaran'],
            'judul' => $row['judul'],
            'nomer_klasifikasi' => '000'. $row['nomer_klasifikasi'],
            'kondisi' => $row['kondisi'],
            'kategori' => $row['kategori'],
            'status' => $row['status'],
        ]);
    }
}
