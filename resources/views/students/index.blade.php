@extends('layouts.templatito')
@section('title') LISTADO @endsection

@section('body')
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
												<td>{{ $student->careers->first()->name }}</td>
												<td>
													<button type="button" class="btn btn-sm btn-primary btn-modal-info" data-info="{{ $student->id }}" title="Mostrar Información"><i class="fa fa-eye"></i></button>
													
													<button type="button" class="btn btn-sm btn-info btn-modal-foto" data-info="{{ $student->identity }}" title="Mostrar Foto"><i class="fa fa-camera"></i></button>
													
													<button type="button" class="btn btn-sm btn-warning btn-modal-carnet" data-info="{{ $student->identity }}" title="Mostrar Carnet"><i class="fa fa-address-card"></i></button>

													<button type="button" class="btn btn-sm btn-danger btn-modal-eliminar" data-info="{{ $student->id }}" title="Eliminar Estudiante"><i class="fa fa-trash"></i></button>
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
				<!--Modal: View Photo Student-->
				<div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				  aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <img id="imgModalStudent" class="img-responsive mx-auto d-block w-75" alt="">
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!--Modal: View Photo Student-->

				<!--Modal: View Photo Student-->
				<div class="modal fade" id="modalInfoEstudiante" tabindex="-1" role="dialog" aria-labelledby="modalInfoEstudianteLabel"
				  aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Información de Estudiante</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<div class="form-group row">
									<div class="col-sm-6 col-md-4 form-group-sub">
										<img src="{{ asset('img/recursos/avatar.png') }}" class="img-fluid rounded float-left" alt="Algo Salió mal." id="avatar">
									</div>
									<div class="col-md-4 form-group-sub">
										<label class="form-control-label float-left">* Cédula:</label>
										<input type="text" readonly="" name="identity" class="form-control">
										<label class="form-control-label float-left">* Nombre:</label>
										<input type="text" readonly="" name="first_name" class="form-control">
									</div>
									<div class="col-md-4 form-group-sub">
										<label class="form-control-label float-left">* Apellido:</label>
										<input type="text" readonly="" name="last_name" class="form-control">
										<label class="form-control-label float-left">* Género:</label>
										<input type="text" readonly="" name="gender" class="form-control">
									</div>
								</div>
								<div class="form-group form-group-last row">
									<div class="col-md-7 form-group-sub">
										<label class="form-control-label float-left">* Correo:</label>
										<input type="text" readonly="" class="form-control" name="email">
									</div>
									<div class="col-md-5 form-group-sub">
										<label class="form-control-label float-left">* Teléfono:</label>
										<input type="text" readonly="" name="phone" class="form-control">
									</div>
								</div>
				      </div>
				      <div class="modal-footer">
				      	<a href="#" class="btn btn-outline-primary" id="btn-editar">Editar</a>
				        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!--Modal: View Photo Student-->

				<!--Modal: Delete Student-->
				<div class="modal fade" id="modalDeleteEstudiante" tabindex="-1" role="dialog" aria-labelledby="modalDeleteEstudianteLabel"
				  aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="modalDeleteEstudianteLabel">¿Está Seguro de Eliminar Este Estudiante?</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<p class="modal-text text-center text-danger">Si Elimina este Estudiante <span class="font-weight-bold">No podrá Recuperar su Información</span> y el mismo <span class="font-weight-bold">No podrá volver a Solicitar su Carnet</span>.</p>
				      </div>
				      <div class="modal-footer">
				      	<form method="POST" name="eliminarEstudiante">
				      		@method('DELETE')
				      		@csrf
				      		<button type="submit" class="btn btn-danger" id="eliminar">Confirmar</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				        </form>
				      </div>
				    </div>
				  </div>
				</div>
				<!--Modal: Delete Student-->

@endsection
				
@section('my_script')
	<script>
		$(document).ready(function() {
			$('.btn-modal-info').click(function() {
				urlAjax = `/estudiante/editar/${$(this).data('info')}`;
				$.ajax({
					url: urlAjax,
					method: 'GET'
				})
				.done(respuesta=>{
					console.log(respuesta);
					$('#avatar').attr('src',respuesta.photo);
					$('input[name="identity"]').val(respuesta.identity);
					$('input[name="first_name"]').val(respuesta.first_name);
					$('input[name="last_name"]').val(respuesta.last_name);
					$('input[name="gender"]').val(respuesta.gender);
					$('input[name="email"]').val(respuesta.email);
					$('input[name="phone"]').val(respuesta.phone);
					$('#btn-editar').attr('href',`/estudiante/editar/${$(this).data('info')}`)
					$('#modalInfoEstudiante').modal('toggle');
				})
				.fail(error=>{
					console.log(error);
				})
			});
			$('.btn-modal-foto').click(function() {
				urlAjax = `/estudiante/foto/${$(this).data('info')}`;
				$.ajax({
					url: urlAjax,
					method: 'GET'
				})
				.done(function(respuesta) {
					// console.log();
					$('#imgModalStudent')
						.attr('src',respuesta.photo)
						.parent()
						.parent()
						.children('.modal-header')
						.children('h5')
						.html(`${respuesta.first_name} ${respuesta.last_name}`);
					$('#modalLRFormDemo').modal('toggle');
				})
				.fail(function(error) {
					console.log(error);
				});
			});
			$('.btn-modal-carnet').click(function() {
				urlAjax = `/estudiante/${$(this).data('info')}/edit`;
				$.ajax({
					url: urlAjax,
					method: 'GET'
				})
				.done(function(respuesta) {
					// console.log();
					$('#imgModalStudent')
						.attr('src',respuesta.photo_license_2)
						.parent()
						.parent()
						.children('.modal-header')
						.children('h5')
						.html(`${respuesta.first_name} ${respuesta.last_name}`);
					$('#modalLRFormDemo').modal('toggle');
				})
				.fail(function(error) {
					console.log(error);
				});
			});
			$('.btn-modal-eliminar').click(function() {
				$('form[name="eliminarEstudiante"]').attr('action',`/estudiante/${$(this).data('info')}`);
				$('#modalDeleteEstudiante').modal('toggle');
			});
		});
	</script>
@endsection