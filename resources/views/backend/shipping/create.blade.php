@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Tambah Shipping</h1>
                        <form action="/shipping" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Nama Kota</label>
                                    <input type="text" name="kota" id="kota" placeholder="Nama Kota" class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota') }}">
                                    @error('kota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kec" class="form-label">Kecamatan</label>
                                    <input type="text" name="kec" id="kec" placeholder="Kecamatan" class="form-control @error('kec') is-invalid @enderror" value="{{ old('kec') }}">
                                    @error('kec')
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
                                        <button class="btn btn-green btn-md ms-auto" name="submit" type="submit">Tambah </button>
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
