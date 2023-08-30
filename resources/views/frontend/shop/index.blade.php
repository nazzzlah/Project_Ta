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
    @include('frontend.layouts.css')

</head>

<body>


    @include('frontend.layouts.header')
    @include('frontend.layouts.search')
    @include('frontend.layouts.breadcrumb')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul class="category-list">
                            @foreach ($kategoris as $kategori)
                            <li class="category-filter" data-filter=".{{ strtolower($kategori->name) }}">{{ $kategori->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists" id="productLists">
                @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 text-center single-product-item {{ strtolower($product->kategori->name) }}">
                    <div class="{{ strtolower($product->nama_produk) }}">
                        <div class="product-image">
                            <a href="/shopdetail"><img src="{{ asset('images/' . $product->gambar) }}" alt="" style="width: 80px; height: 150 px;" width="100px" height="80px"></a>
                        </div>
                        <a href="">/shopdetail/{{$product->id}}
                            <h3>{{ $product->nama_produk }}</h3>
                        </a>
                        <p class="product-price">Rp{{ $product->harga }}</p>

                        <!-- Informasi produk -->
                        <form action="{{url('add-to-cart')}}/{{$product->id}}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        </form>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>



    <!-- Include jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.category-filter').click(function() {
                const selectedCategory = $(this).data('filter').slice(1);

                $('.single-product-item').each(function() {
                    if ($(this).hasClass(selectedCategory)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>


    <!-- end products -->

    @include('frontend.layouts.logo')
    @include('frontend.layouts.footer')


    <!-- jquery -->
    @include('frontend.layouts.js')

</body>

</html>
