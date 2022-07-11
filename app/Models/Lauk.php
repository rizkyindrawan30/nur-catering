<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lauk extends Model
{
    use HasFactory;
    protected $tabel = 'lauks';
    protected $fillable = [
        'nama_lauk', 'harga', 'list'
    ];
}
