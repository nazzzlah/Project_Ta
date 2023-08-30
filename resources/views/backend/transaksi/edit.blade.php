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
                            <h1 class="text-center">Data Transaksi</h1>
                            <div class="row justify-content-center mt-4">
                                <div class="col-lg-8">
                                    <form action="/transaksi/{{ $transaksi->id }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                                        <option value="0">Gagal</option>
                                                        <option value="1">Berhasil</option>
                                                        <option value="2">Selesai</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>



                                                <div class="mb-3">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-primary" type="submit">Update Status</button>
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
