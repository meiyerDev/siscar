@extends('layouts.templatito')

@section('title') ESTADÍSTICAS @endsection

@section('body')
		<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="font-weight-bold text-dark">Estadisticas del Sistema</h3>
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
											<th>Carrera</th>
											<th>Cant. Estudiantes</th>
											<th>Cant. Carnet</th>
										</tr>
									</thead>
									<!-- Table head -->

									<!-- Table body -->
									<tbody>
										@foreach($careers as $index => $career)
										<tr>
											<td>{{ $index+1 }}</td>
											<td>{{ $career->name }}</td>
											<td class="{{ $career->students->count() ?'text-success':'text-danger' }}">{{ $career->students->count() ?:'Sin Registro' }}</td>
											<td class="{{ $career->licenses->count() ?'text-success':'text-danger' }}">{{ $career->licenses->count() ?:'Sin Registro' }}</td>
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
@endsection