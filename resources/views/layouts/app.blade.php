<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mindanao Art') }} @yield('title')</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/nav.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/submit.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link
    href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    rel="stylesheet"
    />

    <!-- MDB -->
    <!-- <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0-alpha4/mdb.min.css"
    rel="stylesheet"
    /> -->

    <!-- Datatables -->
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

        .loading {
            display: none;
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

        .navbar {
            box-shadow: none !important;
        }

        .nav-link {
            font-size: 12px;
            color: black;
        }

        .nav-link:hover{
            text-decoration: none;
            color: #b78032 !important;
        }

        .active {
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

    </style>
</head>
<body>
    <div id="app">

        <div id="pattern">
            <img src="/images/spattern.png" alt="">
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                    @Auth
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('images/nav.png') }}" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                                </a>

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
                                        <a class="nav-link" href="{{ route('notification.view') }}">
                                            Notifications
                                            @if(auth()->user()->unreadNotifications->count() != 0)
                                                <span class="badge badge-success">{{ auth()->user()->unreadNotifications->count() }}</span>
                                            @endif
                                        </a>
                                    </li>
                                    @can('administrator')
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Utility
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('component.subject.index') }}">Subject</a>
                                                <a class="dropdown-item" href="{{ route('component.category.index') }}">Category</a>
                                                <a class="dropdown-item" href="{{ route('component.style.index') }}">Style</a>
                                                <a class="dropdown-item" href="{{ route('component.medium.index') }}">Medium</a>
                                                <a class="dropdown-item" href="{{ route('component.material.index') }}">Material</a>
                                                <a class="dropdown-item" href="{{ route('component.size.index') }}">Size</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="userManagementDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                User Management
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="userManagementDropDown">
                                                <a class="dropdown-item" href="{{ route('user.index') }}">{{ "User's" }}</a>
                                                <a class="dropdown-item" href="{{ route('users.trash') }}">Trash</a>
                                            </div>
                                        </li>
                                        {{--  <li class="nav-item">
                                            <a class="nav-link" href="{{ route('faq.index') }}">FAQ</a>
                                        </li>  --}}
                                    @endcan
                                </ul>

                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('password.index') }}">
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
            <div class="container"><p class="footer">Copyright 2020. Mindanao Art</p></div>
        </div>
    </div>

    <script>
        function showOtherDropDown(){
            var x = document.getElementById("categories").value;
            if(x == "Gallery"){
                document.getElementById("gallery").classList.remove('d-none');
                document.getElementById("specialProjects").classList.add('d-none');
                document.getElementById("regionalGroup").classList.add('d-none');
            }
            else if(x == "Special Projects"){
                document.getElementById("specialProjects").classList.remove('d-none');
                document.getElementById("gallery").classList.add('d-none');
                document.getElementById("regionalGroup").classList.add('d-none');
            }
            else if(x == "Regional Group"){
                document.getElementById("regionalGroup").classList.remove('d-none');
                document.getElementById("gallery").classList.add('d-none');
                document.getElementById("specialProjects").classList.add('d-none');
            }
            else {
                document.getElementById("gallery").classList.add('d-none');
                document.getElementById("specialProjects").classList.add('d-none');
                document.getElementById("regionalGroup").classList.add('d-none');
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageView')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>


    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    @yield('javascript')

</body>
</html>
