
<!DOCTYPE html>
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/adminpanellogo.ico') }}" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link href="{{ asset('css/adminpanel/animate.css') }}" rel="stylesheet">
	<!-- Icomoon Icon Fonts-->
	<link href="{{ asset('css/adminpanel/icomoon.css') }}" rel="stylesheet">
	<!-- Bootstrap  -->
	<link href="{{ asset('css/adminpanel/bootstrap.css') }}" rel="stylesheet">
	<!-- Flexslider  -->
	<link href="{{ asset('css/adminpanel/flexslider.css') }}" rel="stylesheet">
	<!-- Theme style  -->
	<link href="{{ asset('css/adminpanel/style.css') }}" rel="stylesheet">

	<!-- Modernizr JS -->
	<script src="{{ asset('js/adminpanel/modernizr-2.6.2.min.js') }}" defer></script>

	</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="{{ route('adminpanel.users.index') }}"><img src="{{ asset('images/adminpanellogo.png') }}"style="height:100px;"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="{{ route('adminpanel.users.index') }}">Korisnici</a></li>
					<li><a href="{{ route('adminpanel.products.index') }}">Proizvodi</a></li>
					<li><a href="{{ route('adminpanel.categories.index') }}">Kategorije</a></li>
					<li><a href="{{ route('welcome') }}" target="_blank">Hobby Shop</a></li>
					<hr>
					<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odjava') }}
						</a>
					</li>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
				</ul>
			</nav>
		</aside>	
	</div>

    <main class="py-4">
        <div class="container">
            @include('partials.alerts')
            @yield('content')
        </div>
    </main>
	<!-- jQuery -->
	<script src="{{ asset('js/adminpanel/jquery.min.js') }}" defer></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('js/adminpanel/jquery.easing.1.3.js') }}" defer></script>
	<!-- Bootstrap -->
	<script src="{{ asset('js/adminpanel/bootstrap.min.js') }}" defer></script>
	<!-- Waypoints -->
	<script src="{{ asset('js/adminpanel/jquery.waypoints.min.js') }}" defer></script>
	<!-- Flexslider -->
	<script src="{{ asset('js/adminpanel/jquery.flexslider-min.js') }}" defer></script>
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

