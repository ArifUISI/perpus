<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    protected $table = 'pinjam';
    protected $fillable = [
        'id_admin',
        'id_siswa',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali'
    ];
}
