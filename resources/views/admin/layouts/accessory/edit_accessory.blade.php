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

    <form action="{{ route('admin.update.accessory',$accessory->id) }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="m1">Model</label>
            <input type="text" name="model" value="{{ $accessory->model }}" class="form-control" id="m1" required>
        </div>
        <div class="form-group">
            <label for="pn1">Name</label>
            <input type="text" name="name" value="{{ $accessory->name }}" class="form-control" id="pn1" required>
        </div>
        <div class="form-group">
            <label for="rp1"> Price</label>
            <input type="number" name="price" value="{{ $accessory->price }}" class="form-control" id="rp1" required>
        </div>
        <div class="form-group">
            <label for="stock_quantity"> Add Stock</label>
            <input type="number" name="stock_quantity" value="{{ $accessory->stock_quantity }}" class="form-control" id="stock_quantity" required>
        </div>
        <div class="form-group">
            <label for="o1">Offer</label>
            <input type="number" name="offer" value="{{ $accessory->offer }}" class="form-control" id="o1" required>
        </div>
        <div class="form-group">
            <label for="pd1">Description</label>
            <textarea name="description" class="form-control" id="pd1" rows="3" required>{{ $accessory->description }}</textarea>
        </div>

        <!-- specifications -->
        <h2 class="text-danger mt-3">Specifications</h2>
        <div class="form-group">
            <label for="function">function</label>
            <input type="text" name="function" value="{{ $accessory->function }}" class="form-control" id="function" required>
        </div>
        <div class="form-group">
            <label for="metarials">metarials</label>
            <input type="text" name="metarials" value="{{ $accessory->metarials }}" class="form-control" id="metarials" required>
        </div>
        <div class="form-group">
            <label for="certification">certification</label>
            <input type="number" name="certification" value="{{ $accessory->certification }}" class="form-control" id="certification" required>
        </div>
        <div class="form-group">
            <label for="color">color</label>
            <input type="text" name="color" value="{{ $accessory->color }}" class="form-control" id="color" required>
        </div>
        <div class="form-group">
            <label for="size">size</label>
            <input type="text" name="size" value="{{ $accessory->size }}" class="form-control" id="size" required>
        </div>
        <div class="form-group">
            <label for="warranty">warranty</label>
            <input type="number" name="warranty" value="{{ $accessory->warranty }}" class="form-control" id="warranty" required>
        </div>

        <button type="submit" class="btn btn-info w-100">Submit Now</button>
    </form>
</div>
@endsection