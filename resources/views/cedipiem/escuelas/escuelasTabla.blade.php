@extends('main')

@section('title','Catálogo Centros de Trabajo')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO DEL CATALOGO DE CENTROS DE TRABAJOS' }}</div>
							<!--<div class="card-body">-->
							{!! Form::open(['route' => 'centro-trabajo.ver', 'method' => 'GET']) !!}
						 	@csrf		
							<div class="card-body">
								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('NIVEL_EDUC','Nivel Educativo: ') !!}
									</div>
									<div class="col-md-5 offset-md-1">
										<select class="form-control m-bot15" name="NIVEL" id="select_dep">									
	            							@foreach($niveles as $nivel)
	            								@if($nivel->cve_nivel > 0 AND $nivel->cve_nivel <= 3)
	            									<option name="nivel" id="NIVEL" value="{{ $nivel->cve_nivel }}">{{ $nivel->desc_nivel }}</option>
	            								@endif
	            							@endforeach
										</select>
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('ESCUELA','Nombre de la escuela:') !!}
									</div>
									<div class="col-md-4 offset-md-1">
										{!! Form::text('ESCUELA',null,['class' => 'form-control']) !!}
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
									<a href="{{ route('centro-trabajo.create') }}" class="offset-md-3 btn btn-secondary" title="Reiniciar búsqueda"><i class="fa fa-search"></i> Reiniciar búsqueda</a>
									<a href="{{ route('centro-trabajo.registro') }}" class="offset-md-0 btn btn-primary" title="Dar de alta un nuevo centro de trabajo"><i class="fa fa-address-card"></i> Nuevo</a>
									</div>
								</div>
							
							
							<br>
							<table class="table table-striped table-bordered table-sm">
							  <thead style="color: gray;" class="text-md-center">
							    <tr>
							      <th>CCT</th>
							      <th>Centro de Trabajo</th>
							      <th>Dirección</th>
							      <th>Nivel</th>
							      <th>Sub Sistema</th>
							      <th>Municipio</th>
							      <th>Edo.</th>
							      <th>AccionesGenerales</th>
							    </tr>
							  </thead>
							  <tbody class="text-md-center">
							  	@foreach($escuelas as $escuela)
									<tr>
									<th>{{ $escuela->cve_cct }}</th>
									<th>{{ $escuela->desc_cct }}</th>
									<th>{{ $escuela->calle }}{{ $escuela->no_exterior}}</th>
									@if($escuela->cve_nivel == 1)
										<th>PREESCOLAR</th>
									@else
										@if($escuela->cve_nivel == 2)
											<th>PRIMARIA</th>
										@else
											<th>SECUNDARIA</th>
										@endif
									@endif
									@if($escuela->cve_subsistema == 0)
										<th>OTRO</th>
									@else
										@if($escuela->cve_subsistema == 1)
											<th>FEDERAL / SEIEM</th>
										@else
											@if($escuela->cve_subsistema == 2)
												<th>ESTATAL</th>
											@else
												@if($escuela->cve_subsistema == 4)
													<th>AUTONOMO</th>
												@else
													<th>DESCENTRALIZADO</th>
												@endif
											@endif
										@endif
									@endif
									@foreach($municipios as $total)
										@if($total->municipioid == $escuela->cve_municipio)
											<th>{{ $total->municipionombre }}</th>
											@break
										@endif
										@if($loop->last)
        									<th>{{$escuela->cve_municipio}}</th>
        								@endif
									@endforeach
									@if($escuela->status_4 == 'S' OR $escuela->status_4 ==' ')
										<th><a href="#" class="btn btn-success" title="Estado: Activo"><i class="fa fa-check"></i></a></th>
									@else
										<th><a href="#" class="btn btn-danger" title="Estado: Inactivo (Baja)"><i class="fa fa-times"></i></a></th>
									@endif
									<th><a href="#" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-primary" title="Ficha"><i class="fa fa-search"></i></a>
									<a href="#" class="btn btn-danger" title="Borrar"><i class="fa fa-trash"></i></th>
									</tr>
								@endforeach
							  </tbody>
							</table> 
							{!! $escuelas->appends(request()->input())->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection