{{-- action="{{ route('login.action') }}" method="POST" --}}

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="{{ asset('assets_login/css/login.css') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets_login/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets_login/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets_login/css/style.css') }}">

    <title>Login #7</title>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets_login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Log In</h3>
                                <p class="mb-4"></p>
                            </div>
                            <form action="{{ route('login.action') }}" method="POST">
                                @if (!empty(request('message')))
                                    <div class="text-center">
                                        <h6 class="text-danger mb-4 ">{{ request('message') }}</h6>
                                    </div>
                                @endif
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input value="nomena" type="text" class="form-control" id="username" name="name" required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input value="1234" type="password" class="form-control" id="password" name="password" required>

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="{{ route('register') }}" class="forgot-pass">Sign
                                            In</a></span>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">

                                <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

                                <div class="social-login">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>
