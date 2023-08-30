<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view ('frontend.shop_detail.index',compact('products'));
        // $product = Product::find($id);
        // if (!$product) {
        //     abort(404);
        // }
        // return view ('frontend.shop_detail.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        return view('frontend.shop_detail.index', ['product' => $product]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
