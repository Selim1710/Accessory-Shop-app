<!-- first nav -->
<div class="first_nav">
   <div class="menu">
      <!-- logo -->
      <div class="Logo m-2">
         <a href="{{ route('website.home') }}">
            <img src="{{ asset('website/images/logo.jpg') }}" alt="" class="img-fluid w-25">
         </a>
         <h2 class="navbar-brand" id="desktop_nav">Accessory Shop</h2>
      </div>
      <h2 class="navbar-brand" id="mobile_nav">Accessory Shop</h2>
      <!-- search -->
      <div class="container h-100 mt-4">
         <div class="d-flex justify-content-center h-100">
            <form action="{{ route('website.search') }}" method="POST">
               @csrf
               <div class="searchbar">
                  @if(!empty($search))
                  <input class="search_input" type="text" name="search" value="{{ $search }}" placeholder="Search...">
                  @else
                  <input class="search_input" type="text" name="search" placeholder="Search...">
                  @endif
                  <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
               </div>
            </form>
         </div>
      </div>
      <!-- add to cart -->
      @if(auth()->user())
      <a href="{{ route('user.profile',auth()->user()->id) }}" class="menu_item">
         <div class="d-flex">
            <i class="fa-solid fa-basket-shopping fa-2xl"></i><span class="badge badge-danger">{{ session()->has('cart') ? count(session()->get('cart')):0 }}</span>
         </div>
      </a>
      <!-- notification -->
      <a href="#" class="menu_item">
         <div class="d-flex">
            <i class="fa-regular fa-bell fa-2xl"></i><span class="badge badge-secondary">0 items</span>
         </div>
      </a>
      @else
      <a href="{{ route('users.login.form') }}" class="menu_item">
         <div class="d-flex">
            <i class="fa-solid fa-basket-shopping fa-2xl"></i><span class="badge badge-danger">0 items</span>
         </div>
      </a>
      @endif
   </div>
</div>

<div class="second_nav" id="Fixed_second_nav">
   <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="{{ route('website.home') }}">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('website.all.product') }}">Product</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('website.all.accessory') }}">Accessories</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('users.login.form') }}">Accounts</a>
            </li>
         </ul>
      </div>
   </nav>
</div>