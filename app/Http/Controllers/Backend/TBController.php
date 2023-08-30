<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.transaksi.index', [
            'transaksi' => Transaksi::with('pesanan')->paginate(10)
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
        $transaksi = Transaksi::findOrFail($id);

        return view('backend.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'status' => 'required',

        ]);

        $transaksi->update([
            'status' => $request->input('status'),

        ]);
        return redirect('transaksi')->with('succes', 'data berhasil diupdate');
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
