<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function addToCart(Request $request, $id)
    {

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $id_user = Auth::user()->id;

        $cart = Cart::where('id_user', $id_user)->where('status', 0)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->id_user = $id_user;
            $cart->status = 0;
            $cart->total_harga = 0;
            $cart->save();
        }

        $product = Product::findOrFail($id);
        $cartItem = CartItem::where('id_cart', $cart->id)
            ->where('id_produk', $product->id)
            ->where('ls_checkout', false)
            ->first();

        if ($cartItem) {
            // Jika produk sudah ada di keranjang, tambahkan kuantitas
            $cartItem->update([
                'qty' => $cartItem->qty + 1,
                'total_harga' => $cartItem->total_harga + $product->harga,
            ]);
        } else {
            // Jika produk belum ada di keranjang, tambahkan produk baru
            CartItem::create([
                'id_cart' => $cart->id,
                'id_produk' => $product->id,
                'qty' => 1,
                'harga' => $product->harga,
                'total_harga' => $product->harga,
                'ls_checkout' => false,
            ]);
        }

        if ($request->qyt > $product->stock) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok produk.');
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function showCart()
{
    $user_id = Auth::user()->id;

    $cart = Cart::where('id_user', $user_id)
                ->where('status', 0)
                ->first();

    $cartItems = [];

    if ($cart) {
        $cartItems = CartItem::with('product')
            ->where('id_cart', $cart->id)
            ->get();
    }

    $totalPriceByQuantity = 0;
    $totalPriceByProduct = CartItem::calculateTotalPriceAllProducts($cartItems);

    foreach ($cartItems as $cartItem) {
        $totalPriceByQuantity += $cartItem->calculateTotalPrice();
    }

    return view('frontend.cart.index', [
        'cartItems' => $cartItems,
        'totalPriceByProduct' => $totalPriceByProduct,
        'shippings' => Shipping::get()
    ]);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $cartItem->update([
            'qty' => $request->qty,
            'total_harga' => $cartItem->product->harga * $request->qty,
        ]);

        // Mengambil cart terkait
        $cart = $cartItem->cart;

        // Menghitung total harga baru di tabel cart
        $totalHargaCart = $cart->cartItems->sum('total_harga');

        // Update total_harga di tabel cart
        $cart->total_harga = $totalHargaCart;
        $cart->save();


        return redirect()->route('cart.show')->with('success', 'Cart item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('cart.show')->with('success', 'Cart item removed successfully.');
    }
}
