@extends('layouts.template')

@section('title') NUEVO @endsection

@section('content')
<!-- begin:: Content Head -->
<div class="k-content__head	k-grid__item">
	<div class="k-content__head-main">
		<h3 class="k-content__head-title">INICIO</h3>
		<div class="k-content__head-breadcrumbs">
			<a href="#" class="k-content__head-breadcrumb-home"><i class="flaticon2-shelter"></i></a>
			<span class="k-content__head-breadcrumb-separator"></span>
			<a href="/estudiante" class="k-content__head-breadcrumb-link" id="changeP">Registros</a>
		</div>
	</div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content Body -->
<div class="k-content__body	k-grid__item k-grid__item--fluid" id="k_content_body">
	<div class="row">
		<div class="col-lg-12 col-xl-4 order-lg-2 order-xl-1">
			<div class="k-portlet k-portlet--tabs k-portlet--height-fluid">
				<div class="k-portlet__head">
					<div class="k-portlet__head-label">
						<h3 class="k-portlet__head-title">
							Registro
						</h3>
					</div>
				</div>
				<div class="k-portlet__body">
					<div class="tab-content">

						<!--begin::Form-->
						<form class="k-form k-form--label-right" {{-- id="k_form_2" --}} action="{{ route('estudiante.store') }}" method="POST" enctype="multipart/form-data" name="registroEstudiante">
							@csrf
							<div class="k-section">
								<div class="k-section__content">
									<div class="k-section">
										<div class="form-group row">
											<div class="col-2 form-group-sub d-xl-none">
												<div class="col-6">
													<div class="k-avatar k-avatar--outline k-avatar--success" id="">
														<div id="">
															<img class="k-avatar__holder" src="" id="avatar" alt="">
														</div>
														<label class="k-avatar__upload" data-toggle="k-tooltip" title="Change avatar" id="fotoClick">
															<i class="fa fa-pen"></i>
														</label>
														<span class="k-avatar__cancel" data-toggle="k-tooltip" title="Cancel avatar">
															<i class="fa fa-times"></i>
														</span>
													</div>
												</div>
											</div>
											<div class="col-lg-5 form-group-sub">
													<label class="form-control-label">* Cédula:</label>
													<input type="text" name="identity" class="form-control" placeholder="" value="">
													<label class="form-control-label">* Nombre:</label>
													<input type="text" name="first_name" class="form-control" placeholder="" value="">
											</div>
											<div class="col-lg-5 form-group-sub">
													<label class="form-control-label">* Apellido:</label>
													<input type="text" name="last_name" class="form-control" placeholder="" value="">
													<label class="form-control-label">* Género:</label>
													<select name="gender" class="form-control">
														<option value="Masculino">Masculino</option>
														<option value="Femenino">Femenino</option>
													</select>
											</div>
										</div>
										<div class="form-group form-group-last row">
											<div class="col-lg-4 form-group-sub">
												<label class="form-control-label">* Correo:</label>
												<input type="text" class="form-control" name="email" placeholder="" value="">
											</div>
											<div class="col-lg-4 form-group-sub">
												<label class="form-control-label">* Teléfono:</label>
												<input type="text" name="phone" class="form-control" placeholder="" value="">
											</div>
											<div class="col-lg-4 form-group-sub">
												<label class="form-control-label">* Carrera:</label>
												<select name="career_id" class="form-control">
													<option value="mm">mm</option>
													<option value="mm">mm</option>
													<option value="mm">mm</option>
												</select>
											</div>
										</div>
										{{-- <div class="form-group form-group-last row">
											<div class="col-lg-12 form-group-sub">
												<label class="form-control-label">* Correo:</label>
												<input type="text" class="form-control" name="billing_city" placeholder="" value="">
											</div>
										</div> --}}
									</div>
								</div>
								<div class="k-separator k-separator--border-dashed k-separator--space-xl"></div>
							</div>
							
								<div class="k-form__actions">
									<div class="row">
										<div class="col-lg-12">
											<button type="button" class="btn btn-accent" id="formSubmit">Guardar</button>
											<button type="reset" class="btn btn-secondary">Cancel</button>
										</div>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="display: none;">
	<img src="{{ asset('img/base/base_EstudianteUNERGTemplate.png') }}" id="base" width="450" height="250">
	<img id="student_photo" width="100" height="100">
	<img src="{{ asset('img/firmas/firma.png') }}" id="firma" width="100" height="100">
	<img src="{{ asset('img/areas_carreras/601.PNG') }}" id="career" width="200" height="50">
	<canvas id="tutorial" width="330" height="215"></canvas>
</div>
@endsection

