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
						<h1>Produk</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

<!-- single product -->


<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="assets/img/products/product-img-5.jpg" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>Green apples have polyphenols</h3>
						<p class="single-product-pricing"><span>Per Kg</span> $50</p>
						<p></p>
						<div class="single-product-form">

						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->


    @include('frontend.layouts.logo')
    @include('frontend.layouts.footer')


<!-- jquery -->
    @include('frontend.layouts.js')

</body>
</html>
