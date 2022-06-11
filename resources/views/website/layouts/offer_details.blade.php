@extends('website.master')
@section('contents')
<!-- style="border:5px solid red;" -->
<!-- Product Offer Details  -->
<section class="product-offer">
    <div class="container">
        <div class="offer text-center">
            <br><br>
            <div class="time d-flex">
                <span class="title text-uppercase">offers ends in</span>
                <div class="time-details">
                    <span class="digit">0</span>
                    <span class="digit">1</span><br>
                    <span class="tag pr-2">Days</span>
                </div>
                <div class="time-details">
                    <span class="digit">0</span>
                    <span class="digit">1</span><br>
                    <span class="tag pr-2">Hour</span>
                </div>
                <div class="time-details">
                    <span class="digit">1</span>
                    <span class="digit">1</span><br>
                    <span class="tag pr-2">Minute</span>
                </div>
                <div class="time-details">
                    <span class="digit">1</span>
                    <span class="digit">0</span><br>
                    <span class="tag pr-2">Seconds</span>
                </div>
            </div>
            <br><br>
            <div class="offer-details">
                <img src="{{ asset('/uploads/offer/'.$offer->image) }}" class="w-100 h-75"><br><br>
                <p>
                    {{ $offer->details }}
                </p>
                <span class="text-secondary">
                {{ $offer->condition }}
                </span>
            </div>
            <br> <br>
        </div>
    </div>
</section>
@endsection