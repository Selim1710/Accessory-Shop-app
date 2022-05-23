@extends('website.master')
@section('contents')
<!-- See All Categories Button -->
<section class="all-categories">
    <button class="btn w-100 text-white" style="background:#16a085;" type="button" data-toggle="collapse" data-target="#category" aria-expanded="false" aria-controls="collapseExample">
        See All Categories &rarr;
    </button>
    <div class=" collapse category p-lg-1" id="category">
        @foreach($categories as $category)
        <div class="btn-group">
            <a href="#" class="btn btn-success dropdown-toggle m-1 text-uppercase" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $category->category_name }}
            </a>
            @if(!empty($category->subCategories))
            <div class="dropdown-menu">
                @foreach($category->subCategories as $subCategory)
                <a class="dropdown-item" href="{{ route('show.sub.category.product',$subCategory->id) }}">{{ $subCategory->sub_category_name }}</a>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach
    </div>
</section>
<!-- Carousel  -->
<section class="product-slider">
    <div class="slider">
        <div class="row">
            <div class="col-lg-7">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($offers_image as $key=>$offer)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($offers_image as $offer)
                        @if($loop->first)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('/uploads/offer/'.$offer ) }}" alt="First slide">
                        </div>
                        @else
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/uploads/offer/'.$offer ) }}" alt="First slide">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- compare product -->
            <div class="col-lg-4 mt-4">
                <div class="compare-product text-center">
                    <h3 class="pt-1">Compare Product</h3>
                    <p>Choose two product to compare</p>
                    <form action="{{ route('user.compare.product') }}" class="form-inline my-2 my-lg-0">
                        <input type="search" name="search_c1" value="" placeholder="Search" class="form-control m-2 w-100" aria-label="Search">
                        <input type="search" name="search_c2" value="" placeholder="Search" class="form-control m-2 w-100" aria-label="Search">
                        <br>
                        <input type="submit" class="bg-secondary p-2 border text-white w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature Category -->
<section class="featured-Category border">
    <div class="categoryHeader">
        <h1>Featured Category</h1>
        <p>Get Your Desired Product from Featured Category!</p>
    </div>
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-4 col-lg-2 rounded d-flex align-items-stretch">
                <div class="card">
                    <a href="{{ route('show.category.product',$category->id) }}">
                        <div class="cart-img img-fluid text-center m-2">
                            <img src="{{ asset('/uploads/category/'.$category->image ) }}" alt="" class="img-fluid">
                            <br>
                            <p class="text-center">{{ $category->category_name }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br><br><br><br><br><br>
</section>
<section class="featured-Product border">
    <div class="productHeader">
        <h1>Featured Product</h1>
        <p>Check & Get Your Desired Product !</p>
    </div>
    <div class="product">
        <div class="row">
            @foreach($products as $product)
            <div class="column d-flex align-items-stretch">
                <div class="box">
                    <a href="{{ route('website.product.details',$product->id) }}">
                        <div class="img-box">
                            <img src="{{ asset('uploads/products/'.$product->product_image) }}" class="img-fluid">
                        </div>
                    </a>
                    <div class="detail-box">
                        <h5>
                            Model: {{ $product->model }}
                        </h5>
                        <h6>
                            Price: {{ $product->regular_price }}
                        </h6>
                        <a href="{{ route('add.to.cart',$product->id) }}" class="btn btn-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mb-4"><a href="{{ route('website.all.product') }}" class="btn text-white w-25" style="background-color: #e84393;">View All Product</a></div>
    </div>
</section>
<!-- Description -->
<section class="company-descripiton border">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center font-weight-bold mt-4">
                <h1>BGD Online Limited Services</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-2 text-center mt-4">
                <h3 class="text-capitalize">web hosting</h3><br>
                <div class="description">
                    <article>
                        BGD Online Limited make registration of web hosting fast, secure, affordable and secure manner. If you are looking to transfer hosting to shared, reseller , vps or dedicated server provider with superb customer support and have a 99.99% uptime.
                    </article>
                </div>
            </div>
            <div class="col-lg-12 p-2 text-center mt-4">
                <h3 class="text-capitalize">web development</h3><br>
                <div class="description">
                    <article>
                        BGD Online Limited expertise in web development. We do outsourcing web design and provide hosting services.We developcompany website , ecommerce solution, Content rich CMS web application for the business needs.You find all service in here
                    </article>
                </div>
            </div>
            <div class="col-lg-12 p-2 text-center mt-4">
                <h3 class="text-capitalize">internet connectivity </h3><br>
                <div class="description">
                    <article>
                        Internet access is the process that enables individuals and organisations to connect to the Internet using computer terminals, computers, mobile devices, sometimes via computer networks. Once connected to the Internet, users can access Internet services, such as email. </article>
                </div>
            </div>
            <div class="col-lg-12 p-2 text-center mt-4">
                <h3 class="text-capitalize">Domain Registration </h3><br>
                <div class="description">
                    <article>
                        We provide Bangladeshi .bd or .bangla and the all the popular domain registration services. Our server uptime 99.99% compared to others. We ensure high server uptime with superb support.You find all service in here
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
</section>
@endsection