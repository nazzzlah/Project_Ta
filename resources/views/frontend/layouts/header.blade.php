<!--PreLoader-->
<div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>
									<ul class="sub-menu">
										<li><a href="/home">Static Home</a></li>
									</ul>
								</li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="/cart">Cart</a></li>
										<li><a href="/checkout">Check Out</a></li>
										<li><a href="/riwayat">Riwayat</a></li>
										<li><a href="/shop">Shop</a></li>
									</ul>
								</li>
								<li><a href="news.html">News</a>
								</li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="#">Shop</a>
									<ul class="sub-menu">
										<li><a href="/shop">Shop</a></li>
										<li><a href="/cart">Cart</a></li>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                        @if(Auth::check())
                                        <i class="fa fa-user mx-2"></i>{{Auth::user()->name}}
                                        <a>
                                    <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn rounded-0 btn-sm me-2">
                                        <i class="fa-solid fas fa-power-off"></i>
                                    </button>
                                </form>
</a>
                            @else
                            <a href="/login"><i class="fa fa-user"></i> Login</a>
                            @endif
                        </div>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>

						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
