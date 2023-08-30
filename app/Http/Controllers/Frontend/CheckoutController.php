<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Pesanan;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        // dd($pesanan);
        $user_id = Auth::user()->id;
        // dd($user_id);
        $cart = Cart::where('id_user', $user_id)->first();
        // dd($cart);

        $cartItems = CartItem::where('status',0)->get();

        // dd($cartItems);

        $totalPriceByQuantity = 0;
        $totalPriceByProduct = 0;

        foreach ($cartItems as $cartItem) {
            $totalPriceByQuantity += $totalPriceByQuantity += $cartItem->calculateTotalPrice();
            $totalPriceByProduct += $cartItem->calculateTotalPrice();
        }
        //dd($cartItems);
        return view('frontend.checkout.index', [
            'cartItems' => $cartItems,
            'totalPriceByQuantity' => $totalPriceByQuantity,
            'totalPriceByProduct' => $totalPriceByProduct,
            // 'totalFinalPrice' => $totalFinalPrice,
            'pesanan' => $pesanan
        ]);
    }


    public function showCart()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('id_user', $user_id)->where('status', 0)->first();

        $cartItems = CartItem::with('product')
            ->where('id_cart', $cart->id)
            ->where('ls_checkout', false)
            ->get();
        $cartItems = CartItem::where('id_cart', $cart->id)->get(); // Ganti dengan query sesuai dengan struktur tabel dan relasi Anda

        // dd($cartItems);
        $totalPriceByQuantity = 0;
        $totalPriceByProduct = CartItem::calculateTotalPriceAllProducts($cartItems);


        foreach ($cartItems as $cartItem) {
            $totalPriceByQuantity += $cartItem->calculateTotalPrice();
        }

        return view('frontend.checkout.index', [
            'cartItems' => $cartItems,
            'totalPriceByProduct' => $totalPriceByProduct,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.checkout.index', [
            'shippings' => Shipping::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_pesanan = session('id_pesanan');
        $pesanan = Pesanan::where('id', $id_pesanan)->first();
        $pesanan = Pesanan::findOrFail($id_pesanan);
        $id_cart = $pesanan->id_cart;

        $totalHargaCartItems = CartItem::where('id_cart', $id_cart)->sum('total_harga');
        $id_shipping = $pesanan->id_shipping;
        $shippingCost = Shipping::findOrFail($id_shipping)->harga;

        $totalKeseluruhan = $totalHargaCartItems + $shippingCost;

        $cartItem = CartItem::where('id_cart', $id_cart);
        $cartItem->update([
            'status' => 1
        ]);

        $pesanan = Pesanan::updateOrCreate(
            ['id_cart' => $id_cart],
            [
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'no_hp' => $request->input('no_hp'),
                'deskripsi' => $request->input('deskripsi'),
                'total_harga' => $totalKeseluruhan,
            ]
        );
        return redirect('/transaksi-frontend/'.$id_pesanan);
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
    public function update(Request $request, Pesanan $pesanan)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'shipping' => 'required|numeric', // Sesuaikan dengan aturan validasi yang diperlukan
        ]);

        // Update nilai shipping pada record pesanan
        $pesanan->id_shipping = $request->shipping;
        $pesanan->save();

        return redirect()->route('checkout.update')->with('success', 'Shipping updated successfully.'); // Sesuaikan dengan halaman yang ingin ditampilkan setelah update
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
