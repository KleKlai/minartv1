<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
    <!-- <div class="container">
        <div class="row">
            <div class="col-md">
            </div>
            <div class="col-md">
                <h1>404</h1>
                <h3>We cannot find the page you are looking for.</h3>
                <button>Back Home</button>
            </div>   
        </div>
    </div> -->

    <section class="page_404">
        <div class="container">
            <div class="row">   
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1>404</h1>
                        </div>
                        
                        <img src="{{ asset('images/assets/page_not_found.svg') }}" alt="No Result Found" width="300" class="mx-auto d-block">
                        
                        <div class="contant_box_404">
                            <h3 class="h2">
                            We cannot find the artwork!
                            </h3>
                            <p>you can go back to home for now.</p>
                            <button class="btn-primary">Go to Home</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>


