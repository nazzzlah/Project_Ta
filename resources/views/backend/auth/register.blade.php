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
  <link rel="shortcut icon" href="{!! asset('img/vininta.png')!!}"/>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
            <h4>SIGN UP</h4>
            <div class ="brand-logo text-center mb-1">
                <img src="{!! asset('img/vininta.png') !!}" alt="logo">
            </div>
              <h6 class="font-weight-light">Solusi Belanja Tepat, Hemat, dan Lengkap</h6>
              <form class="pt-3" action="/signup" method="post">
              @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="name">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="password">
                </div>
                <!-- <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div> -->
                <button type="submit" name="submit" class="btn btn-green w-100 py-8 fs-4 mb-4 mt-2 rounded-2">Sign Up</button>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="my-2 d-flex align-items-center justify-content-between ">
                    <p class="fs-2 mb-0 fw-bold ">Punya Akun?</p>
                    <a href="/login" class="fs-3 auth-link text-black">Masuk Ke Akun</a>
                  </div>
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
