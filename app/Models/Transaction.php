<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "transactions";
    protected $fillable = [
        'user_id',
        'transaksi_kode',
        'nama',
        'email',
        'kontak',
        'alamat',
        'tanggal_pengiriman',
        'waktu_pengiriman',
        'jenis_pembayaran',
        'bukti_pembayaran',
        'total_transaksi',
        'status_transaksi'
    ];

    public function detail()
    {
        return $this->hasMany(Transaction_detail::class, 'transaction_id');
    }
}
