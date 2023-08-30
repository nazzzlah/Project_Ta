<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Cart</title>

    <!-- favicon -->
    @include('frontend.layouts.css')

</head>

<body>
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head text-center">
                                <tr class="table-head-row">
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
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
                                @empty
                                <td colspan="4">-- Data Tidak Ada</td>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total Belanja</td>
                                    <td>Rp{{ number_format($totalHarga, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        window.print();
    </script>

</body>

</html>
