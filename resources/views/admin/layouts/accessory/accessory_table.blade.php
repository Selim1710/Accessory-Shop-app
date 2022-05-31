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
    <a href="{{ route('admin.add.accessory') }}" class="btn btn-primary">Add accessory</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover">
        <thead class="table-primary">
            <tr class="text-center">
                <th>SL</th>
                <th>Model</th>
                <th>Name</th>
                <th>Price</th>
                <th>stock_quantity</th>
                <th>Image</th>
                <th>Offer</th>
                <th>Description</th>
                <!-- specification -->
                <th>function</th>
                <th>metarials</th>
                <th>certification</th>
                <th>color</th>
                <th>size</th>
                <th>warranty</th>
                
                <th>product_id</th>
                <th>Action 26</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accessories as $key=>$accessory)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $accessory->model }}</td>
                <td>{{ $accessory->name }}</td>
                <td>{{ $accessory->price }}</td>
                <td>{{ $accessory->stock_quantity }}</td>
                <td> <img src="{{ asset('/uploads/accessories/'.$accessory->image ) }}" style="width:80px;height:80px;" alt=""> </td>
                <td>{{ $accessory->offer }} %</td>
                <td>{{ $accessory->description }}</td>
                <!-- specification -->
                <td>{{ $accessory->function }}</td>
                <td>{{ $accessory->metarials }}</td>
                <td>{{ $accessory->certification }}</td>
                <td>{{ $accessory->color }}</td>
                <td>{{ $accessory->size }}</td>
                <td>{{ $accessory->warranty }}</td>
                
                <td>{{ $accessory->product_id }}</td>

                <td>
                    <a href="{{ route('admin.view.accessory',$accessory->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.edit.accessory',$accessory->id) }}" class="btn btn-primary mt-1"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('admin.delete.accessory',$accessory->id) }}" class="btn btn-danger mt-1"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection