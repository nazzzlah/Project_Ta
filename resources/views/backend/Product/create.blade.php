@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Tambah Produk</h1>
                        <form action="/product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->name }}
                                            </option>

                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" placeholder="Nama Produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}">
                                    @error('nama_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kode_produk" class="form-label">Kode Produk</label>
                                    <input type="text" name="kode_produk" id="kode_produk" placeholder="Kode Produk" class="form-control @error('kode_produk') is-invalid @enderror" value="{{ old('kode_produk') }}">
                                    @error('kode_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                    @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="4" placeholder="Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}">
                                    @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" id="harga" placeholder="Harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                                    @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-green btn-md ms-auto" name="submit" type="submit">Tambah Produk</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
