@extends('admin.master')
@section('contents')
<div class="myform">
    <!-- Validation Error Message -->
    <div class="message">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <form action="{{ route('admin.update.product',$product->id) }}" method="POST" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="m1">Model</label>
            <input type="text" name="model" value="{{ $product->model }}" class="form-control" id="m1" required>
        </div>
        <div class="form-group">
            <label for="pn1">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="pn1" required>
        </div>
        <div class="form-group">
            <label for="rp1"> Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="rp1" required>
        </div>
        <div class="form-group">
            <label for="o1">Offer</label>
            <input type="number" name="offer" value="{{ $product->offer }}" class="form-control" id="o1" required>
        </div>
        <div class="form-group">
            <label for="pd1">Product Description</label>
            <textarea name="description" class="form-control" id="pd1" rows="3" required> {{ $product->description }}</textarea>
        </div>

        <!-- specifications -->
        <h2 class="text-danger mt-3">Specifications</h2>
        <div class="form-group">
            <label for="bluetooth">bluetooth</label>
            <select class="form-control" name="bluetooth" id="bluetooth">
                <option value="{{ $product->bluetooth }}">{{ $product->bluetooth }}</option>
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="DVD_player">DVD_player</label>
            <select class="form-control" name="DVD_player" id="DVD_player">
                <option value="{{ $product->DVD_player }}">{{ $product->DVD_player }}</option>
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="leather_interior">leather_interior</label>
            <select class="form-control" name="leather_interior" id="leather_interior">
            <option value="{{ $product->leather_interior }}">{{ $product->leather_interior }}</option>
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="push_star_ignition">push star ignition</label>
            <select class="form-control" name="push_star_ignition" id="push_star_ignition">
                <option value="{{ $product->push_star_ignition }}">{{ $product->push_star_ignition }}</option>
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="perking_assist">perking_assist</label>
            <select class="form-control" name="perking_assist" id="perking_assist">
                <option value="{{ $product->perking_assist }}">{{ $product->perking_assist }}</option>
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>


        <!-- Details -->
        <h2 class="text-danger mt-3">car details</h2>
        <div class="form-group">
            <label for="wheel">wheel</label>
            <input type="text" name="wheel" value="{{ $product->wheel }}" class="form-control" id="wheel" required>
        </div>
        <div class="form-group">
            <label for="top_speed"> optical drive</label>
            <input type="text" name="top_speed" value="{{ $product->top_speed }}" class="form-control" id="top_speed" required>
        </div>
        <div class="form-group">
            <label for="seat_capacity">seat_capacity</label>
            <input type="number" name="seat_capacity" value="{{ $product->seat_capacity }}" class="form-control" id="seat_capacity" required>
        </div>


        <div class="form-group">
            <label for="body">body</label>
            <input type="text" name="body" value="{{ $product->body }}" class="form-control" id="body" required>
        </div>
        <div class="form-group">
            <label for="engine_capacity">engine_capacity</label>
            <input type="number" name="engine_capacity" value="{{ $product->engine_capacity }}" class="form-control" id="engine_capacity" required>
        </div>
        <div class="form-group">
            <label for="drive">drive</label>
            <input type="text" name="drive" value="{{ $product->drive }}" class="form-control" id="drive" required>
        </div>
        <div class="form-group">
            <label for="mileage">mileage</label>
            <input type="number" name="mileage" value="{{ $product->mileage }}" class="form-control" id="mileage" required>
        </div>
        <div class="form-group">
            <label for="fuel_type">fuel_type</label>
            <input type="text" name="fuel_type" value="{{ $product->fuel_type }}" class="form-control" id="fuel_type" required>
        </div>
        <div class="form-group">
            <label for="condition">condition</label>
            <input type="text" name="condition" value="{{ $product->condition }}" class="form-control" id="condition" required>
        </div>
        <div class="form-group">
            <label for="exterior_color">exterior_color</label>
            <input type="text" name="exterior_color" value="{{ $product->exterior_color }}" class="form-control" id="exterior_color" required>
        </div>
        <div class="form-group">
            <label for="interior_color">interior_color</label>
            <input type="text" name="interior_color" value="{{ $product->interior_color }}" class="form-control" id="interior_color" required>
        </div>
        <div class="form-group">
            <label for="warranty">warranty</label>
            <input type="text" name="warranty" value="{{ $product->warranty }}" class="form-control" id="warranty" required>
        </div>

        <button type="submit" class="btn btn-info w-100">Submit Now</button>
    </form>
</div>
@endsection