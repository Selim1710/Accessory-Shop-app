<div class="wrapper font-weight-lighter">
	<header>
		<nav>
			<div class="menu-icon">
				<i class="fa fa-bars fa-2x"></i>
			</div>
			<div class="logo">
				BGD Online Limited
			</div>
			<div class="menu text-capitalize">
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
	<div class="content">
		<p>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
		</p>
		<p>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
		</p>
	</div>
</div>