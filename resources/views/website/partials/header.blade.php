<section class="header">
	<nav class="navbar navbar-dark navbar-default navbar-expand-xl">
		<a href="{{ route('website.home') }}" class="navbar-brand"><img src="{{ asset('website/images/bgdlogo.jpg') }}" alt="logo">BGD</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
			<!-- search -->
			<form action="{{ route('website.search') }}" method="POST" class="navbar-form form-inline">
				@csrf
				<div class="input-group search-box">
					@if(!empty($search))
					<input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search here...">
					@else
					<input type="text" name="search" value="" class="form-control" placeholder="Search here...">
					@endif
				</div>
			</form>
			<div class="navbar-nav ml-auto">
				<a href="{{ route('website.home') }}" class="nav-item nav-link" style="padding-right: 3.5rem;padding-left: 3.5rem;"><i class="fa fa-home"></i>
					<span>Home</span>
				</a>
				<a href="#" class="nav-item nav-link" style="padding-right: 3.5rem;padding-left: 3.5rem;"><i class="fa fa-product-hunt"></i>
					<span>Product</span>
				</a>
				<a href="#" class="nav-item nav-link" style="padding-right: 3.5rem;padding-left: 3.5rem;"><i class="fa fa-briefcase"></i>
					<span>Accessory</span>
				</a>
				@if(auth()->user())
				<a href="{{ route('user.profile',auth()->user()->id) }}" class="nav-item nav-link" style="padding-left: 3.5rem;">
					<i class="fa fa-user"></i>
					<span>Profile </span><span class="badge badge-danger">{{ session()->has('cart') ? count(session()->get('cart')):0 }}</span>
				</a>
				@else
				<a href="{{ route('users.login.form') }}" class="nav-item nav-link" style="padding-left: 3.5rem;"><i class="fa fa-users"></i>
					<span>Accounts</span>
				</a>
				@endif
			</div>
		</div>
	</nav>
	<div class="border" style="border-color: #16a085;background-color:#16a085;">
		<!--  message -->
		@if(session()->has('error'))
		<p class="alert alert-danger">{{ session()->get('error') }}</p>
		@endif
		@if(session()->has('message'))
		<p class="alert alert-danger">{{ session()->get('message') }}</p>
		@endif
		<!-- end -->
	</div>
</section>