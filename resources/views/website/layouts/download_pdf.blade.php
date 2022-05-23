<!DOCTYPE html>
<html>

<head>
    <title>download invoice</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>
<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#6</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">162695CDFS</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">03-06-2022</span></p>
        </div>
        <div class="w-50 float-left logo mt-10">
            <img src="https://www.nicesnippets.com/image/imgpsh_fullsize.png">
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">From</th>
                <th class="w-50">To</th>
            </tr>
            <tr>
                <td>
                    <!-- customer -->
                    <div class="box-text">
                        <p>Name: {{ $user->name }}</p>
                        <p>E-mail: {{ $user->email }}</p>
                        <p>Address: {{ $user->address }}</p>
                        <p>Phone: {{ $user->phone }}</p>
                    </div>
                </td>
                <td>
                    <!-- Seller -->
                    <div class="box-text">
                        <p>Md.Selim Hossain Suhag</p>
                        <p>Jr.Web Developer</p>
                        <p>BGD Online Limited</p>
                        <p>820, Mamun Tower(8th floor),</p>
                        <p> Shewrapara, Mirpur, Dhaka-1216</p>
                        <p>Contact : +88 019-72379494</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Payment Method</th>
                <th class="w-50">Shipping Method</th>
            </tr>
            <tr>
                <td>Cash On Delivery</td>
                <td>Free Shipping - Free Shipping</td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Product-id</th>
                <th class="w-50">Model</th>
                <th class="w-50">Name</th>
                <th class="w-50">Unit-Price</th>
                <th class="w-50">Offer</th>
                <th class="w-50">Quantity</th>
                <th class="w-50">Total</th>
            </tr>
            @foreach($orders as $order)
            <tr align="center">
                <td>{{ $order->product_id }}</td>
                <td>{{ $order->model }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->offer }} %</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Tax (0%)</p>
                            <p>Total Payable</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>{{ $sub_total }}</p>
                            <p>$0</p>
                            <p>{{ $sub_total }}</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</html>