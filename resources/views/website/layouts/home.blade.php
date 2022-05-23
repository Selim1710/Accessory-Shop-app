@extends('website.master')
@section('contents')
<!-- carousel -->
<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ ('website/images/t1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ ('website/images/t2.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ ('website/images/t3.png') }}" alt="Third slide">
            </div>
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
</section>
<!-- All Categories -->
<section class="border m-3">
    <h1 class="text-center p-2">All Categories</h1>
    <div class="d-flex">
        <div class="left_column ml-4" style="height: 500px;border:2px solid grey;">
            <!-- category >> brand -->
            <h2 class=" text-center mt-2">
                Select Brand:
            </h2>
            <div class="category p-lg-1" id="category">
                @foreach($categories as $category)
                <div class="btn-group">
                    <a href="#" class="btn dropdown-toggle m-1 text-uppercase" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        </div>
        <br><br>
        <!-- category -->
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
    </div>
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

@endsection