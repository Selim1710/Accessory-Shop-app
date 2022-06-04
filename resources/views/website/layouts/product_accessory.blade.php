@extends('website.master')
@section('contents')
<!-- all Accessories -->
<section class="accessories_section layout_padding-bottom">
    <div class="accessories_container">
        <div class="container ">
            <div class="heading_container heading_center">
                <h2 class="section_header">
                   Total accessory found: {{ $result }}
                </h2>
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
                            <a href="{{ route('accessory.add.to.cart',$accessory->id) }}" class="btn btn-info">Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="float-right mt-2">
                {{ $accessories->links()  }}
            </div>
        </div>
    </div>
    </div>
</section>
<br><br><br><br>
@endsection