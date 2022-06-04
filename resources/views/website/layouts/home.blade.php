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
                        <a href="{{ route('show.category.product',$category->id) }}" class="btn view-btn w-100">{{ $category->category_name }}</a>
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
<section class="All_product">
    <div class="container">
        <div>
            <h1 class="section_header">Just For You</h1>
            <p class="section_des">Get your desire product from our website !</p>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mt-2">
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
            <div class="view_button">
                <a href="{{ route('website.all.product') }}" class="btn btn-info w-100 mt-2 text-white">
                    View all
                </a>
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
                <div class="col-lg-6 d-flex align-items-stretch">
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
                            <a href="{{ route('accessory.add.to.cart',$accessory->id) }}">Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div>
                <a href="{{ route('website.all.accessory') }}" class="btn btn-warning w-100 mt-2 text-white">View all</a>
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
                            <h4>40% discount</h4>
                        </span>
                    </div>
                    <div class="card_desc">
                        <h3 class="text-danger">Selling product and accessories in chip rate</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                        <a href="#" class="btn_card">Read</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card_content">
                    <div class="card_img">
                        <img src="https://placeimg.com/380/230/nature" alt="">
                        <span>
                            <h4>40% discount</h4>
                        </span>
                    </div>
                    <div class="card_desc">
                        <h3 class="text-danger">Selling product and accessories in chip rate</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                        <a href="#" class="btn_card">Read</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card_content">
                    <div class="card_img">
                        <img src="https://placeimg.com/380/230/nature" alt="">
                        <span>
                            <h4>40% discount</h4>
                        </span>
                    </div>
                    <div class="card_desc">
                        <h3 class="text-danger">Selling product and accessories in chip rate</h3>
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