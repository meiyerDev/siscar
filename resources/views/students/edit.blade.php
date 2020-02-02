@extends('layouts.templatito')

@section('title') MODIFICAR | {{ $student->identity }} @endsection

@section('body')
			<div class="col-md-12">
				<div class="card shadow">
					<div class="card-header">
						<h3 class="font-weight-bold text-dark">Editar Estudiante</h3>
					</div>

					<div class="card-body">
						<form action="{{ route('estudiante.update',$student->id) }}" enctype="multipart/form-data" name="registroEstudiante">
							@method('PUT')
							@csrf
							<div class="form-group row">
								<div class="col-lg-2 form-group-sub">
									<img src="{{ $student->photo }}" class="img-fluid rounded float-left" alt="Imagen de Perfil" id="avatar">
									<button type="button" id="fotoClick" class="btn btn-sm btn-outline-warning col-sm-12">
										<i class="fa fa-pen"></i> Tomar Foto
									</button>
								</div>
								<div class="col-lg-5 form-group-sub">
									<label class="form-control-label float-left">* Cédula:</label>
									<input type="text" name="identity" class="form-control" placeholder="Ingrese su Cédula" value="{{ $student->identity }}" readonly="">
									<label class="form-control-label float-left">* Nombre:</label>
									<input type="text" name="first_name" class="form-control" placeholder="Ingrese su Nombre" value="{{ $student->first_name }}">
								</div>
								<div class="col-lg-5 form-group-sub">
									<label class="form-control-label float-left">* Apellido:</label>
									<input type="text" name="last_name" class="form-control" placeholder="Ingrese su Apellido" value="{{ $student->last_name }}">
									<label class="form-control-label float-left">* Género:</label>
									<select name="gender" class="form-control" value="{{ $student->gender }}">
										<option value="Masculino" @if($student->gender === 'Masculino') selected="" @endif>Masculino</option>
										<option value="Femenino" @if($student->gender === 'Femenino') selected="" @endif>Femenino</option>
									</select>
								</div>
							</div>
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label float-left">* Correo:</label>
									<input type="text" class="form-control" name="email" placeholder="Ingrese su Correo" value="{{ $student->email }}">
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label float-left">* Teléfono:</label>
									<input type="text" name="phone" class="form-control" placeholder="Ingrese su Teléfono" value="{{ $student->phone }}">
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label float-left">* Carrera:</label>
									<select name="career_id" id="career_ids" class="form-control">
										<option value="">Seleccionar</option>
										@foreach($careers as $career)
										<option value="{{ $career->code.'-'.$career->area }}" @if(!is_null($student->careers()->where('code',$career->code)->first())) selected="" @endif>{{ $career->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button type="button" class="btn btn-outline-primary shadow" id="formSubmit">Actualizar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
<div style="display: none;">
	<img src="{{ asset('img/base/base_EstudianteUNERGTemplate.png') }}" id="base" width="450" height="250">
	<img id="student_photo" width="100" height="100" src="{{ $student->photo }}">
	<img src="{{ asset('img/firmas/firma.png') }}" id="firma" width="100" height="100">
	<img src="{{ asset('img/areas_carreras/601.PNG') }}" id="career" width="200" height="50">
	<canvas id="tutorial" width="330" height="215"></canvas>
</div>
@endsection
@section('my_script')
	<script>
		
		var imgForm = '{{ $student->photo }}';
		var imgFormBlob = '{{ $student->photo }}';
		var title = '';
		var title2 = '';

		function draw(imgEstudiante,title){
			var canvas = document.getElementById('tutorial');

			if (canvas.getContext){
				// OBTENIENDO CONTEXTO
				var ctx = canvas.getContext('2d');
					
				// OBTENIENDO IMG-DOM
				var base = document.getElementById('base');
				var student_photo = document.getElementById('student_photo');
				// student_photo.src = imgEstudiante;
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
				ctx.font = "bold 8px sans-serif";
				ctx.fillText(`ÁREA DE ${title}`,100,55);
				ctx.fillText(`${title2}`,100,66);

				// ESCRIBIENDO DATOS PERSONALES
				ctx.font = "bold 10px sans-serif";
				ctx.fillText(`${$('input[name="last_name"]').val()}`,86,145);
				ctx.fillText(`${$('input[name="first_name"]').val()}`,85,160);
				ctx.fillText(`C.I.: V-${$('input[name="identity"]').val()}`,85,180);
				
				// ESCRIBIENDO FECHA DE VENCIMIENTO
				let d = new Date()
				ctx.font = "bold 7px sans-serif";
				ctx.fillText(`VENCE: ${d.getDate()}-${d.getMonth()+1}-${d.getFullYear()+2} - EMISIÓN: ${d.getDate()}-${d.getMonth()+1}-${d.getFullYear()}`,85,200);
				ctx.fillText("FIRMA RECTOR",241,120);
				ctx.fillText("JOSÉ L.",255,185);
				ctx.fillText("BERROTERÁN",242,192);
			}
		}
		
		const tituloDeCarrera = (cod,titulo) => {
			if(titulo.split(' ').length > 1) {
				titulo = titulo.split(' ');
				let cant = titulo.length / 2;
				if(cant === 2){
					title = `${titulo[0]} ${titulo[1]}`;
					title2 = `${titulo[2]} ${titulo[3]}`;
				}else if(cant === 1.5){
					title = `${titulo[0]} ${titulo[1]}`;
					title2 = `${titulo[2]}`;
				}else{
					title = `${titulo[0]}`;
					title2 = `${titulo[1]}`
				}
			}
			$('#career').attr('src',`http://${window.location.host}/img/areas_carreras/${cod}.PNG`)
		}

		$(document).ready(function() {
			$('#career_ids').change(function() {
				let cod = $(this).val().split('-')[0];
				let titulo = $(this).val().split('-')[1];
				tituloDeCarrera(cod,titulo)
			});

			$('#fotoClick').click(function() {
				window.open('{{ route('webcam.open') }}','Toma la Foto','width=600,height=500, top=85,left=50');
			});

			$('#formSubmit').click(function() {
				// e.preventDefault();
				let form = $('form[name=registroEstudiante]');
				if (imgForm != '' || imgFormBlob != '') {
					let cod = $('#career_ids').val().split('-')[0];
					let titulo = $('#career_ids').val().split('-')[1];
					tituloDeCarrera(cod,titulo)
					
					// dibujar canvas
					draw(imgForm,title);

					// crear objeto imagen y cargarlo con el canvas
					// var imagenCanvas = document.createElement("img"); 
					var imagenCanvas = document.getElementById('tutorial').toDataURL('image/png');
					
					// console.log(imgForm)
					let formulario =  new FormData(form.get(0));
					formulario.append('photo',imgForm);
					formulario.append('photo_license_2',imagenCanvas);

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
								text: "El Estudiante ha sido Modificado Correctamente",
		                        imageUrl: resp,
		                        imageWidth: 300,
		                        imageHeight: 190,
		                        imageAlt: 'Carnet',
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
			document.getElementById('student_photo').src = imgForm;
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