<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<div class="content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class ="navbar-brand" href='#'> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Início </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('categories')}}">Categorias <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            @auth
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Painel adminstrativo</a>
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
            @yield('content')
    <footer>
        <div class="container">
            <p> Categorias </p>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-4">
                        <a href="{{route('category', $category->id)}}"> {{$category->name}}</a>
                    </div>
                @endforeach
            </div>
            <span id="footer-copyright"> &#169; 2019 - Cachoeira Online </span>
        </div>
    </footer>
</div>
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
{!! toastr()->render() !!}
</body>
</html>
