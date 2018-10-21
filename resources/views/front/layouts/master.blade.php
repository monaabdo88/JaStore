<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <!-- Bootstrap core CSS -->
    {{Html::style('assets/vendor/bootstrap/css/bootstrap.min.css')}}
    {{Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}
    {{Html::style('assets/css/heroic-features.css')}}

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">LaravelShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart
                        @if(Cart::instance('default')->count() > 0)
                            <strong>({{Cart::instance('default')->count()}})</strong>
                        @endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ auth()->check() ? auth()->user()->name : 'Account' }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        @if(!auth()->check())
                            <a class="dropdown-item " href="{{url('/user/login')}}">Sign In</a>
                            <a class="dropdown-item" href="{{url('/user/register')}}">Sign Up</a>
                        @else
                            <a href="{{url('/user/profile')}}" class="dropdown-item">Profile</a>
                            <a href="{{url('user/logout')}}" class="dropdown-item">Logout</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Content -->
<div class="container">
@yield('content')
</div>
<!-- /.container -->
<footer>
    <div class="copyright text-center primary">
        &copy;
        <script>document.write(new Date().getFullYear())</script>
        , made with <i class="fa fa-heart heart"></i> by <a href="http://mona-abdo.com/">Mona Abdo</a>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
{{Html::script('assets/vendor/jquery/jquery.min.js')}}
{{Html::script('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}
@yield('script')
</body>

</html>
