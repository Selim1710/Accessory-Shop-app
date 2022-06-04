@extends('website.master')
@section('contents')
<section class="Product-Details">
	<div class="container">
		<div class="col-lg-12  p-3 main-section bg-white">
			<div class="row">
				<div class="col-lg-6 left-side-product-box pb-3">
					<img src="{{ asset('/uploads/accessories/'.$accessory->image ) }}" class=" p-3">
					<span class="sub-img">
						<img src="{{ asset('/uploads/accessories/'.$accessory->image ) }}" class=" p-2">
						<img src="{{ asset('/uploads/accessories/'.$accessory->image ) }}" class=" p-2">
					</span>
				</div>
				<div class="col-lg-6 text-capitalize">
					<div class="right-side-pro-detail p-3">
						<div class="row">
							<div class="model col-lg-12 font-italic">
								<h2> {{ $accessory->model }} &nbsp; {{ $accessory->name }}</h2>
							</div>
							<div class="col-lg-12">
								<p class=" p-0 price-pro">Price: {{ $accessory->price }} ৳</p>
								<hr class="p-0 ">
							</div>
							<div class="col-lg-12 pt-2">
								<h5>accessory Detail</h5>
								<span>
									{{ $accessory->description }}
								</span>
								<hr class=" pt-2 mt-2">
							</div>
							<!-- stock -->
							<div class="col-lg-12">
								@if($accessory->stock_quantity==0)
								<p class="tag-section"><strong>Availability : </strong><span class="bg-danger text-white p-1 rounded">Out of Stock </span></p>
								@else
								<p class="tag-section"><strong>Availability : </strong><span class="bg-secondary text-white p-1 rounded">Total-In-Stock : {{ $accessory->stock_quantity }}</span></p>
								@endif
							</div>
							<div class="col-lg-12">
								<h6>Quantity :</h6>
							</div>
							<div class="col-lg-12 mt-3">
								<div class="row ">
									<div class="col-lg-6 ">
										<form action="{{ route('website.order.form',$accessory->id) }}" method="GET">
											@csrf
											<input type="number" name="quantity" class="form-control text-center w-100" value="">
											<button type="submit" class="btn btn-success w-100 text-center mt-2">
												Buy Now
											</button>
										</form>
									</div>
									<div class="col-lg-6 pb-2 mt-5 ">
										<a href="{{ route('accessory.add.to.cart',$accessory->id) }}" class="btn btn-info w-100">
											Add To Cart
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- specifications -->
<section>
	<div class="product-table text-capitalize">
		<h1 class="w-25 p-2 rounded">Specifications</h1>
		<table class="table table-hover">
			<p class="bg-secondary text-white p-3 rounded">
				Feature:
			</p>
			<tbody>
				<tr>
					<td>function</td>
					<td>
						{{ $accessory->function }}
					</td>
				</tr>
				<tr>
					<td>metarials</td>
					<td>{{ $accessory->metarials }}</td>
				</tr>
				<tr>
					<td>certification</td>
					<td>{{ $accessory->certification }}</td>
				</tr>
				<tr>
					<td>color</td>
					<td>{{ $accessory->color }}</td>
				</tr>
				<tr>
					<td>size</td>
					<td>{{ $accessory->size }}</td>
				</tr>
				<tr>
					<td>warranty</td>
					<td>{{ $accessory->warranty }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
@endsection