@section('my_script')
	<script>
		
		var imgForm = '';
		var imgFormBlob = '';

		function draw(imgEstudiante){
			var canvas = document.getElementById('tutorial');

			if (canvas.getContext){
				// OBTENIENDO CONTEXTO
				var ctx = canvas.getContext('2d');
					
				// OBTENIENDO IMG-DOM
				var base = document.getElementById('base');
				var student_photo = document.getElementById('student_photo');
				student_photo.src = imgEstudiante;
				var firma = document.getElementById('firma');
				var career = document.getElementById('career');
				// var qrCode = document.getElementsByTagName('svg')[0];

				// DIBUJANDO IMAGE-CANVAS
				ctx.drawImage(base,0,0,330,215)
				ctx.drawImage(student_photo,10,130,70,80)
				ctx.drawImage(firma,240,120,60,60)
				ctx.drawImage(career,2,85,240,40)
						// ctx.drawImage(qrCode,5,93,280,50)

				// ESCRIBIENDO TITULO
				ctx.font = "bold 12px sans-serif";
				ctx.fillText("AREA DE INGENIERÍA",100,55);
				ctx.fillText("EN SISTEMAS",100,66);

				// ESCRIBIENDO DATOS PERSONALES
				ctx.font = "bold 10px sans-serif";
				ctx.fillText(`${$('input[name="last_name"]').val()}`,86,145);
				ctx.fillText(`${$('input[name="first_name"]').val()}`,85,160);
				ctx.fillText(`C.I.: V-${$('input[name="identity"]').val()}`,85,180);

				// ESCRIBIENDO FECHA DE VENCIMIENTO
				ctx.font = "bold 7px sans-serif";
				ctx.fillText("VENCE: 03/07/2021",85,200);
				ctx.fillText("FIRMA RECTOR",241,120);
				ctx.fillText("JOSÉ L.",255,185);
				ctx.fillText("BERROTERÁN",242,192);
			}
		}

		$(document).ready(function() {
			$('#fotoClick').click(function() {
				window.open('{{ route('webcam.open') }}','Toma la Foto','width=600,height=500, top=85,left=50');
			});

			$('#formSubmit').click(function() {
				// e.preventDefault();
				let form = $('form[name=registroEstudiante]');
				if (imgForm != '' || imgFormBlob != '') {
					
					// dibujar canvas
					draw(imgForm);

					// crear objeto imagen y cargarlo con el canvas
					// var imagenCanvas = document.createElement("img"); 
					var imagenCanvas = document.getElementById('tutorial').toDataURL('image/png');
					
					// console.log(imgForm)
					let formulario =  new FormData(form.get(0));
					formulario.append('photoAvatar',imgForm);
					formulario.append('photoAvatarBlob',imgFormBlob);
					formulario.append('canvas',imagenCanvas);

					$.ajax({
						url: form.attr('action'),
						data: formulario,
						type: 'POST',
						processData: false,  // tell jQuery not to process the data
						contentType: false,   // tell jQuery not to set contentType
						cache: false,
						success: function(resp) {
							console.log(resp)
							Swal.fire({
								title: "¡Felicidades!",
								text: "El Estudiante ha sido Registrado Correctamente",
							});
						},
						error:function(err) {
							console.log(err)
							Swal.fire({
								type: 'error',
								title: 'Oops..',
								text: 'Debe tomar una foto.'
							});
						}
					})
				} else {
					Swal.fire({
						type: 'error',
						title: 'Oops..',
						text: 'Debe tomar una foto.'
					})
				}
			});

			$('button[type=reset]').click(function() {
				imgForm = '';
				$('#avatar').attr('src','');
			});

		});
		// CARGAR A LA VARIABLE 'IMGFORM'
		function cargarFoto(foto, img64) {
			imgForm = foto;
			imgFormBlob = new File([b64toBlob(img64,'image/png')],'namesito');
			document.getElementById('avatar').src = URL.createObjectURL(imgFormBlob);
			// document.getElementById('avatar').src = imgForm;
		}
		// PASAR DE BASE64 A BLOB
		function b64toBlob(b64Data, contentType, sliceSize) {
		  contentType = contentType || '';
		  sliceSize = sliceSize || 512;

		  var byteCharacters = atob(b64Data);
		  var byteArrays = [];

		  for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
		    var slice = byteCharacters.slice(offset, offset + sliceSize);

		    var byteNumbers = new Array(slice.length);
		    for (var i = 0; i < slice.length; i++) {
		      byteNumbers[i] = slice.charCodeAt(i);
		    }

		    var byteArray = new Uint8Array(byteNumbers);

		    byteArrays.push(byteArray);
		  }
		    
		  var blob = new Blob(byteArrays, {type: contentType});
		  return blob;
		}
	</script>
@endsection