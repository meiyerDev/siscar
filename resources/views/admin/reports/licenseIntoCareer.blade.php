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
			<th class="text-center">SOLICITADO</th>
		</tr>
	</thead>
	<tbody>
		@forelse($career->licenses as $index => $license)
		<tr>
			<td>{{ $index+1 }}</td>
			<td>{{ $license->student->identity }}</td>
			<td>{{ $license->student->first_name }}</td>
			<td>{{ $license->student->last_name }}</td>
			<td>{{ $license->created_at }}</td>
		</tr>
		@empty
		<tr>
			<td colspan="6">Sin Registros</td>
		</tr>
		@endforelse
	</tbody>
</table>