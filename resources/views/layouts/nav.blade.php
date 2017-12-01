<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<title>Lauren</title>
</head>
<body>
	<nav class="navbar navbar-default" style="background-color: #FFD700; height: 4em;">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{route('home')}}">Lauren</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{route("gallery", ['catagory'=>"Pictures"])}}">Pictures</a></li>
				<li><a href="{{route("gallery", ['catagory'=>"Graphic Design"])}}">Graphic Design</a></li>
				<li><a href="{{route("gallery", ['catagory'=>"3D"])}}">3D</a></li>
				<li><a href="{{route("gallery", ['catagory'=>"Paintings"])}}">Paintings</a></li>
				<li><a href="{{route("gallery", ['catagory'=>"Drawing"])}}">Drawing</a></li>
			</ul>
			@if (Route::has('login'))
	            <ul class="nav navbar-nav navbar-right">
	                @auth
	                	<li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
	                @else
	                    <li><a href="{{ route('login') }}">Login</a></li>
	                    <li><a href="{{ route('register') }}">Register</a></li>
	                @endauth
	            </ul>
	        @endif
		</div>
	</nav>

	<div class="container">
		@yield('body')
	</div>
	<footer class="container-fluid">

	</footer>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>