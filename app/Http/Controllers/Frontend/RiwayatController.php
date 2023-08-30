<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;


class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('frontend.riwayat.index', [
            'pemesanan' => Pesanan::paginate()
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
         // Ambil data transaksi dari tabel penjualan berdasarkan ID
         $pesanan = Pesanan::findOrFail($id);


         // Ambil data transaksi yang terkait dari tabel transaksi
         $pesanan = Pesanan::where('', $id)->get();

         return view('/riwayat', compact('pesanan'));
    }

    public function print(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $cartItem = CartItem::where('id_cart', $pesanan->id)->get();
        // dd($cartItem);

        // Ambil data transaksi yang terkait dari tabel transaksi
        return view('frontend.riwayat.struk',[
            'cartItem' => $cartItem
        ]);


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
        $pesanan = Pesanan::findOrFail($id);
        $request->validate([
            'status' => 'required',
        ]);

        $pesanan->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('succes', 'data berhasil diupdate');
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
