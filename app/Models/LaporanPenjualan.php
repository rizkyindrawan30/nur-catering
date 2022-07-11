<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    use HasFactory;
    protected $tabel = 'laporan_pendapatans';
    protected $fillable = [
        'order', 'jumlah_order', 'tanggal', 'jumlah_pendapatan', 'jumlah_pengeluaran', 'keuntungan'
    ];
}
