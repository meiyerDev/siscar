<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
	<style>
		/* Sticky Footer Classes */
		html,
		body {
			height: 100%;
		}
		#page-content {
			flex: 1 0 auto;
		}
		#sticky-footer {
			flex-shrink: none;
		}

		/* Other Classes for Page Styling */
		body {
			background:  #d7dbdd;
			background: linear-gradient(to right, #e5e7e9,  #f8f9f9);
		}
	</style>
</head>
<body class="d-flex flex-column">
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary shadow">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand mb-0 h1" href="{{ route('home') }}">SisCar</a>
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item @guest @else active @endguest ">
					<a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
				</li>
				@guest
				<li class="nav-item">
					<a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
                @else
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('estudiante.index') }}">Listado de Estudiantes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('estudiante.create') }}">Nuevo Estudiante</a>
				</li>
				@if(\Auth::user()->is_admin())
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('usuario.bitacora') }}">Bitácora</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('usuario.all') }}">Gestión de Usuarios</a>
				</li>
				@endif
			</ul>
			<div class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ \Auth::user()->name }}
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">Cerrar Sesión</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
						@csrf
					</form>
				</div>
			</div>
			@endguest
		</div>
	</nav>
	<div id="page-content">
		<div class="container text-center mt-4 mb-4">
			<div class="row justify-content-center">
				@yield('body')
			</div>
		</div>
	</div>
</div>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
	<div class="container text-center">
		<small>Copyright &copy; Loriana Machado</small>
	</div>
</footer>

</body>
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
{{-- OTROS RECURSOS --}}
<script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
@yield('my_script')
</html>
