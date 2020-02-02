<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th>N°</th>
			<th>CARRERA</th>
			<th>CANTIDAD DE ESTUDIANTES</th>
			<th>CANTIDAD DE SOLICITUDES</th>
			<th>ÚLTIMA SOLICITUD</th>
		</tr>
	</thead>
	<tbody>
		@forelse($career as $index => $carrera)
		<tr>
			<td>{{ $index+1 }}</td>
			<td>{{ $carrera->name }}</td>
			<td>{{ $carrera->students->count() }}</td>
			<td>{{ $carrera->licenses->count() }}</td>
			<td>{{ $carrera->licenses->last()?$carrera->licenses->last()->created_at:'Sin Solicitudes' }}</td>
		</tr>
		@empty
		<tr>
			<td colspan="6">Sin Registros</td>
		</tr>
		@endforelse
	</tbody>
</table>