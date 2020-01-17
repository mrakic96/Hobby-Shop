<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hobby Shop</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ikonastranice.ico') }}"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: floralwhite;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image:url('{{ asset('images/background-image.jpg') }}');
                background-repeat:round;
                background-size:cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 19px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="font-size:15px">Korisnički panel</a>
                    @else
                        <a href="{{ route('login') }}" style="font-size:15px">Prijava</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="font-size:15px">Registracija</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a href="{{ url('/products') }}"><img src="{{ asset('images/hobbylogo.png') }}"style="height:140px; max-width:400px;min-width:200px; width:100%;"></a>
                </div>

                <div class="links">
                    <a href="{{ url('/products') }}">Proizvodi</a>
                    <a href="{{ url('/about') }}">O nama</a>
                </div>
            </div>
        </div>
    </body>
</html>
