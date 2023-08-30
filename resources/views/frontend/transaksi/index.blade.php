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
            <h1>Payment</h1>
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
                      Form Pembayaran
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="cart-buttons">
                    <form action="{{url('simpan-transaksi')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <p>Mode Pembayaran<select name="mode_payment" id="mode_payment" class="form-control @error('mode_payment') is-invalid @enderror">
                          <option value="">Pilih</option>
                          <option value="COD">COD</option>
                          <option value="QRIS">Qris</option>
                        </select></p>
                      <label for="bukti" class="form-label">Bukti <span class="text-danger">* Jika pembayaran COD, tidak perlu upload bukti pembayaran</span></label>
                      <input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                      @error('bukti')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                      <input type="hidden" name="total_harga" value="{{$pesanan->total_harga}}" class="form-control">
                  </div>
                </div>
                <button class="btn btn-warning mt-5" type="submit">Konfirmasi</button>
                </form>
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-4">
          <div class="order-details-wrap">
            <table class="order-details">
              <tr>
                <td>Total Pesanan</td>
                <td>Rp{{number_format ($pesanan->total_harga, 0, ',', '.')}}</td>
              </tr>
            </table>
            <img src="{{asset('images/1.png')}}" alt="Preview" style="max-width: 70%;">
          </div>
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
