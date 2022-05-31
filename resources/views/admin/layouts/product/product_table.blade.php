@extends('admin.master')
@section('contents')
<!-- Added, Edit, Delete Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->
<div class="table_button">
    <a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover">
        <thead class="table-primary">
            <tr class="text-center">
                <th>SL</th>
                <th>Model</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Offer</th>
                <th>Description</th>
                <!-- specification -->
                <th>bluetooth</th>
                <th>DVD_player</th>
                <th>leather_interior</th>
                <th>push_star_ignition</th>
                <th>perking_assist</th>
                <th>wheel</th>
                <th>top_speed</th>
                <th>seat_capacity</th>
                <th>body</th>
                <th>engine_capacity</th>
                <th>drive</th>
                <th>mileage</th>
                <th>fuel_type</th>
                <th>condition</th>
                <th>exterior_color</th>
                <th>interior_color</th>
                <th>warranty</th>

                <th>brand_id</th>
                <th>Action 26</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=>$product)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td> <img src="{{ asset('/uploads/products/'.$product->image ) }}" style="width:80px;height:80px;" alt=""> </td>
                <td>{{ $product->offer }} %</td>
                <td>{{ $product->description }}</td>
                <!-- specification -->
                <td>{{ $product->bluetooth }}</td>
                <td>{{ $product->DVD_player }}</td>
                <td>{{ $product->leather_interior }}</td>
                <td>{{ $product->push_star_ignition }}</td>
                <td>{{ $product->perking_assist }}</td>
                <td>{{ $product->wheel }}</td>
                <td>{{ $product->top_speed }}</td>
                <td>{{ $product->seat_capacity }}</td>
                <td>{{ $product->body }}</td>
                <td>{{ $product->engine_capacity }}</td>
                <td>{{ $product->drive }}</td>
                <td>{{ $product->mileage }}</td>
                <td>{{ $product->fuel_type }}</td>
                <td>{{ $product->condition }}</td>
                <td>{{ $product->exterior_color }}</td>
                <td>{{ $product->interior_color }}</td>
                <td>{{ $product->warranty }}</td>
                
                <td>{{ $product->brand_id }}</td>

                <td>
                    <a href="{{ route('admin.view.product',$product->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.edit.product',$product->id) }}" class="btn btn-primary mt-1"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('admin.delete.product',$product->id) }}" class="btn btn-danger mt-1"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection