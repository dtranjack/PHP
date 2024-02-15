<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<link href='https://fonts.googleapis.com/css?family=JetBrains Mono' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="/css/fontawesome.min.css">
<link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
<body>
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-12 mx-auto tm-login-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="tm-block-title mb-4">Welcome to <b>Dashboard</b></h2>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <form action="index.html" method="post" class="tm-login-form">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input
                                    name="username"
                                    type="text"
                                    class="form-control validate"
                                    id="username"
                                    value=""
                                    required
                                />
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input
                                    name="password"
                                    type="password"
                                    class="form-control validate"
                                    id="password"
                                    value=""
                                    required
                                />
                            </div>
                            <div class="form-group mt-4">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block text-uppercase"
                                >
                                    Login
                                </button>
                            </div>
                            <button class="mt-3 btn btn-primary btn-block text-uppercase">
                                Forgot your password?
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
</body>
</html>
