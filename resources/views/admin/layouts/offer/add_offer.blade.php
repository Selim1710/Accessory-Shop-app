@extends('admin.master')
@section('contents')
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

<div class="myform">
    <form action="{{ route('admin.store.offer') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Enter Short Title for offer</label>
            <input type="text" name="name" class="form-control" placeholder="enter short title">
        </div>
        <div class="form-group">
            <label for="c_n1">Product Name - offer</label>
            <select name="product_id" id="" class="form-control">
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="img1">Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="img1" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit Now</button>
    </form>
</div>
@endsection