<table class="table table-sm table-striped table-bordered text-center">
	<thead>
		<tr>
			<th><b>{{ $index+1 }}</b></th>
			<th colspan="4"><b>{{ $carrera->name }}</b></th>
		</tr>
		<tr>
			<th>N°</th>
			<th>CÉDULA</th>
			<th>NOMBRES</th>
			<th>APELLIDOS</th>
			<th>SOLICITADO</th>
		</tr>
	</thead>
	<tbody>
		@forelse($carrera->licenses as $index => $license)
		<tr>
			<td>{{ $index+1 }}</td>
			<td>{{ $license->student->identity }}</td>
			<td>{{ $license->student->first_name }}</td>
			<td>{{ $license->student->last_name }}</td>
			<td>{{ $license->created_at }}</td>
		</tr>
		@empty
		<tr>
			<td colspan="6">Sin Solicitudes</td>
		</tr>
		@endforelse
	</tbody>
</table>