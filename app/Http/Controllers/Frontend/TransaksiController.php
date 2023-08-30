<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_pesanan = session('id_pesanan');
        $pesanan = Pesanan::where('id', $id_pesanan)->first();
        return view('frontend.transaksi.index', [
            'pesanan' => $pesanan
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
    $id_pesanan = session('id_pesanan');

    $request->validate([
        'mode_payment' => 'required',
        'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    $imageName = null;

    if ($request->hasFile('bukti')) {
        $image = $request->file('bukti');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    $transaksi = Transaksi::updateOrCreate(
        ['id_pemesanan' => $id_pesanan], // Kolom untuk mencocokkan data
        [
            'total_harga' => $request->input('total_harga'),
            'mode_payment' => $request->input('mode_payment'),
            'bukti' => $imageName,
            'status' => 1
        ]
    );

    // Sesuaikan dengan logika autentikasi atau pengalihan halaman setelah pendaftaran berhasil
    return redirect('/home')->with('success', 'Data berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pesanan' => 'required',
            'total_harga' => 'required',
            'mode_payment' => 'required',
            'status' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        if ($request->hasFile('bukti')) {
            $image = $request->file('bukti');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        $transaksi->update([
            'id_pemesanan' => $request->input('id_pemesanan'),
            'total_harga' => $request->input('total_harga'),
            'mode_payment' => $request->input('mode_payment'),
            'bukti' => $imageName,
            'status' => $request->input('status'),
        ]);

        return redirect('/home')->with('success', 'Transaksi diproses.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
