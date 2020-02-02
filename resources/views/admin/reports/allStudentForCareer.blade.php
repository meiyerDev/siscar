<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th><b>{{ $index+1 }}</b></th>
			<th colspan="5"><b>{{ $carrera->name }}</b></th>
		</tr>
		<tr>
			<th>N°</th>
			<th>CÉDULA</th>
			<th>NOMBRES</th>
			<th>APELLIDOS</th>
			<th>CREADO EN</th>
			<th>ACTUALIZADO EN</th>
		</tr>
	</thead>
	<tbody>
		@forelse($carrera->students as $index => $student)
		<tr>
			<td>{{ $index+1 }}</td>
			<td>{{ $student->identity }}</td>
			<td>{{ $student->first_name }}</td>
			<td>{{ $student->last_name }}</td>
			<td>{{ $student->created_at }}</td>
			<td>{{ $student->updated_at }}</td>
		</tr>
		@empty
		<tr>
			<td colspan="6">Sin Registros</td>
		</tr>
		@endforelse
	</tbody>
</table>