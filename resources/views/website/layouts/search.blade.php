@extends('website.master')
@section('contents')
<section class="featured-Product border" id="featured_product">
    <div class="productHeader">
        <h1>Our Products</h1>
        <p>Check & Get Your Desired Product !</p>
    </div>
    <div class="product">
        <div class="row">
            @foreach($products as $product)
            <div class="column">
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
    </div>
</section>
@endsection