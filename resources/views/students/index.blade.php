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
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!--Modal: View Photo Student-->

@endsection
				
@section('my_script')
	<script>
		$(document).ready(function() {
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
		});
	</script>
@endsection