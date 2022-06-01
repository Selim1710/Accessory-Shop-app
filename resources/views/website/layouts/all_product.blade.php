@extends('website.master')
@section('contents')
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
    <div>
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
            <div class="float-right mt-2 mb-2">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>
@endsection