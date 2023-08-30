<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Pesanan;
use Illuminate\Http\Request;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pesanan.index', [
            'pemesanan' => Pesanan::paginate(10)
        ]);
    }

    public function updateStatus($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 3; // Set status to "Selesai"
        $pesanan->save();

        return redirect()->back()->with('pesan_edit', 'Status pesanan berhasil diubah menjadi Selesai.');
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
        $pesanan = Pesanan::findOrFail($id);
        $cartItem = CartItem::where('id_cart', $pesanan->id)->get();
        // dd($cartItem);

        // Ambil data transaksi yang terkait dari tabel transaksi
        return view('backend.pesanan.view',[
            'cartItem' => $cartItem
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        return view('backend.pesanan.edit', compact('pesanan'));
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

        return redirect('pesanan')->with('succes', 'data berhasil diupdate');
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
