<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Cart</title>

    @include('frontend.layouts.css')


</head>

<body>
    @include('frontend.layouts.header')
    @include('frontend.layouts.search')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Solusi Belanja Tepat, Hemat, dan Lengkap</p>
                        <h1>Riwayat</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- cart -->
    <div class="cart-section mt-5 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th>No</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Deskripsi</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                    <th>Struk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pemesanan as $pesanan)
                                <tr class="table-body-row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pesanan->created_at->format('d M Y') }}</td>
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
                                        <form method="POST" action="{{url('riwayat')}}/{{$pesanan->id}}">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="3"> <!-- Menyimpan status baru -->
                                            <button class="btn btn-warning" type="submit">Selesai</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="/print/{{$pesanan->id}}" target="_blank" class="btn btn-danger btn-sm">Print</button>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="9" class="text-center">-- Data Tidak Ada --</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        {{ $pemesanan->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
    @include('frontend.layouts.logo')
    @include('frontend.layouts.footer')
    <!-- jquery -->
    @include('frontend.layouts.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.cart-quantity').on('change', function() {
                const cartItemId = $(this).data('cartitem');
                const newQty = $(this).val();

                // Kirim permintaan AJAX untuk mengupdate kuantitas
                $.ajax({
                    type: 'PATCH',
                    url: `/cart/update/${cartItemId}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        qty: newQty
                    },
                    success: function(response) {
                        // Update halaman atau tampilkan pesan sukses
                        console.log(response); // Tampilkan pesan sukses ke konsol (opsional)
                    },
                    error: function(error) {
                        console.log(error); // Tampilkan pesan error ke konsol (opsional)
                    }
                });
            });
        });
    </script>

</body>

</html>
