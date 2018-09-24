@extends('main')

@section('title','Padrinos Pre-alta')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'PADRINOS PRE-ALTA' }}</div>
							<br>
							<div class="form-group row">
								<div class="col-md-4 offset-md-0">
	                                <div class="form-check">
	                                    <label class="form-check-label" for="Total"><i class="fa fa-address-card"></i>
	                                        	Total de Padrinos en Pre-alta: {!! $total !!}
	                                    </label>
	                                </div>
	                            </div>
							</div>
							<table class="table table-striped table-bordered table-sm">
							  <thead style="color: gray;" class="text-md-center">
							    <tr>
							      <th>No Empleado</th>
							      <th>Cve Padrino</th>
							      <th>Padrino</th>
							      <th>Ahijado(s)</th>
							      <th>Descuento</th>
							      <th>Sector</th>
							      <th>St</th>
							    </tr>
							  </thead>
							  <tbody class="text-md-center">
							  	@foreach($padrinos_prealta as $padrino)
									<tr>
									<th>{{$padrino->cve_sp}}</th>
									<th>{{$padrino->cve_padrino}}</th>
									<th>{{$padrino->nombre_completo}}</th>
									<th>{{$padrino->no_ahijados}}</th>
									<th>$ {{$padrino->monto_ahijados}}.00</th>
									@foreach($sectores as $sector)
										@if($sector->clasificgob_id == $padrino->clasificgob_id)
											<th>{{ $sector->clasificgob_desc }}</th>
											@break
										@endif
									@endforeach
									@if($padrino->status_4 == 'E')
										<th><a href="#" class="btn btn-info" title="Status: En espera"><i class="fa fa-coffee"></i></a></th>
									@else
										<th><a href="#" class="btn btn-success" title="Status: Activo"><i class="fa fa-check"></i></a></th>
									@endif
									</tr>
								@endforeach
							  </tbody>
							</table> 
							{!! $padrinos_prealta->appends(request()->input())->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection