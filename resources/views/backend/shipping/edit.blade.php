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
                            <h1 class="text-center">Shipping</h1>
                            <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <form action ="/shipping/{{ $shippings->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Edit Shipping
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" name="kota" id="kota" placeholder="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota',$shippings->kota) }}">
                            @error('kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="kec" class="form-label">Kecamatan</label>
                            <input type="text" name="kec" id="kec" placeholder="kecamatan" class="form-control @error('kec') is-invalid @enderror" value="{{ old('kec',$shippings->kec) }}">
                            @error('kec')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="harga" class="form-label">HARGA</label>
                            <input type="number" name="harga" id="harga" placeholder="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga',$shippings->harga) }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Edit</button>
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
