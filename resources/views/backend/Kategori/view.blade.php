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
                            <h1 class="text-center">Kategori</h1>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
                                <a href="/kategori/create" class="btn btn-green">Tambah Kategori</a>
                            </div>
                            @if (session()->has('pesan_tambah'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert"">
                            Data Berhasil di Tambah
                            <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @elseif(session()->has('pesan_edit'))
                            <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                                {{ session('pesan_edit') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @elseif(session()->has('pesan_hapus'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                {{ session('pesan_hapus') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <table class="table table-green text-center bg-white border">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategori->name }}</td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
