@extends('main')

@section('title','Catálogo Padrinos')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO DEL DIRECTORIO DE PADRINOS 	|	BÚSQUEDA POR NOMBRE' }}</div>
							<!--<div class="card-body">-->
							{!! Form::open(['route' => 'padrino.ver', 'method' => 'GET']) !!}
						 	@csrf		
							<div class="card-body">
								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('DEP','Dependencia, Organismo, Ayuntamiento u otro') !!}
									</div>
									<div class="col-md-5 offset-md-1">
										<select class="form-control m-bot15" name="select_dep" id="select_dep">									
	            							
	            								<option name="clasificgob" id="clasificgob" value="0">SIN ESPECIFICAR</option>
	            								<option name="clasificgob" id="clasificgob" value="1">SECTOR CENTRAL</option>
	            								<option name="clasificgob" id="clasificgob" value="2">ORGANISMOS AUXILIARES</option>
	            								<option name="clasificgob" id="clasificgob" value="3">AYUNTAMIENTOS</option>
	            								<option name="clasificgob" id="clasificgob" value="4">ORGANISMOS AUTONOMOS</option>
	            								<option name="clasificgob" id="clasificgob" value="5">INICIATIVA PRIVADA</option>
	            							
										</select>
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('nombre','Nombre completo') !!}
									</div>
									<div class="col-md-4 offset-md-1">
										{!! Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Ap. paterno, materno, nombre(s)']) !!}
									</div>
								</div>

								@if(count($errors) > 0)
									<div class="alert alert-danger" role="alert">
										<ul>
											@foreach($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								
								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-5">
										{!! Form::submit('Mostrar',['class' => 'btn btn-success']) !!}
										<!--<a href=" {{ route('padrino.ver') }}" class="btn btn-success">Mostrar</a>-->
										{!! Form::close() !!}
									<a href="{{ route('padrino.create') }}" class="offset-md-3 btn btn-secondary" title="Reiniciar búsqueda"><i class="fa fa-search"></i> Reiniciar búsqueda</a>
									<a href="{{ route('padrino.index') }}" class="offset-md-0 btn btn-primary" title="Dar de alta un nuevo padrino"><i class="fa fa-address-card"></i> Nuevo</a>
									</div>
								</div>
							
							
							<br>
							<table class="table table-striped table-bordered table-sm">
							  <thead style="color: gray;" class="text-md-center">
							    <tr>
							      <!--<th>No</th>-->
							      <th>No Empleado</th>
							      <th>Cve Padrino</th>
							      <th>Padrino</th>
							      <!--<th>RFC</th>-->
							      <th>Fecha Nacimiento</th>
							      <!--<th>Municipio</th>-->
							      <th>Dependencia</th>
							      <th>St</th>
							      <!--<th>Vinculados</th>
							      <th>Desvinculados</th>-->
							      <th>Ahijado(s)</th>
							      <th>AccionesGenerales</th>
							    </tr>
							  </thead>
							  <tbody class="text-md-center">
							  	@foreach($totales as $padrino)
									<tr>
									<th>{{ $padrino->cve_sp }}</th>
									<th>{{ $padrino->cve_padrino }}</th>
									<th>{{ $padrino->nombre_completo }}</th>
									<!--<th>{{ $padrino->rfc }}</th>-->
									<th>{!! date('d-m-Y',strtotime($padrino->fecha_nacimiento)) !!}</th>
									<!-- FECHA CON FORMATO DE ORACLE-->
									<!--<th>{{ $padrino->fecha_nacimiento }}</th>-->
									<!--<th>{{ $padrino->cve_municipio }}</th>-->
									@if($padrino->clasificgob_id == 1)
										<th>SECTOR CENTRAL</th>
									@else
										@if($padrino->clasificgob_id == 2)
											<th>ORGANISMOS AUXILIARES</th>
										@else
											@if($padrino->clasificgob_id == 3)
												<th>AYUNTAMIENTOS</th>
											@else
												@if($padrino->clasificgob_id == 4)
													<th>ORGANISMOS AUTONOMOS</th>
												@else
													<th>INICIATIVA PRIVADA</th>
												@endif
											@endif
										@endif
									@endif
									<!--<th>{{ $padrino->clasificgob_id }}</th>-->
									@if($padrino->status_1 == 'B')
										<th><a href="#" class="btn btn-danger" title="Status: Inactivo (Baja)"><i class="fa fa-times"></i></a></th>
									@else
										<th><a href="#" class="btn btn-success" title="Status: Activo"><i class="fa fa-check"></i></a></th>
									@endif
										@foreach( $ahijados as $total)
											@if($total->cve_padrino == $padrino->cve_padrino)
												<th>{{ $total->total_ahijados }}</th>
												@break
											@endif
											@if($loop->last)
        										<th>0</th>
        									@endif
										@endforeach
									<!--<th>{{ $padrino->status_1 }}</th>
									<th>{{ $padrino->status_1 }}</th>
									<th>{{ $padrino->status_1 }}</th>-->
									<th><a href="{{ route('padrino.edit',$padrino->cve_padrino) }}" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-primary" title="Ficha"><i class="fa fa-search"></i></a>
									<a href="#" class="btn btn-secondary" title="Borrar" onclick="return confirm('Eliminar?')"><i class="fa fa-trash"></i></th>
									</tr>
								@endforeach
							  </tbody>
							</table> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection