<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('website/login/form.css') }}">
    <title>User login form</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <section class="My_form p-4">
            <div class="head text-center m-4">
                <h1>Accessory Shopping Login Form</h1>
            </div>
            <br><br>
            <div class="container">
                <!-- Message -->
                @if(session()->has('error'))
                <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
                @endif
                @if(session()->has('message'))
                <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
                @endif
                <!-- end -->
                <div class="row">
                    <div class="col-lg-6 border-right col-sm-12 col-md-12">
                        <form action="{{ route('user.do.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Your Email</label>
                                <input type="email" name="email" placeholder="Enter input" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Your Password</label>
                                <input type="password" name="password" placeholder="Enter input" class="form-control">
                            </div>
                            <button class="btn btn-warning text-white w-100"><i class="fa fa-paper-plane"></i> Sign In</button>
                        </form>

                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <h2 class="text-center">OR</h2>
                        <div>
                            <a href="{{ route('user.registration.form') }}" class="btn btn-info w-100">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>