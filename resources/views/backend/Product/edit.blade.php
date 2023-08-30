@extends('backend.layouts.index')
@section('container')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <div class="table-responsive">
                            <h1 class="text-center">Produk</h1>
                            <div class="row justify-content-center mt-4">
                                <div class="col-lg-8">
                                    <form action="/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="id_kategori" class="form-label">Kategori</label>
                                                    <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                                                        <option value="{{$product->id_kategori}}">Pilih Kategori</option>
                                                        @foreach ($kategoris as $kategori)
                                                        <option value="{{ $kategori->id }}" {{ $product->id_kategori == $kategori->id ? 'selected' : '' }}>
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
                                                    <input type="text" name="nama_produk" id="nama_produk" placeholder="Nama Produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{$product->nama_produk}}">
                                                    @error('nama_produk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="kode_produk" class="form-label">Kode Produk</label>
                                                    <input type="text" name="kode_produk" id="kode_produk" placeholder="Kode Produk" class="form-control @error('kode_produk') is-invalid @enderror" value="{{$product->kode_produk}}">
                                                    @error('kode_produk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar</label> <br>
                                                    <img src="{{ asset('images/' . $product->gambar) }}" style="width: 50%;" alt="{{ $product->nama_produk }}">
                                                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror mt-2" value="{{$product->gambar}}">
                                                    @error('gambar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" id="deskripsi" rows="4" placeholder="Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$product->deskripsi}}">{{$product->deskripsi}}</textarea>
                                                    @error('deskripsi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                    <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{$product->jumlah}}">
                                                    @error('jumlah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="double" name="harga" id="harga" placeholder="Harga" class="form-control @error('harga') is-invalid @enderror" value="{{$product->harga}}">
                                                    @error('harga')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>


                                                <div class="mb-3">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-primary" type="submit">Edit Produk</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endsection
                            <!-- content-wrapper ends -->
                            <!-- partial:../../partials/_footer.html -->
