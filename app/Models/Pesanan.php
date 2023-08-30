<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'pemesanan';

    public function shipping() {
        return $this->belongsTo(shipping::class, 'id_shipping');
    }

    public function cart() {
        return $this->belongsTo(Cart::class, 'id_cart');
    }
}

