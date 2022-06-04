<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('website/css/profile.css') }}">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>user profile</title>
</head>

<body class="">
    <section class="user-profile">
        <div class="container">
            <h1 class="text-center pt-3 text-capitalize">{{ $user->name }}<br></h1>
            <!-- Message -->
            @if(session()->has('error'))
            <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
            @endif
            @if(session()->has('message'))
            <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
            @endif
            <!-- end -->
            <div class="edit-profile text-right">
                <a href="{{ route('user.edit.profile',$user->id) }}" class="btn btn-secondary">Edit profile</a>
                <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a>
            </div>
            <br><br>
            <div class="user-details mt-4">
                <nav>
                    <div class="nav nav-tabs nav-fill text-uppercase" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="user_details-tab" data-toggle="tab" href="#user_details" role="tab" aria-controls="user_details" aria-selected="true">User-details</a>
                        <a class="nav-item nav-link" id="order_list-tab" data-toggle="tab" href="#order_list" role="tab" aria-controls="order_list" aria-selected="false">Order-list</a>
                        <a class="nav-item nav-link" id="my_cart-tab" data-toggle="tab" href="#my_cart" role="tab" aria-controls="my_cart" aria-selected="false">Mycart <span class="badge badge-danger">{{ session()->has('cart') ? count(session()->get('cart')):0 }}</span></a>
                    </div>
                </nav>
                <!-- User details -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active mt-2" id="user_details" role="tabpanel" aria-labelledby="user_details-tab">
                        E-mail: {{ $user->email }}<br>
                        Address: {{ $user->address }}<br>
                    </div>
                    <!-- order-list -->
                    <div class="tab-pane fade" id="order_list" role="tabpanel" aria-labelledby="order_list-tab">
                        <div class="button-group">
                            <a href="{{ route('user.download.pdf',$user->id) }}" class="btn btn-success">
                                Download PDF
                            </a>
                            <a href="#" class="btn btn-info">
                                Message
                            </a>
                        </div>
                        <div class="d-flex">
                            @php
                            $grand_total= 0;
                            @endphp
                            <table class="table border table-responsive w-75">
                                <thead>
                                    <th>Product-id</th>
                                    <th>Model</th>
                                    <th>Name</th>
                                    <th>Unit-Price</th>
                                    <th>Offer</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Order-Status</th>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->product_id }}</td>
                                        <td>{{ $order->model }}</td>
                                        <td>{{ $order->product_name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->offer }} %</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->total }}</td>
                                        @php
                                        (int)$grand_total += ($order->price * $order->quantity) - ($order->price * $order->quantity * ($order->offer/100));
                                        @endphp
                                        <td>{{ $order->payment_status }}</td>

                                        @if($order->order_status != 'accepted')
                                        <td>pending</td>
                                        @else
                                        <td class="text-center text-success">Confirmed</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="sub_total ml-2 p-2 text-center border">
                                <h4 class="border p-2">Payment Summary:</h4>
                                <h5 class="border p-2">Total-Product: {{ $total_product  }}</h5>
                                <h5 class="border p-2">Sub-Total: {{ (int)$grand_total }}</h5>
                                <h5 class="border p-2">Shipping Fee: 0</h5>
                                <h5 class="border p-2">Total: {{ (int)$grand_total }} </h5>
                                <a href="{{ route('user.process.to.pay',$user->id) }}" class="btn btn-info w-100">
                                    PROCESS TO PAY
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- mycart -->
                    <div class="tab-pane fade" id="my_cart" role="tabpanel" aria-labelledby="my_cart-tab">
                        <div class="button-group mt-2 mb-2">
                            <a href="{{ route('clear.cart') }}" class="btn btn-danger">
                                Clear All
                            </a>
                        </div>
                        <div class="d-flex">
                            @php
                            $sub_total= 0;
                            @endphp
                            <table class="table table-hover border table-responsive w-75">
                                <thead>
                                    <th>Product-id</th>
                                    <th>Model</th>
                                    <th>Name</th>
                                    <th>Unit-Price</th>
                                    <th>Offers</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @if(!empty($carts))
                                    @foreach($carts as $key=>$cart)
                                    <tr>
                                        <td>{{ $cart['product_id']}}</td>
                                        <td>{{ $cart['product_model'] }}</td>
                                        <td>{{ $cart['product_name'] }}</td>
                                        <td>{{ $cart['regular_price'] }}</td>
                                        @php
                                        (int)$sub_total += ($cart['regular_price'] * $cart['product_quantity']) - ($cart['regular_price'] * $cart['product_quantity'] * ($cart['product_offer']/100));
                                        @endphp
                                        <td>{{ $cart['product_offer'] }} %</td>
                                        <td>{{ $cart['product_quantity'] }}</td>
                                        <td>{{ ($cart['regular_price'] * $cart['product_quantity']) - ($cart['regular_price'] * $cart['product_quantity'] * ($cart['product_offer']/100)) }}</td>
                                        <td>
                                            <a href="{{ route('user.remove.cart',$key) }}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <p class="text-danger">No product into the cart</p>
                                    @endif
                                </tbody>
                            </table>
                            <div class="sub_total ml-2 p-2 text-center border">
                                <h4 class="border p-2">Order Summary:</h4>
                                <h5 class="border p-2">Total-Product: {{ session()->has('cart') ? count(session()->get('cart')):0 }}</h5>
                                <h5 class="border p-2">Sub-Total: {{ (int)$sub_total }}</h5>
                                <h5 class="border p-2">Shipping Fee: 0</h5>
                                <h5 class="border p-2">Total: {{ (int)$sub_total }} </h5>
                                <a href="{{ route('user.checkout') }}" class="btn btn-success w-100">
                                    CheckOut
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>