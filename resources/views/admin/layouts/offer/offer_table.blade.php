@extends('admin.master')
@section('contents')
<!-- Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->


<div class="table_button">
    <a href="{{ route('admin.add.offer') }}" class="btn btn-primary">Add offer</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover" id="myofferTable">
        <thead class="table-primary">
            <tr class="text-center">
                <th>SL</th>
                <th>Name</th>
                <th>Product id</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $key=>$offer)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $offer->name }}</td>
                <td>{{ $offer->product_id }}</td>
                <td><img src="{{ asset('/uploads/offers/'.$offer->image ) }}" style="width:80px;height:80px;" alt=""></td>
                <td>
                    <a href="{{ route('admin.view.offer',$offer->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.delete.offer',$offer->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#myofferTable').DataTable();
    });
</script>