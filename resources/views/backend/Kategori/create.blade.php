@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <div class="table-responsive">
                            <h1 class="text-center">Tambah Kategori</h1>
                        </div>
                        <form action="/kategori" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" placeholder="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-green btn-md ms-auto" name="submit" type="submit">Create Kategori</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>

                </div>
            </div>

            @endsection
