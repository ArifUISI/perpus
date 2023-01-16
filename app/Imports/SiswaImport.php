<?php

namespace App\Imports;

use App\Models\SiswaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $replaced = Str::replace('`', '', $row['nisn']);
        return new SiswaModel([
            'nisn' => $replaced,
            'nama' => $row['nama'],
            'kelas' => $row['kelas'],
            'kelamin' => $row['kelamin'],
            'seluler' => '+62'. $row['seluler'],
            'alamat' => ($row['alamat'] .', RT '. $row['rt'] .', RW '. $row['rw'] .', Kel. '. $row['kelurahan'] .', Kec. '. $row['kecamatan'] .', Kota '. $row['kota'] .', Kodepos '. $row['kodepos'])
        ]);
    }
}
