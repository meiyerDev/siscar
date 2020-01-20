@extends('layouts.templatito')

@section('title') USUARIOS @endsection

@section('body')
		<div class="col-md-12">
			<div class="card">
				<div class="card-header d-flex">
					<h3 class="font-weight-bold text-dark col-sm-10 col-md-11">Listado de Registros</h3>
					<button type="button" class="btn btn-sm btn-primary btn-nuevo col-sm-2 col-md-1">Agregar</button>
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
									<th>Nombre</th>
									<th>Correo Electrónico</th>
									<th>Cant. Registros</th>
									<th>Cant. Modificados</th>
									<th>Acción</th>
								</tr>
							</thead>
							<!-- Table head -->

							<!-- Table body -->
							<tbody>
								@foreach($users as $index => $user)
								<tr>
									<th> {{ $index+1 }} </th>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ count($user->binnacles->where('type',2)) }}</td>
									<td>{{ count($user->binnacles->where('type',3)) }}</td>
									<td>
										<button class="btn btn-sm btn-warning btn-edit" data-info="{{ $user->id }}"><i class="fa fa-edit"></i></button>
										<button class="btn btn-sm btn-danger btn-delete" data-info="{{ $user->id }}"><i class="fa fa-trash"></i></button>
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

		<!--Modal: New User-->
		<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="modalNuevoUsuarioLabel"
				  aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Registro de Usuario</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form action="{{ route('usuario.new') }}" method="POST">
				      	@csrf
					      <div class="modal-body">
					      	<div class="form-group row justify-content-center">
										<div class="col-md-10 form-group-sub">
											<label class="form-control-label float-left">* Nombre:</label>
											<input type="text" name="uname" class="form-control">
										</div>
										<div class="col-md-10 form-group-sub">
											<label class="form-control-label float-left">* Correo:</label>
											<input type="text" class="form-control" name="uemail">
										</div>
										<div class="col-md-10 form-group-sub">
											<label class="form-control-label float-left">* Contraseña:</label>
											<input type="password" class="form-control pass" name="password">
										</div>
										<div class="col-md-10 form-group-sub">
											<label class="form-control-label float-left">* Confirmar Contraseña:</label>
											<input type="password" class="form-control pass" name="password_confirm">
										</div>
									</div>
					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-outline-primary" id="btn-crear">Crear</button>
					        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
					      </div>
				      </form>
				    </div>
				  </div>
				</div>
		<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuarioLabel"
				  aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modificación de Usuario</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form action="" method="POST" name="form_user">
				      	@method('PUT')
				      	@csrf
					      <div class="modal-body">
					      	<div class="form-group row justify-content-center">
										<div class="col-md-10 form-group-sub">
											<label class="form-control-label float-left">* Nombre:</label>
											<input type="text" name="name" class="form-control">
										</div>
										<div class="col-md-10 form-group-sub">
											<label class="form-control-label float-left">* Correo:</label>
											<input type="text" class="form-control" name="email">
										</div>
									</div>
					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-outline-primary" id="btn-editar">Actualizar</button>
					        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
					      </div>
				      </form>
				    </div>
				  </div>
				</div>
		<!--Modal: New User-->
		<!--Modal: Delete Student-->
		<div class="modal fade" id="modalDeleteUsuario" tabindex="-1" role="dialog" aria-labelledby="modalDeleteUsuarioLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalDeleteEstudianteLabel">¿Está Seguro de Eliminar Este Usuario?</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p class="modal-text text-center text-danger">Si Elimina este Usuario <span class="font-weight-bold">No podrá Recuperar su Información</span> y el mismo <span class="font-weight-bold">No podrá volver a Iniciar Sesión</span>.</p>
		      </div>
		      <div class="modal-footer">
		      	<form method="POST" name="eliminarUsuario">
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
		$(document).ready(function(){
			$('.btn-nuevo').click(()=>{
				$('#modalNuevoUsuario').modal('toggle');
			});
			$('.btn-edit').click(function(){
				$.ajax({
					method: 'GET',
					url: `/admin/usuarios/editar/${$(this).data('info')}`
				})
				.done(respuesta=>{
					$('form[name="form_user"]').attr('action',`/admin/usuarios/actualizar/${$(this).data('info')}`)
					$('input[name="name"]').val(respuesta.name);
					$('input[name="email"]').val(respuesta.email);
					$('#modalEditarUsuario').modal('toggle');
				})
				.fail(error=>{
					console.log(error);
				});
			});
			$('.pass').change(()=>{
				let pass1 = $('input[name="password"]').val();
				let pass2 = $('input[name="password_confirm"]').val();
				(pass1 === pass2) ? $('#btn-crear').removeAttr('disabled') : $('#btn-crear').attr('disabled',true);
				(pass1 === pass2) ? $('#btn-editar').removeAttr('disabled') : $('#btn-editar').attr('disabled',true);
			});
			$('.btn-delete').click(function(){
				url = `/admin/usuarios/eliminar/${$(this).data('info')}`
				$('form[name="eliminarUsuario"]').attr('action',url);
				$('#modalDeleteUsuario').modal('toggle');
			});
		});
	</script>
@endsection