@extends('layouts.templatito')

@section('title') BITÁCORA @endsection

@section('body')
		<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="font-weight-bold text-dark">Bitácora del Sistema</h3>
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
											<th>Acción</th>
											<th>Cédula</th>
											<th>Usuario</th>
											<th>Fecha</th>
										</tr>
									</thead>
									<!-- Table head -->

									<!-- Table body -->
									<tbody>
										@foreach($binnacles as $index => $binnacle)
											<tr>
												<th>{{ $index+1 }}</th>
												<td> {{ $binnacle->action }} </td>
												<td class="@if($binnacle->type === 4) text-danger @elseif($binnacle->type === 3) text-warning @elseif($binnacle->type === 2) text-success @else null @endif"> {{ ($binnacle->identity)?$binnacle->identity: '--------' }} </td>
												<td> {{ $binnacle->user->name.' - user_id: '.$binnacle->user_id }} </td>
												<td> {{ $binnacle->created_at }} </td>
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
@endsection