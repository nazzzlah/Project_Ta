<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items'; // Ganti 'nama_tabel_cart' dengan nama tabel yang sesuai

    protected $fillable = [
        'id_cart',
        'id_produk',
        'qty',
        'harga',
        'total_harga',
        'ls_checkout',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }

    // Metode untuk menghitung total harga per item dalam keranjang
    public function calculateTotalPrice()
    {
        return $this->qty * $this->harga;

    }

    public static function calculateTotalPriceAllProducts($cartItems)
{
    $totalPrice = 0;

    foreach ($cartItems as $cartItem) {
        $totalPrice += $cartItem->product->harga * $cartItem->qty;
    }

    return $totalPrice;
}



}
