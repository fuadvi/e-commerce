<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallerie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'barang_id',
        'image',
    ];

    // relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
