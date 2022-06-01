@extends('website.master')
@section('contents')
<!-- slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('website/images/t1.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('website/images/t2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('website/images/t3.png') }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>
<!-- down 2 -->
<div class="mt-4">
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('website/images/t1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('website/images/t2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('website/images/t3.png') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 mt-2 mb-2">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('website/images/t1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('website/images/t2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('website/images/t3.png') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- category -->
<section class="all_categories">
    <br>
    <div class="container">
        <div>
            <h1 class="section_header">Categories</h1>
            <p class="section_des">click on categories and find your product !</p>
        </div>
    </div>
    <div class="container">
        <div class="container-fluid" id="inventory">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-md-3 col-lg-3 col-sm-3 mt-2">
                    <div class="my_card">
                        <img class="img-fluid" src="{{ asset('uploads/category/'.$category->image) }}" alt="Card image cap">
                        <button class="btn view-btn w-100">{{ $category->category_name }}</button>
                        @if($loop->first)
                        <div class="ribbon"><span>Popular</span></div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br><br><br><br>
    </div>
</section>
<!-- product -->
<div class="container">
    <div>
        <h1 class="section_header">Just For You</h1>
        <p class="section_des">Get your desire product from our website !</p>
    </div>
</div>
<section class="All_product clearfix">
    <div class="filter"> <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filters<span class="fa fa-filter pl-1"></span></button>
    </div>
    <div id="mobile-filter">
        <p class="pl-sm-0 pl-2"> Home | <b>All Breads</b></p>
        <div class="border-bottom pb-2 ml-2">
            <h4 id="burgundy">Filters</h4>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Brands</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="artisan"> <label for="artisan">Fresh Artisan Breads</label> </div>
                <div class="form-group"> <input type="checkbox" id="breakfast"> <label for="breakfast">Breakfast Breads</label> </div>
                <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">Healthy Breads</label> </div>
            </form>
        </div>
    </div>
    <!-- Sidebar filter section -->
    <div id="sidebar">
        <p> Home | <b>All Breads</b></p>
        <div class="border-bottom pb-2 ml-2">
            <h4 id="burgundy">Filters</h4>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Brands</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="artisan"> <label for="artisan">Fresh Artisan Breads</label> </div>
                <div class="form-group"> <input type="checkbox" id="breakfast"> <label for="breakfast">Breakfast Breads</label> </div>
                <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">Healthy Breads</label> </div>
            </form>
        </div>
    </div>
    <!-- products section -->
    <div id="products">
        <div class="container">
            <div class="d-flex flex-row">
                <div class="text-muted m-2" id="res">Showing 44 results</div>
                <div class="ml-auto mr-lg-4">
                    <div id="sorting" class="border rounded p-1 m-1"> <span class="text-muted">Sort by</span>
                        <select name="sort" id="sort">
                            <option value="popularity"><b>Popularity</b></option>
                            <option value="prcie"><b>Price</b></option>
                            <option value="rating"><b>Rating</b></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mt-3">
                    <div class="card">
                        <a href="{{ route('website.product.details',$product->id) }}">
                            <img class="card-img-top" src="{{ asset('uploads/products/'.$product->image) }}">
                        </a>
                        <div class="card-body">
                            <h5><b>{{ $product->name }}</b> </h5>
                            <div class="d-flex flex-row my-2">
                                <div class="text-muted">Price: ৳ {{ $product->price }}</div>
                                <div class="ml-auto"> <button class="border rounded bg-white sign"><span class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1 loaf</span> <button class="border rounded bg-white sign"><span class="fa fa-minus" id="orange"></span></button> </div>
                            </div> <a href="{{ route('add.to.cart',$product->id) }}" class="btn btn-warning w-100 rounded mb-2">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Accessories -->
<section class="accessories_section layout_padding-bottom">
    <div class="accessories_container">
        <div class="container ">
            <div class="heading_container heading_center">
                <h2 class="section_header">
                    Accessories
                </h2>
                <p class="section_des">View product and click on find accessories!</p>
            </div>
            <div class="row">
                @foreach($accessories as $accessory)
                <div class="col-md-6">
                    <div class="box">
                        <a href="{{ route('website.accessory.details',$accessory->id) }}">
                            <div class="img-box">
                                <img src="{{ asset('uploads/accessories/'.$accessory->image) }}" alt="">
                            </div>
                        </a>
                        <div class="detail-box">
                            <h5>
                                Name: {{ $accessory->name }}
                            </h5>
                            <h5>
                                Details: {{ $accessory->description }}
                            </h5>
                            <h5>Price: {{ $accessory->price }}</h5>
                            <h6 class="text-danger">Offer: {{ $accessory->offer }} %</h6>
                            <a href="" class="btn btn-info">Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Services -->
<section class="services">
    <div>
        <h2 class="section_header">
            Our services
        </h2>
        <p class="section_des">We Offer a wide range of services.</p>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="card_content">
                    <div class="card_img">
                        <img src="https://placeimg.com/380/230/nature" alt="">
                        <span>
                            <h4>heading</h4>
                        </span>
                    </div>
                    <div class="card_desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                        <a href="#" class="btn_card">Read</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection