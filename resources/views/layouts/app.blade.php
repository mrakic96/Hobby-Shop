<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .preloader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-image: url('{{ asset('images/preloader3.gif') }}');
            background-repeat: no-repeat; 
            background-color: #F8F5F0;
            background-position: center;
            }  
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ikonastranice.ico') }}"/>
	<!-- Jquery and other for search -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hobby Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
	$(window).load(function() {
        $('.preloader').fadeOut('slow');
    });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('images/hobbylogo.png') }}"style="height:50px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
				<!-- search -->
<form action="{{route('search')}}" methog="GET" class="search-form">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" name="query" id="query" style="border-radius:8px 0px 0px 8px;" value="{{ request()-> input('query')}}" class="form-control" placeholder="Pretraga">
                    <a href="{{route('search')}}"><button class="btn btn-outline-secondary float-right" style="height:35px; border-left:0px; border-radius:0px 8px 8px 0px; border-color:#ced4da" value="{{ request()-> input('query')}}"><i class="fas fa-search" style="color:#ced4da"></i></button></a>
                </div>
            </div>    
        </div>
    </div>  
</div>
</form>
				<!-- search -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            {{-- @can('only-logged-user-see') --}}
                            <li class="nav-item" style="width:180px;">
                            <a class="nav-link" style="font-size:14px; margin-right:50px;" href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i> {{ __('Košarica') }} <span class="badge badge-secondary float-right">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
                            </li>
                            {{-- @endcan --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="font-size:14px;" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size:14px;" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="font-size:14px;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h5 style="font-size:16px;" class="dropdown-header">Opcije</h5>
                                    <hr style="margin:0px 15px 0px 15px;">
                                    @can('manage-products')
                                    <a class="dropdown-item" href="{{ route('adminpanel.products.index') }}" target="_blank">
                                        Admin panel
                                    </a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('products') }}">
                                       Trgovina
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}">
                                        Korisnički profil
                                     </a>
                                    <hr style="margin:0px 15px 0px 15px;">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odjava') }}
                                    </a>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container" style="margin-top:75px !important;">
            @include('partials.alerts')
            @yield('content')
            @yield('scripts')
            </div>
        </main>
    </div>
    <br>
    <br>
    <br>
    <footer class="ftco-footer bg-white ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h3 class="ftco-heading-2">Hobby Shop</h3>
              <p>Neki opis trgovine i dodatne informacije o trgovini</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h3 class="ftco-heading-2">Izbornik</h3>
              <ul class="list-unstyled">
                <li><a href="{{ url('/products') }}" class="py-2 d-block text-muted">Trgovina</a></li>
                <li><a href="#" class="py-2 d-block text-muted">Košarica</a></li>
                <li><a href="{{ url('/about') }}" class="py-2 d-block text-muted">O nama</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h3 class="ftco-heading-2">Dodatno</h3>
              <div class="d-flex">
                  <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                    <li><a href="{{ asset('download/Vizija.pdf') }}" download class="py-2 d-block text-muted">Vizija projekta</a></li>
                    <li><a href="https://github.com/mrakic96/Hobby-Shop" target="_blank" class="py-2 d-block text-muted">Github repozitorij</a></li>
                    
                  </ul>           
              </div>
                    <a class="text-primary" href="https://github.com/mrakic96/Hobby-Shop" target="_blank"><i class="fab fa-github"style='font-size:35px;margin-left:38px;margin-top:40px;'></i></a>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h3 class="ftco-heading-2">Kontakt</h3>
                <div class="block-23 mb-3">
<ul class="fa-ul">
  <li><span class="fa-li"><i class="fa fa-phone text-primary"style='font-size:15px'></i></span>+000 111 222</li>
  <li><span class="fa-li"><i class="fas fa-home text-primary"style='font-size:15px'></i></span>FSRE Mostar</li>
  <li><span class="fa-li"><i class="fas fa-envelope text-primary"style='font-size:15px'></i></span>aviskic@gmail.com</li>
  <li><span class="fa-li"><i class="fas fa-envelope text-primary"style='font-size:15px'></i></span>matej.rakic96@gmail.com</li>
</ul>
                </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
