<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.kategori.index', [
            'kategoris' => Kategori::first()->paginate(0)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'required',
        ]);

        Kategori::create($validatedDate);
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategoris = Kategori::all(); // Contoh pengambilan data dari model
        return view('backend.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = Kategori::findOrFail($id);
        return view('backend.kategori.edit', compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $validatedDate = $request->validate([
            'name' => 'required',
        ]);

        $kategori->update([
            'name' => $request->input('name')
        ]);

        return redirect('kategori')->with('pesan_edit', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        // Redirect atau sesuaikan respons setelah penghapusan data
        return redirect('kategori')->with('pesan_hapus', 'Data berhasil dihapus.');
    }
}
