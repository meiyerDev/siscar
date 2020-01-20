<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>HOLA | Tomar foto</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<style>
		@media only screen and (max-width: 700px) {
			video {
				max-width: 100%;
			}
		}
	</style>

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
	<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="row justify-content-center">
		<select name="listaDeDispositivos" id="listaDeDispositivos" class="form-control col-sm-12"></select>
		<button id="boton" class="btn btn-sm btn-primary col-sm-12 text-uppercase">Tomar foto</button>
		<p id="estado"></p>
	</div>
	<video muted="muted" id="video"></video>

	<canvas id="canvas" style="display: none;"></canvas>
	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/foto.js') }}"></script>
</body>
</html>