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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <style>
        * {
            font-family: 'Montserrat';
        }
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

        .nav-link {
            font-size: 12px;
            color: black;
        }

        .nav-link:hover{
            text-decoration: none;
            color: #b78032 !important;
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

        #columns {
            column-width: 320px;
            column-gap: 15px;
            width: 90%;
            max-width: 1100px;
            margin: 50px auto;
        }

        div#columns figure {
            background: #fefefe;
            border: 2px solid #fcfcfc;
            box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
            margin: 0 2px 15px;
            padding: 15px;
            padding-bottom: 10px;
            transition: opacity .4s ease-in-out;
            display: inline-block;
            column-break-inside: avoid;
        }

        div#columns figure img {
            width: 100%; height: auto;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
            margin-bottom: 5px;
        }

        div#columns figure figcaption {
            font-size: .9rem;
            color: #444;
            line-height: 1.5;
        }

        div#columns small {
            font-size: 1rem;
            float: right;
            text-transform: uppercase;
            color: #aaa;
        }

        div#columns small a {
            color: #666;
            text-decoration: none;
            transition: .4s color;
        }

        div#columns:hover figure:not(:hover) {
            opacity: 0.4;
        }

        @media screen and (max-width: 750px) {
            #columns { column-gap: 0px; }
            #columns figure { width: 100%; }
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
                                    <span class="navbar-brand mb-0 h1">Artworks</span>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse " id="navbarSupportedContent">

                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('artwork.index') }}">Artwork</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('view.notification') }}">
                                                    Notifications<span class="badge badge-light">4</span>
                                                </a>
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
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{--  {{ Auth::user()->roles()->get()->pluck('name')->first() }}  --}}
                                                    {{ Auth::user()->name }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item" href="#changepass" data-toggle="modal" data-target="#changePassword">
                                                        Change Password
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

    <!-- Modal -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <form method="POST" action="{{ route('change.password') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Confirm Password</label>
                            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-decoration-none" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                </form>
            </div>
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
    <script>
        $('.mydatatable').DataTable();
    </script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>