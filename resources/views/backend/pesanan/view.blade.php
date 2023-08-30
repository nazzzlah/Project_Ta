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
                        <h1 class="text-center">Item Pesanan</h1>
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
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($cartItem as $cartItem)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cartItem->product->nama_produk}}</td>
                                            <td>{{ $cartItem->qty }}</td>
                                            <td>Rp{{ number_format($cartItem->total_harga, 0, ',', '.') }}</td>
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
</div>
@endsection
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
