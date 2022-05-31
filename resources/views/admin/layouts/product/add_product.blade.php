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

    <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="sc1">Brand</label>
            <select class="form-control" id="sc1" name="brand_id">
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="m1">Model</label>
            <input type="text" name="model" class="form-control" id="m1" required>
        </div>
        <div class="form-group">
            <label for="pn1">Name</label>
            <input type="text" name="name" class="form-control" id="pn1" required>
        </div>
        <div class="form-group">
            <label for="rp1"> Price</label>
            <input type="number" name="price" class="form-control" id="rp1" required>
        </div>
        <div class="form-group">
            <label for="img1">Image</label>
            <input type="file" accept="image/*" name="image" class="form-control" id="img1" required>
        </div>
        <div class="form-group">
            <label for="o1">Offer</label>
            <input type="number" name="offer" class="form-control" id="o1" required>
        </div>
        <div class="form-group">
            <label for="pd1">Product Description</label>
            <textarea name="description" class="form-control" id="pd1" rows="3" required></textarea>
        </div>

        <!-- specifications -->
        <h2 class="text-danger mt-3">Specifications</h2>
        <div class="form-group">
            <label for="bluetooth">bluetooth</label>
            <select class="form-control" name="bluetooth" id="bluetooth">
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="DVD_player">DVD_player</label>
            <select class="form-control" name="DVD_player" id="DVD_player">
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="leather_interior">leather_interior</label>
            <select class="form-control" name="leather_interior" id="leather_interior">
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="push_star_ignition">push star ignition</label>
            <select class="form-control" name="push_star_ignition" id="push_star_ignition">
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        <div class="form-group">
            <label for="perking_assist">perking_assist</label>
            <select class="form-control" name="perking_assist" id="perking_assist">
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
        </div>
        
        
        <!-- Details -->
        <h2 class="text-danger mt-3">car details</h2>
        <div class="form-group">
            <label for="wheel">wheel</label>
            <input type="text" name="wheel" class="form-control" id="wheel" required>
        </div>
        <div class="form-group">
            <label for="top_speed"> top speed</label>
            <input type="text" name="top_speed" class="form-control" id="top_speed" required>
        </div>
        <div class="form-group">
            <label for="seat_capacity">seat_capacity</label>
            <input type="number" name="seat_capacity" class="form-control" id="seat_capacity" required>
        </div>

        
        <div class="form-group">
            <label for="body">body</label>
            <input type="text" name="body" class="form-control" id="body" required>
        </div>
        <div class="form-group">
            <label for="engine_capacity">engine_capacity</label>
            <input type="number" name="engine_capacity" class="form-control" id="engine_capacity" required>
        </div>
        <div class="form-group">
            <label for="drive">drive</label>
            <input type="text" name="drive" class="form-control" id="drive" required>
        </div>
        <div class="form-group">
            <label for="mileage">mileage</label>
            <input type="number" name="mileage" class="form-control" id="mileage" required>
        </div>
        <div class="form-group">
            <label for="fuel_type">fuel_type</label>
            <input type="text" name="fuel_type" class="form-control" id="fuel_type" required>
        </div>
        <div class="form-group">
            <label for="condition">condition</label>
            <input type="text" name="condition" class="form-control" id="condition" required>
        </div>
        <div class="form-group">
            <label for="exterior_color">exterior_color</label>
            <input type="text" name="exterior_color" class="form-control" id="exterior_color" required>
        </div>
        <div class="form-group">
            <label for="interior_color">interior_color</label>
            <input type="text" name="interior_color" class="form-control" id="interior_color" required>
        </div>
        <div class="form-group">
            <label for="warranty">warranty</label>
            <input type="text" name="warranty" class="form-control" id="warranty" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit Now</button>
    </form>
</div>
@endsection