<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "transaction_details";
    protected $fillable = [
        'user_id', 'transaction_id', 'menu_id', 'status', 'kuantitas', 'harga', 'total_harga'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(Paket::class, 'menu_id', 'id');
    }
}
