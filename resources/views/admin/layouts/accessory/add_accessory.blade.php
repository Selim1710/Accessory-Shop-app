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

    <form action="{{ route('admin.store.accessory') }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="sc1">select product</label>
            <select class="form-control" id="sc1" name="product_id">
                <option value="">--select--</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
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
            <label for="stock_quantity"> Add Stock</label>
            <input type="number" name="stock_quantity" class="form-control" id="stock_quantity" required>
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
            <label for="pd1">Description</label>
            <textarea name="description" class="form-control" id="pd1" rows="3" required></textarea>
        </div>

        <!-- specifications -->
        <h2 class="text-danger mt-3">Specifications</h2>
        <div class="form-group">
            <label for="function">function</label>
            <input type="text" name="function" class="form-control" id="function" required>
        </div>
        <div class="form-group">
            <label for="metarials">metarials</label>
            <input type="text" name="metarials" class="form-control" id="metarials" required>
        </div>
        <div class="form-group">
            <label for="certification">certification</label>
            <input type="number" name="certification" class="form-control" id="certification" required>
        </div>
        <div class="form-group">
            <label for="color">color</label>
            <input type="text" name="color" class="form-control" id="color" required>
        </div>
        <div class="form-group">
            <label for="size">size</label>
            <input type="text" name="size" class="form-control" id="size" required>
        </div>
        <div class="form-group">
            <label for="warranty">warranty</label>
            <input type="number" name="warranty" class="form-control" id="warranty" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit Now</button>
    </form>
</div>
@endsection