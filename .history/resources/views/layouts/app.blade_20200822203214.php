<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mindanao Art') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: white;
        }
        
        #app {
            margin-top: 17px;
        }

        .container {
            margin-top: 50px;
            /* display: grid;
            justify-content: start;
            gap: 30px;
            grid-template-areas:
                "left picture"; */
        }

        #pattern {
            width: 100%;
            background: url('/images/spattern.png');
            background-repeat: repeat;
            background-size: 34px 27px;
        }


        .root {
            margin-top: 50px;
            display: grid;
            gap: 30px;
            grid-template-rows: 420px;
            grid-template-areas:
                "logo form"
        }

        .logo { grid-area: logo;}
        .form { grid-area: form;}

        input {
            padding: 5px;
            width: 100%;
            height: 40px;
            margin-bottom: 10px;

            background-color: transparent;
            border-bottom: 2px solid black;
            border: none;
            outline: none;
            border-bottom: 1px solid gray;
        }

        select {
            padding: 5px;
            width: 100%;
            height: 40px;
            margin-bottom: 10px;

            background-color: transparent;
            border-bottom: 2px solid black;
            border: none;
            outline: none;
            border-bottom: 1px solid gray;

        }

        button {
            font-size: 20px;
            font-weight: bold;
            background-color: transparent;
            border-bottom: 2px solid black;
            color: #b78032;
            border: none;
            outline: none;
        }

        button:focus {
            outline: 0 !important;
        }

        .back {
            font-size: 25px;
            color: black;
            text-decoration: none !important;
        }

        .back:hover {
            color: #b78032;
        }

        .link {
            font-size: 30px;
            text-decoration: none;
            color: #b78032;
            font-weight: bold;
        }

        .link:hover{
            text-decoration: none;
            color: #5e4119;
        }

        .footer {
            margin-top: 50px;
        }

        .picture {
            width: 100%;
        }

        .files {
            padding: 0 !important;
        }

        .artContainer{
            width: 32.5%;
        }

        .artImage{
            width: 100%;
        }


    </style>
</head>
<body>
    <div id="app">

        <div id="pattern">
            <img src="/images/spattern.png" alt="">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="row">
                        <div class="col-2 d-none d-sm-none d-md-none d-lg-block">
                            <a href="/"><img src="/images/logo.png" alt="Mindanao Art Logo"></a>
                        </div>

                        <div class="col">

                            @Auth
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <span class="navbar-brand mb-0 h1">My Artworks</span>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto text-right">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('artwork.index') }}">Artwork</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Notifications</a>
                                        </li>
                                        @can('administrator')
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Utility
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('component.subject.index') }}">Subject</a>
                                                <a class="dropdown-item" href="{{ route('component.country.index') }}">Country</a>
                                                <a class="dropdown-item" href="{{ route('component.category.index') }}">Category</a>
                                                <a class="dropdown-item" href="{{ route('component.style.index') }}">Style</a>
                                                <a class="dropdown-item" href="{{ route('component.medium.index') }}">Medium</a>
                                                <a class="dropdown-item" href="{{ route('component.material.index') }}">Material</a>
                                                <a class="dropdown-item" href="{{ route('component.size.index') }}">Size</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.index') }}">User Management</a>
                                        </li>
                                        @endcan
                                        </ul>
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{--  {{ Auth::user()->roles()->get()->pluck('name')->first() }}  --}}
                                                    {{ Auth::user()->name }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="nav-link" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                </div>
                                                </li>
                                            </ul>
                                    </div>
                                </nav>
                            @endAuth

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            @include('utility.alert')

                            <main>
                                @yield('content')
                            </main>
                        </div>
                    </div>
                </div>
            </div>

            <p class="footer">Copyright 2020. Mindanao Art</p>
        </div>
    </div>


    <script>
        function showGallery(){
            var x = document.getElementById("categories").value;
            if(x == "Gallery"){
                var y = document.getElementById("gallery");
                y.classList.remove('d-none');
            }
            else {
                var y = document.getElementById("gallery");
                y.classList.add('d-none');
            }
        }
    </script>
</body>
</html>
