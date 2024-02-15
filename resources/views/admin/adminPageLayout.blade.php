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
<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="/admin/product">
            <h1 class="tm-site-title mb-0">Admin Dashboard</h1>
        </a>
        <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link active" href="/admin/product">
                        <i class="fas fa-shopping-cart"></i> Products
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/product">
                        <i class="far fa-user"></i> Accounts
                    </a>
                </li>
            </ul>
            <form action="{{ route('admin.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 w-200" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-block" href="/admin/login">
                        <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @section('content')
    @show
</div>

</body>
</html>
