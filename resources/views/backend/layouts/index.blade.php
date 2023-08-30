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
    <link rel="stylesheet" href="{!! asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')!!}">
    <link rel="stylesheet" href="{!! asset('backend/vendors/ti-icons/css/themify-icons.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('backend/js/select.dataTables.min.css')!!}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! asset('backend/css/vertical-layout-light/style.css')!!}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{!! asset('backend/images/satu.png')!!}" />

    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('backend.layouts.header')
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial:partials/_sidebar.html -->
            @include('backend.layouts.sidebar')
            <!-- partial -->
            @yield('container')
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('backend.layouts.footer')
            <!-- partial -->
        </div>
    </div>
    <!-- main-panel ends -->
    <!-- plugins:js -->
    <script src="{!! asset('backend/vendors/js/vendor.bundle.base.js')!!}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{!! asset('backend/vendors/chart.js/Chart.min.js')!!}"></script>
    <script src="{!! asset('backend/vendors/datatables.net/jquery.dataTables.js')!!}"></script>
    <script src="{!! asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')!!}"></script>
    <script src="{!! asset('backend/js/dataTables.select.min.js')!!}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{!! asset('backend/js/off-canvas.js')!!}"></script>
    <script src="{!! asset('backend/js/hoverable-collapse.js')!!}"></script>
    <script src="{!! asset('backend/js/template.js')!!}"></script>
    <script src="{!! asset('backend/js/settings.js')!!}"></script>
    <script src="{!! asset('backend/js/todolist.js')!!}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{!! asset('backend/js/dashboard.js')!!}"></script>
    <script src="{!! asset('backend/js/Chart.roundedBarCharts.js')!!}"></script>
    <!-- End custom js for this page-->
</body>

</html>
