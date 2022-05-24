@extends('website.master')
@section('contents')
<!-- All Categories -->
<section class="border m-3">
    <h1 class="text-center p-2">All Categories</h1>
    <div class="d-flex">
        <div class="left_column">
            <!-- category >> brand -->
            <h4>
                Select Brand:
            </h4>
            <div class="category" id="category">
                @foreach($categories as $category)
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-info btn-block text-uppercase" data-toggle="dropdown">
                                {{ $category->category_name }}
                            </a>
                            @if(!empty($category->subCategories))
                            <div class="dropdown-menu ml-3">
                                @foreach($category->subCategories as $subCategory)
                                <a class="dropdown-item" href="{{ route('show.sub.category.product',$subCategory->id) }}">{{ $subCategory->sub_category_name }}</a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
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
        <div class="all_product_btn w-50 btn"><a href="{{ route('website.all.product') }}">View All Product</a></div>
    </div>
</section>

@endsection