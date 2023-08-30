<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\Shipping;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function simpan_pesanan(Request $request)
    {
        $request->validate([
            'shipping' => 'required'
        ], [
            'shipping.required' => 'Pilih lokasi terlebih dahulu'
        ]);

        $id_shipping = $request->input('shipping');
        $id_cart = $request->input('pesanan');

        $carts = Cart::where('id', $id_cart);
        $carts->update([
            'status'=>1
        ]);

        $pesanan = Pesanan::updateOrCreate(
            [
                'id_cart' => $id_cart
            ],
            [
                'id_shipping' => $id_shipping,
            ]
        );

        $cart = Cart::find($id_cart); // Ambil data cart berdasarkan id
        $total_harga_cart = $cart->total_harga; // Ambil total_harga dari cart
        
        $shipping = Shipping::find($id_shipping);
        $biaya_shipping = $shipping->harga;
        // Ubah kolom biaya sesuai dengan yang ada di tabel Shipping

        $total_keseluruhan = $total_harga_cart + $biaya_shipping;
        // dd($biaya_shipping);
        session(['id_pesanan' => $pesanan->id]);
        return redirect('/checkout/' . $pesanan->id);
    }

    public function checkout(Request $request)
    {
        // Proses checkout, hitung total harga, dan lain-lain

        // Kosongkan keranjang belanja
        session()->forget('cart');

        // Membuat keranjang belanja baru kosong
        session()->put('cart', []);

        return view('/checkout'); // Ganti dengan tampilan yang sesuai
    }
}
