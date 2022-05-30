<div class="first_nav">
   <div class="menu">
      <!-- logo -->
      <a href="#">
         <div class="Logo m-2">
            <img src="{{ asset('website/images/logo.jpg') }}" alt="" class="img-fluid w-25">
            <h2 class="navbar-brand">Accessory Shop</h2>
         </div>
      </a>
      <!-- search -->
      <div class="container h-100 mt-4">
         <div class="d-flex justify-content-center h-100">
            <form action="#">
               <div class="searchbar">
                  <input class="search_input" type="text" name="" placeholder="Search...">
                  <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
               </div>
            </form>
         </div>
      </div>
      <!-- add to cart -->
      <a href="#" class="menu_item">
         <div class="d-flex">
            <i class="fa-solid fa-basket-shopping fa-2xl"></i><span class="badge badge-danger">0 items</span>
         </div>
      </a>
      <!-- notification -->
      <a href="#" class="menu_item">
         <div class="d-flex">
            <i class="fa-regular fa-bell fa-2xl"></i><span class="badge badge-secondary">0 items</span>
         </div>
      </a>
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
               <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Product</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Accessories</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Accounts</a>
            </li>
         </ul>

      </div>
   </nav>
</div>