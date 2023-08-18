<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>VinintaMart</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{!! asset('backend/vendors/feather/feather.css')!!}">
  <link rel="stylesheet" href="{!! asset('backend/vendors/ti-icons/css/themify-icons.css')!!}">
  <link rel="stylesheet" href="{!! asset('backend/vendors/css/vendor.bundle.base.css')!!}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{!! asset('backend/css/vertical-layout-light/style.css')!!}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{!! asset('backend/img/vininta.png')!!}"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
            <h4>SIGN IN</h4>
            <div class ="brand-logo text-center mb-1">
                <img src="{!! asset('img/vininta.png') !!}" alt="logo">
            </div>
              <h6 class="font-weight-light">Solusi Belanja Tepat, Hemat, dan Lengkap</h6>
              <form class="pt-3" action="login" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Simpan di perangkat
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa Kata sandi?</a>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-green btn-lg font-weight-medium auth-form-btn" type="submit" name="submit" >SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{!! asset('backend/vendors/js/vendor.bundle.base.js')!!}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{!! asset('backend/off-canvas.js')!!}"></script>
  <script src="{!! asset('backend/js/hoverable-collapse.js')!!}"></script>
  <script src="{!! asset('backend/js/template.js')!!}"></script>
  <script src="{!! asset('backend/js/settings.js')!!}"></script>
  <script src="{!! asset('backendjs/todolist.js')!!}"></script>
  <!-- endinject -->
</body>

</html>
