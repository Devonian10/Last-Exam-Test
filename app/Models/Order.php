<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['users_id', 'product_id', 'Alamat_pengiriman', 'bukti_pembayaran', 'status', 'order_id'];
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "users_id");
    }
    // public function alamat_pengiriman(){
    //     return $this->belongsTo(User::class, "Alamat_pengiriman");
    // }
    // public function bukti_Pembayaran(){
    //      return $this->belongsTo(User::class, "bukti_pembayaran");
    // }


}
