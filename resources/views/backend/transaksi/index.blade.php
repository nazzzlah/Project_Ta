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
                        <h1 class="text-center">Data Transaksi</h1>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
                            @if (session()->has('pesan_edit'))
                            <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                                {{ session('pesan_edit') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-green text-center bg-white border">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Nama</th>
                                            <th>Total</th>
                                            <th>Mode Payment</th>
                                            <th>Bukti</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transaksi as $transaksi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaksi-> created_at}}</td>
                                            <td>{{ $transaksi->pesanan->nama ?? '-'}}</td>
                                            <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                            <td>{{ $transaksi-> mode_payment }}</td>
                                            <td><a href="{{ asset('images/' . $transaksi->bukti) }}"><img src="{{ asset('images/' . $transaksi->bukti) }}" alt="{{ $transaksi->bukti }}"></a></td>
                                            <td>
                                            @if($transaksi->status === '1')
                                            <div class="badge badge-success">Sudah bayar</div>
                                            @elseif($transaksi->status === '0')
                                            <div class="badge badge-danger">Belum bayar</div>
                                            @endif
                                            </td>
                                            <td>
                                                <a href="/transaksi/{{ $transaksi->id }}/edit" class="btn btn-inverse-success  btn-icon-text btn-sm">Edit
                                                    <i class="ti-file btn-icon-append"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
