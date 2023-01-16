<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'seri_buku',
        'tahun_anggaran',
        'judul',
        'nomer_klasifikasi',
        'kondisi',
        'kategori',
        'status',
    ];
}
