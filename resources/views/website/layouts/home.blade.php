@extends('website.master')
@section('contents')
<!-- category -->
<section class="all_categories">
    <div class="container">
        <div class="text-center m-3">
            <h1>Our Categories</h1>
        </div>

        <div class="container-fluid" id="inventory">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">

                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201708/1821/3132/6f5c6e85-61ac-41bf-abc9-03cff546f5dd.jpg?w=400" alt="Card image cap">
                        <button class="btn view-btn">SEDAN</button>
                        <div class="ribbon"><span>Popular</span></div>


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201802/0121/3143/21d0f107-e2f7-4fa8-b810-9ff140630f24.jpg?w=400" alt="Card image cap">
                        <button class="btn view-btn">SUV</button>
                        <div class="ribbon"><span>Popular</span></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201801/1021/3340/a76ba07f-1528-4071-a048-a0b5878c14e3.jpg?w=400" alt="Card image cap">
                        <button class="btn view-btn">TRUCK</button>
                        <div class="ribbon"><span>Popular</span></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201611/1621/3305/850131da-6165-4cd5-9acc-7fcad9667f6a.jpg?w=400" alt="Card image cap">
                        <button class="btn btn-danger view-btn">HATCHBACK</button>
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card">
                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201712/2921/3124/0216f098-8842-48dc-ae3d-5eb316f0b135.jpg?w=400" alt="Card image cap">
                        <button class="btn view-btn">WAGON</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201807/0421/3454/b95885c9-17d2-4d72-b8e9-b35636874b2b.jpg?w=400" alt="Card image cap">
                        <button class="btn btn-danger view-btn">COUPE</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201711/2121/3221/bd2b1067-0cf0-4f99-9b38-7ddabe7378de.jpg?w=400" alt="Card image cap">
                        <button class="btn btn-danger view-btn">CONVERTIBLE</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="img-fluid" src="http://az413908.vo.msecnd.net/99/photos/201809/2121/3627/2e41e90c-377b-430e-92ed-5db9b1331f19.jpg?w=400" alt="Card image cap">
                        <button class="btn  view-btn">MINIVAN</button>
                    </div>
                </div>

            </div>
        </div>
        <br><br>
    </div>
</section>
<!-- product -->
<section class="all_product">

    <hr>

    <div class="container">
        <h3 class="h3">shopping Demo-3 </h3>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid3">
                    <div class="product-image3">
                        <a href="#">
                            <img class="pic-1" src="{{ asset('website/images/t1.jpg') }}">
                            <img class="pic-2" src="{{ asset('website/images/t1.jpg') }}">
                        </a>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">New</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Men's Blazer</a></h3>
                        <div class="price">
                            $63.50
                            <span>$75.00</span>
                        </div>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star disable"></li>
                            <li class="fa fa-star disable"></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>

    <div class="container">
        <h3 class="h3">shopping Demo-6 </h3>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid6">
                    <div class="product-image6">
                        <a href="#">
                            <img class="pic-1" src="{{ asset('website/images/t1.jpg') }}">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Men's Shirt</a></h3>
                        <div class="price">$11.00
                            <span>$14.00</span>
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>

</section>

@endsection