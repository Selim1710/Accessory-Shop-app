<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('website/login/form.css') }}">
    <title>User login form</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <!-- Message -->
        @if(session()->has('error'))
        <p class="alert alert-danger">{{ session()->get('error') }}</p>
        @endif
        @if(session()->has('message'))
        <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
        @endif
        <!-- end -->
        <section class="My_form p-4">
            <div class="head text-center m-4">
                <h1>Accessory Shopping Registration Form</h1>
            </div>
            <br><br>
            <div class="container">
                <form action="{{ route('user.do.registration') }}">
                    <div class="row">
                        <div class="col-lg-6 border-right">
                            <div class="form-group">
                                <label for="name">Enter Your name</label>
                                <input type="text" name="name" placeholder="Enter your name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Enter Your email</label>
                                <input type="email" name="email" placeholder="@example.com" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Enter Your phone</label>
                                <input type="number" name="phone" placeholder="Enter your phone number" id="phone" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="adderss">adderss</label>
                                <textarea name="adderss" placeholder="Enter your adderss" id="adderss" class="form-control"></textarea>
                                <div class="form-row mt-3">
                                    <div class="form-group ml-3">
                                        <label for="password">Enter password</label>
                                        <input type="password" name="password" placeholder="Enter password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group ml-3">
                                        <label for="confirm_password">Confirm password</label>
                                        <input type="password" name="confirm_password" placeholder="Enter Confirm Passord" id="confirm_password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fa fa-paper-plane"></i>
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>