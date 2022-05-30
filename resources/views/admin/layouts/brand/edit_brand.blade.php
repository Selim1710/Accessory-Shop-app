@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.update.brand',$brand->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Brand Name</label>
            <input type="text" name="brand_name" value="{{ $brand->brand_name}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter brand Name" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Now</button>
    </form>
</div>
@endsection