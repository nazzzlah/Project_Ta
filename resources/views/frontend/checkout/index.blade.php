<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <!-- title -->
    <title>Check Out</title>
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
                        <h1>Check Out Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Form Pemesanan
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    @csrf
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="{{url('simpan-checkout')}}" method="post">
                                                @csrf
                                                <!-- <div class="mb-3"> -->
                                                <p><input type="text" name="nama" placeholder="Nama Lengkap" class=" @error('nama') is-invalid @enderror" value="{{ old('nama') }}"></p>
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                                <p><textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class=" @error('alamat') is-invalid @enderror" value="{{ old('deskripsi') }}"></textarea></p>
                                                @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <p><input type="tel" name="no_hp" placeholder="Phone" class=" @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}"></p>
                                                @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <p><textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Deskripsi" class=" @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}"></textarea></p>
                                                @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                <input type="hidden" name="total_harga" value="{{ $pesanan->shipping ? ($pesanan->shipping->harga + $totalPriceByProduct) : $totalPriceByProduct }}">
                                                @enderror
                                                <div class="mb-3">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-warning btn-md ms-auto" name="submit" type="submit">Buat Pesanan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>Ongkir</td>
                                    <td>Rp{{number_format($pesanan->shipping->harga, 0, ',', '.')}},- ({{$pesanan->shipping->kec}})</td>
                                </tr>
                                <tr>
                                    <td>Total Belanja</td>
                                    <td>Rp{{number_format(($pesanan->shipping->harga + $totalPriceByProduct), 0, ',', '.')}},-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
    @include('frontend.layouts.logo')
    @include('frontend.layouts.footer')
    <!-- jquery -->
    @include('frontend.layouts.js')
</body>

</html>
