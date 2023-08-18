<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Vinintamart</title>

	<!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{!!asset('css/all.min.css')!!}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{!!asset('bootstrap/css/bootstrap.min.css')!!}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{!!asset('css/owl.carousel.css')!!}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{!!asset('css/magnific-popup.css')!!}">
	<!-- animate css -->
	<link rel="stylesheet" href="{!!asset('css/animate.css')!!}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{!!asset('css/meanmenu.min.css')!!}">
	<!-- main style -->
	<link rel="stylesheet" href="{!!asset('css/main.css')!!}">
	<!-- responsive -->
	<link rel="stylesheet" href="{!!asset('css/responsive.css')!!}">

</head>
<body>
    @include('frontend.layouts.header')
    @include('frontend.layouts.search')
    @yield('container')
    @include('frontend.layouts.hero')
    @include('frontend.layouts.features')
    @include('frontend.layouts.cart')
    @include('frontend.layouts.footer')


<!-- jquery -->
<script src="{!!asset('js/jquery-1.11.3.min.js')!!}"></script>
	<!-- bootstrap -->
	<script src="{!!asset('bootstrap/js/bootstrap.min.js')!!}"></script>
	<!-- count down -->
	<script src="{!!asset('js/jquery.countdown.js')!!}"></script>
	<!-- isotope -->
	<script src="{!!asset('js/jquery.isotope-3.0.6.min.js')!!}"></script>
	<!-- waypoints -->
	<script src="{!!asset('js/waypoints.js')!!}"></script>
	<!-- owl carousel -->
	<script src="{!!asset('js/owl.carousel.min.js')!!}"></script>
	<!-- magnific popup -->
	<script src="{!!asset('js/jquery.magnific-popup.min.js')!!}"></script>
	<!-- mean menu -->
	<script src="{!!asset('js/jquery.meanmenu.min.js')!!}"></script>
	<!-- sticker js -->
	<script src="{!!asset('s/sticker.js')!!}"></script>
	<!-- main js -->
	<script src="{!!asset('js/main.js')!!}"></script>


</body>
</html>
