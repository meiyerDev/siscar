<table class="table table-sm table-striped table-bordered">
	<!-- Table head -->
	<thead class="thead-dark">
		<tr>
			<th>#</th>
			<th>CÉDULA</th>
			<th>NOMBRE</th>
			<th>APELLIDO</th>
			<th>CARRERA</th>
			<th>CREADO</th>
			<th>ACTUALIZADO</th>

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
			<td>
				@foreach($student->careers as $career)
					{{ $career->name }},
				@endforeach
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		@endforeach
	</tbody>
	<!-- Table body -->
</table>