@extends('layouts.templatito')

@section('title') REPORTES @endsection

@section('body')
		<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="font-weight-bold text-dark">Estadisticas del Sistema</h3>
						</div>

						<!--Card content-->
						<div class="card-body">
							<form action="{{ route('report.download') }}" method="POST">
								@csrf
								<div class="form-group row">
									<div class="col-sm-12 col-md-6">
										<select name="type_report" id="type_report" class="form-control">
											<option value="1">Estudiantes Registrados</option>
											<option value="2">Estudiantes Registrados por Carrera</option>
											<option value="3">Estudiantes Registrados en Carrera</option>
											<option value="4">Carnets Solicitados por Carrera</option>
											<option value="5">Carnets Solicitados en Carrera</option>
											<option value="6">Cantidad de Estudiantes por Carrera</option>
										</select>
									</div>
									<div class="col-sm-12 col-md-6">
										<select name="career_id" class="form-control" id="career">
											@foreach($careers as $career)
												<option value="{{ $career->code }}">{{ $career->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-sm-12 mt-4">
										<button type="submit" class="btn btn-sm btn-outline-primary col-sm-12 col-md-4">DESCARGAR</button>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
@endsection

@section('my_script')
	<script>
		$(document).ready(()=>{
			if($('#type_report').val() == '3' || $('#type_report').val() == '5'){
				$('#career').removeAttr('disabled');
			}else{
				$('#career').attr('disabled',true);
			}
			$('#type_report').change(()=>{
				if($('#type_report').val() == '3' || $('#type_report').val() == '5'){
					$('#career').removeAttr('disabled');
				}else{
					$('#career').attr('disabled',true);
				}
			});
		});
	</script>
@endsection