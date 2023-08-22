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


    @include('frontend.layouts.header')
    @include('frontend.layouts.search')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Solusi Belanja Tepat, Hemat, dan Lengkap</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                <tr class="table-body-row">
                                    <th class="product-remove">
                                        <form action="{{ route('cart.destroy', $cartItem) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning btn-sm" type="submit"><i class="far fa-window-close"></i></button>
                                        </form>
                                    </th>
                                    <td class="product-image">
                                        <img src="{{ asset('images/' . $cartItem->product->gambar) }}" alt="Product Image">
                                    </td>
                                    <td class="product-name">{{ $cartItem->product->nama_produk }}</td>
                                    <td class="product-price">Rp{{number_format($cartItem->harga, 0, ',', '.') }}</td>
                                    <td class="product-quantity">
                                        <form action="{{ route('cart.update', $cartItem) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="qty" placeholder="0" value="{{ $cartItem->qty }}">
                                            <button class="btn btn-warning" type="submit">Update</button>
                                        </form>
                                    </td>
                                    <td class="product-total">Rp{{number_format($cartItem->calculateTotalPrice(), 0, ',', '.') }}</td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th></th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td class="product-price">Rp{{ number_format($totalPriceByProduct, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            </td>

                            <a href="/checkout" class="boxed-btn black">Check Out</a>
                        </div>
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
