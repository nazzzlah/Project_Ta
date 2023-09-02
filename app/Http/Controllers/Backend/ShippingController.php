<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.shipping.index', [
            'shippings' => Shipping::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'kota' => 'required',
            'kec' => 'required',
            'harga' => 'required',
        ]);

        Shipping::create($validatedDate);
        return redirect('/shipping');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shippings = Shipping::all(); // Contoh pengambilan data dari model
        return view('backend.shipping.index', compact('Shippings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shippings = Shipping::findOrFail($id);
        return view('backend.shipping.edit', compact('shippings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shipping = Shipping::findOrFail($id);
        $validatedDate = $request->validate([
            'harga' => 'required',
        ]);

        $shipping->update([
            'kota' => $request->input('kota'),
            'kec' => $request->input('kec'),
            'harga' => $request->input('harga'),
        ]);

        return redirect('shipping')->with('pesan_edit', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();

        // Redirect atau sesuaikan respons setelah penghapusan data
        return redirect('shipping')->with('pesan_hapus', 'Data berhasil dihapus.');
    }
}
