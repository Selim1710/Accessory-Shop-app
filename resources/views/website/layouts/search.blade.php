@extends('website.master')
@section('contents')
@if($products)
<section class="All_product">
    <div class="container">
        <div>
            <h1 class="section_header">Total searching result found:{{ $result1 + $result2 }}</h1>
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
        </div>
    </div>
    @endif
    @if($accessories)
    <section class="accessories_section layout_padding-bottom">
        <div class="accessories_container">
            <div class="container ">
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
    @endif
</section>
<br><br><br>
@endsection