<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('images/hobbylogo.png') }}"style="height:50px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h6 class="dropdown-header">Options</h6>
                                    @can('manage-products')
                                    <a class="dropdown-item" href="{{ route('adminpanel.products.index') }}" target="_blank">
                                        Admin panel
                                    </a>
                                    @endcan
                                    @can('manage-users')
                                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                            User Management
                                        </a>
                                    @endcan
                                    @can('manage-products')
                                    <a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                        Category Management
                                    </a>
                                    @endcan
                                    @can('manage-products')
                                    <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                        Product Management
                                    </a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
            <div class="container">
            @include('partials.alerts')
            @yield('content')
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
              <h2 class="ftco-heading-2">Hobby Shop</h2>
              <p>Neki opis trgovine i dodatne informacije o trgovini</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Izbornik</h2>
              <ul class="list-unstyled">
                <li><a href="{{ url('/products') }}" class="py-2 d-block">Trgovina</a></li>
                <li><a href="#" class="py-2 d-block">Košarica</a></li>
                <li><a href="{{ url('/about') }}" class="py-2 d-block">O nama</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Dodatno</h2>
              <div class="d-flex">
                  <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                    <li><a href="{{ asset('download/vizija.docx') }}" download class="py-2 d-block">Vizija projekta</a></li>
                    <li><a href="https://github.com/mrakic96/Hobby-Shop" target="_blank" class="py-2 d-block">Github repozitorij</a></li>
                    
                  </ul>           
              </div>
                    <a href="https://github.com/mrakic96/Hobby-Shop" target="_blank"><i class="fab fa-github"style='font-size:35px;margin-left:38px;margin-top:40px;'></i></a>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Kontakt</h2>
                <div class="block-23 mb-3">
<ul class="fa-ul">
  <li><span class="fa-li"><i class="fa fa-phone"style='font-size:15px'></i></span>+000 111 222</li>
  <li><span class="fa-li"><i class="fas fa-home"style='font-size:15px'></i></span>FSRE Mostar</li>
  <li><span class="fa-li"><i class="fas fa-envelope"style='font-size:15px'></i></span>aviskic@gmail.com</li>
  <li><span class="fa-li"><i class="fas fa-envelope"style='font-size:15px'></i></span>matej.rakic96@gmail.com</li>
</ul>
                </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
