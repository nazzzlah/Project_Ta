<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index', [
            'products' => Product::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.create', [
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'kode_produk' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $product = new Product();
        $product->id_kategori = $request->input('id_kategori');
        $product->nama_produk = $request->input('nama_produk');
        $product->kode_produk = $request->input('kode_produk');
        $product->gambar = $imageName;
        $product->deskripsi = $request->input('deskripsi');
        $product->jumlah = $request->input('jumlah');
        $product->harga = $request->input('harga');
        $product->save();

        // Sesuaikan dengan logika autentikasi atau pengalihan halaman setelah pendaftaran berhasil
        return redirect('product')->with('success', 'Data berhasil ditambahkan.');
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
        $product = Product::findOrFail($id);
        $kategoris = Kategori::all();

        return view('backend.product.edit', compact('product', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'kode_produk' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        $product->update([
            'id_kategori' => $request->input('id_kategori'),
            'nama_produk' => $request->input('nama_produk'),
            'kode_produk' => $request->input('kode_produk'),
            'deskripsi' => $request->input('deskripsi'),
            'jumlah' => $request->input('jumlah'),
            'harga' => $request->input('harga'),
            'gambar' => $imageName,
        ]);

        return redirect('/product')->with('success', 'Produk berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar terkait jika ada
        if (!empty($product->gambar)) {
            $imagePath = public_path('images/' . $product->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect('/product')->with('success', 'Produk berhasil dihapus.');
    }
}
