<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @yield('title', 'Bidding')
    </title>
</head>

<body>
    <nav>
        <a href="{{ route('welcome') }}">Home</a>
        @if (Auth::check())
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('goto_new_product_form') }}">
                    New product
                </a>
            @endif
            <a href="{{ route('goto_products') }}">View products</a>

            <span>
                {{ 'Welcome ' . Auth::user()->name }}
            </span>
            <a href="{{ route('logout_user') }}">Logout</a>
        @else
            <a href="{{ route('goto_register') }}">Register</a>
            <a href="{{ route('goto_login') }}">Login</a>
        @endif

    </nav>
    @yield('content')
</body>

</html>
