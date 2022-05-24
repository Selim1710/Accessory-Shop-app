<section class="Website_header">
	<div class="wrapper font-weight-lighter">
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
				<div class="menu-icon">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				<div class="logo">
					BGD Online Limited
				</div>
				<div class="menu text-capitalize collapse navbar-collapse" id="menu">
					<ul>
						<li><a href="#">home</a></li>
						<li><a href="#">product</a></li>
						<li><a href="#">accessories</a></li>
						@if(auth()->user())
						<li><a href="{{ route('user.profile',auth()->user()->id) }}"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a></li>
						@else
						<li><a href="{{ route('users.login.form') }}">login</a></li>
						@endif
					</ul>
				</div>
			</nav>
		</header>
		<div class="content m-4">
			<article>
				Message From C.E.O <br> <br>
				“First of all, Thank you for taking the time to read my message. The purpose of this message is to help to build business relations between you & me. All clients are valuable for me, & I want to keep business relations forever. If there is any complaint regarding my service & solution, Kindly feel free to contact me, Although there is a contact support page.”
				<br>
				Shafiqul Islam
			</article>
			<br>
			<article>
				Web development: <br>
				BGD Online Limited expertise in web development. We do outsourcing web design and provide hosting services.We developcompany website , ecommerce solution, Content rich CMS web application for the business needs.You find all service in here
			</article>
		</div>
	</div>
</section>