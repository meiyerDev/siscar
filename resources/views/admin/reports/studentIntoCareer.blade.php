<table class="table table-sm table-striped table-bordered text-center">
	<thead>
		<tr>
			<th colspan="6" class="text-center"><b>{{ $career->name }}</b></th>
		</tr>
		<tr>
			<th class="text-center">N°</th>
			<th class="text-center">CÉDULA</th>
			<th class="text-center">NOMBRES</th>
			<th class="text-center">APELLIDOS</th>
			<th class="text-center">CREADO EN</th>
			<th class="text-center">ACTUALIZADO EN</th>
		</tr>
	</thead>
	<tbody>
		@forelse($career->students as $index => $student)
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