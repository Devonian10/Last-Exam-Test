<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'product_id',
        'quantity',
    ];

    // Jika Anda ingin menambahkan timestamp 'created_at' dan 'updated_at'
    public $timestamps = true;

    // Jika nama tabel Anda berbeda dengan konvensi Laravel
    // protected $table = 'nama_tabel_anda';

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
