<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = [
        'nama_paket', 'menu_paket', 'jumlah_order', 'harga', 'photo', 'category_id'
    ];

    public function categorys()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function cart()
    {
        return $this->hasMany(Transaction_detail::class);
    }
}
