@extends('website.master')
@section('contents')
<section class="Product-Details">
	<div class="container">
		<div class="col-lg-12  p-3 main-section bg-white">
			<div class="row">
				<div class="col-lg-6 left-side-product-box pb-3">
					<img src="{{ asset('/uploads/products/'.$product->image ) }}" class=" p-3">
					<span class="sub-img">
						<img src="{{ asset('/uploads/products/'.$product->image ) }}" class=" p-2">
						<img src="{{ asset('/uploads/products/'.$product->image ) }}" class=" p-2">
					</span>
				</div>
				<div class="col-lg-6 text-capitalize">
					<div class="right-side-pro-detail p-3">
						<div class="row">
							<div class="model col-lg-12 font-italic">
								<h2> {{ $product->model }} &nbsp; {{ $product->name }}</h2>
							</div>
							<div class="col-lg-12">
								<p class=" p-0 price-pro">Price: {{ $product->price }} ৳</p>
								<hr class="p-0 ">
							</div>
							<div class="col-lg-12 pt-2">
								<h5>Product Detail</h5>
								<span>
									{{ $product->description }}
								</span>
								<hr class=" pt-2 mt-2">
							</div>
							<!-- stock -->
							<div class="col-lg-12">
								@foreach($stocks as $stock)
								@if($stock->total_produce==0)
								<p class="tag-section"><strong>Availability : </strong><span class="bg-danger text-white p-1 rounded">Out of Stock </span></p>
								@else
								<p class="tag-section"><strong>Availability : </strong><span class="bg-secondary text-white p-1 rounded">Total-In-Stock : {{ $stock->total_produce }}</span></p>
								@endif
								@endforeach
							</div>
							<div class="col-lg-12">
								<h6>Quantity :</h6>
							</div>
							<div class="col-lg-12 mt-3">
								<div class="row ">
									<div class="col-lg-6 ">
										<form action="{{ route('website.order.form',$product->id) }}" method="GET">
											@csrf
											<input type="number" name="quantity" class="form-control text-center w-100" value="">
											<button type="submit" class="btn btn-success w-100 text-center mt-2">
												Buy Now
											</button>
										</form>
									</div>
									<div class="col-lg-6 pb-2 mt-5 ">
										<a href="{{ route('add.to.cart',$product->id) }}" class="btn btn-info w-100">
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
					<td>bluetooth</td>
					<td>
						{{ $product->bluetooth }}
					</td>
				</tr>
				<tr>
					<td>DVD player</td>
					<td>{{ $product->DVD_player }}</td>
				</tr>
				<tr>
					<td>leather interior</td>
					<td>{{ $product->leather_interior }}</td>
				</tr>
				<tr>
					<td>push star ignition</td>
					<td>{{ $product->push_star_ignition }}</td>
				</tr>
				<tr>
					<td>perking assist</td>
					<td>{{ $product->perking_assist }}</td>
				</tr>
			</tbody>
		</table>
		<!-- product detalis -->
		<table class="table table-hover">
			<p class="bg-secondary text-white p-3 rounded">
				product detalis
			</p>
			<tbody>
				<tr>
					<td>wheel</td>
					<td>{{ $product->wheel }}</td>
				</tr>
				<tr>
					<td>top speed</td>
					<td>{{ $product->top_speed }}</td>
				</tr>
				<tr>
					<td>seat_capacity</td>
					<td>{{ $product->seat_capacity }}</td>
				</tr>
				<tr>
					<td>body</td>
					<td>{{ $product->body }}</td>
				</tr>
				<tr>
					<td>engine capacity</td>
					<td>{{ $product->engine_capacity }}</td>
				</tr>
				<tr>
					<td>drive</td>
					<td>{{ $product->drive }}</td>
				</tr>
				<tr>
					<td>mileage</td>
					<td>{{ $product->mileage }}</td>
				</tr>
				<tr>
					<td>fuel type</td>
					<td>{{ $product->fuel_type }}</td>
				</tr>
				<tr>
					<td>condition</td>
					<td>{{ $product->condition }}</td>
				</tr>
				<tr>
					<td>exterior color</td>
					<td>{{ $product->exterior_color }}</td>
				</tr>
				<tr>
					<td>interior color</td>
					<td>{{ $product->interior_color }}</td>
				</tr>
			</tbody>
		</table>
		<!--  Warranty -->
		<table class="table table-hover">
			<p class="bg-secondary text-white p-3 rounded">
				Warranty
			</p>
			<tbody>
				<tr>
					<td>Manufacturing Warranty</td>
					<td>{{ $product->warranty }}</td>
				</tr>
			</tbody>
		</table>
		<br>
		<div class="related_accessory">
			<a href="{{ route('website.product.accessory',$product->id) }}" class="btn btn-danger w-100 mt-2 mb-4 text-white">
				<i class="fa fa-search"></i>  Find related accessory for this product !
			</a>
		</div>

	</div>
</section>
@endsection