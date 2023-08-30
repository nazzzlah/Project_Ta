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
            <h1 class="text-center">Pesanan Baru</h1>
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
                      <th>Tanggal Pesanan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Deskripsi</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($pemesanan as $pesanan)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $pesanan-> created_at}}</td>
                      <td>{{ $pesanan-> nama }}</td>
                      <td>{{ $pesanan-> alamat }}</td>
                      <td>{{ $pesanan-> deskripsi }}</td>
                      <td>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                      <td>
                        @if($pesanan->status === 0)
                        <div class="badge badge-danger">Belum bayar</div>
                        @elseif($pesanan-> status === 1)
                        <div class="badge badge-primary">Dikemas</div>
                        @elseif($pesanan-> status === 2)
                        <div class="badge badge-warning">Dikirim</div>
                        @elseif($pesanan-> status === 3)
                        <div class="badge badge-success">Selesai</div>
                        @endif
                      </td>
                      <td>
                        <a href="/pesanan/{{ $pesanan->id }}/edit" class="btn btn-inverse-success  btn-icon-text btn-sm">Edit
                          <i class="ti-file btn-icon-append"></i>
                        </a>

                        <a href="/pesanan/{{ $pesanan->id }}" class="btn btn-inverse-primary  btn-icon-text btn-sm">View
                          <i class="ti-eye btn-icon-append"></i>
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
