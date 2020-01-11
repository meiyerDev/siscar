<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
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
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('estudiante.index') }}">Listado de Estudiantes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('estudiante.create') }}">Nuevo Estudiante</a>
      </li>
    </ul>
    <div class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
  </div>
</nav>
	<div id="page-content">
		<div class="container text-center mt-5">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="font-weight-bold text-dark">Listado de Registros</h3>
						</div>

						<!--Card content-->
						<div class="card-body">
							<div class="table-responsive">
								<!-- Table  -->
								<table class="table table-sm table-hover">
									<!-- Table head -->
									<thead class="thead-dark">
										<tr>
											<th>#</th>
											<th>Cédula</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Carrera</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<!-- Table head -->

									<!-- Table body -->
									<tbody>
										@foreach ($students as $index => $student)
											<tr>
												<th scope="row">{{ $index + 1 }}</th>
												<td>{{ $student->identity }}</td>
												<td>{{ $student->first_name }}</td>
												<td>{{ $student->last_name }}</td>
												<td>Prueba</td>
												<td>
													<button type="button" class="btn btn-sm btn-info btn-modal-foto" data-info="{{ $student->identity }}"><i class="far fa-eye"></i> Foto</button>
													<button type="button" class="btn btn-sm btn-info btn-modal-carnet" data-info="{{ $student->identity }}"><i class="far fa-eye"></i> carnet</button>
												</td>
											</tr>
										@endforeach
									</tbody>
									<!-- Table body -->
								</table>
								<!-- Table  -->
							</div>
						</div>

					</div>
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
<script type="text/javascript" src="{{ asset('asset/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('asset/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
</html>