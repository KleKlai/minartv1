<!DOCTYPE html>
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
            #app {
                margin-top: 17px;
            }

            .slide {
                width: 100vw;
                height: 100vh;
            }

            .wrapper {
                display: flex;
                flex-direction: row;
                width: 400vw;
                transform: rotate(90deg) translateY(-100vh);
                transform-origin: top right;
                overflow-y: scroll;
                overflow-x: hidden;
            }

            .one {
                background: #efdefe;
            }

            .two {
                background: #a3f3d3;
            }

            .three {
                background: #0bbaa0;
            }

            .four {
                background: #00dfdf;
            }

            .outer-wrapper {
                width: 100vh;
                height: 100vw;
                transform: rotate(-90deg) translateX(-100vh);
                transform-origin: top right;
                overflow-y: scroll;
                overflow-x: hidden;
                position: absolute;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <!-- <landing-component></landing-component> -->

            <div class="outer-wrapper">
                <div class="wrapper">
                    <div class="slide one"></div>
                    <div class="slide two"></div>
                    <div class="slide three"></div>
                    <div class="slide four"></div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</html>
