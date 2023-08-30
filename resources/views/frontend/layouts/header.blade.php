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
            <div class="col-lg-12 text-center">
                <div class="main-menu-wrap">
                    <nav class="main-menu">
                        <ul>
                            <li class="list-item">
                                <a href="{{url('home')}}">Home</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('shop')}}">Shop</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('cart')}}">Cart</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('riwayat')}}">Riwayat</a>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i>
                                    </a>
                                    @if(Auth::check())
                                    <i class="fa fa-user mx-2 text-white"></i><span class="text-white fw-bold">{{Auth::user()->name}}</span>
                                    <a>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="btn rounded-0 btn-sm me-2 text-white">
                                                <i class="fa-solid fas fa-power-off"></i>
                                            </button>
                                        </form>
                                    </a>
                                    @else
                                    <a href="/login"><i class="fa fa-user text-white"></i> Login</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
