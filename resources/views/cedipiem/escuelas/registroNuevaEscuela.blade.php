@extends('main')

@section('title','Nuevo Centro de Trabajo')

@section('header')
@endsection

@section('content')
	{!! Form::open(['route' => 'centro-trabajo.store', 'method' => 'POST']) !!}
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO DEL CATALOGO DE CENTROS DE TRABAJOS' }}
							<div class="text-md-center" style="color: brown;">{{ 'REGISTRAR UN NUEVO CENTRO DE TRABAJO' }}</div>
						</div>
						@csrf		
						<div class="card-body">
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'CENTRO DE TRABAJO (ESCUELA)' }}</div>
									</div>
								</div>
							</div><br>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('DESC_CCT','* Clave del CCT:') !!}
								</div>
								<div class="col-md-3 offset-md-0">
									{!! Form::text('DESC_CCT',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('DESC_CCT','* Nombre del CCT:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('DESC_CCT',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('ESTADO','* Estado:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="ESTADO" required>
										<option name="ESTADO" value="1">ACTIVA</option>
										<option name="ESTADO" value="2">BAJA</option>
										<option name="ESTADO" value="3">SUSPENCIÓN TEMPORAL</option>
									</select>
								</div>
							</div>
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'UBICACIÓN DE LA ESCUELA O CENTRO DE TRABAJO' }}</div>
									</div>
								</div>
							</div><br>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CALLE','* Calle:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('CALLE',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NO_EXTERIOR','* No. Exterior:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('NO_EXTERIOR',null,['class' => 'form-control','placeholder' => 'Máx. 5 caracteres' ,'required','maxlength' => '5']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NO_INTERIOR','No. Interior:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('NO_INTERIOR',null,['class' => 'form-control','placeholder' => 'Máx. 5 caracteres','maxlength' => '5']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CP','* Código Postal:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('CP',null,['class' => 'form-control','placeholder' => 'Min. 5 caracteres' ,'required','minlength' => '5','maxlength' => '5']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('COLONIA','* Colonia:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('COLONIA',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('LOCALIDAD','* Localidad:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('LOCALIDAD',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CVE_MUNICIPIO','* Municipio: ') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="CVE_MUNICIPIO" required>									
		            					@foreach($municipios as $nivel)
		            						<option name="CVE_NIVEL" value="{{ $nivel->municipioid }}">{{ $nivel->municipionombre }}</option>
		            					@endforeach
									</select>
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('LATITUD','* Latitud:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('LATITUD',0,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('LONGITUD','* Longitud:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('LONGITUD',0,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'DATOS ADMINISTRATIVOS' }}</div>
									</div>
								</div>
							</div><br>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('DIRECTOR','* Director:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('DIRECTOR',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('PROPIETARIO','* Propietario, Representante Legal y/o Apoderado:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('PROPIETARIO',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('TITULAR','* Titular de los derechos:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('TITULAR',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres' ,'required','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('TELEFONO1','Teléfono 1:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('LADA1',null,['class' => 'form-control','placeholder' => 'LADA','maxlength' => '3']) !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('TELEFONO1',null,['class' => 'form-control','placeholder' => 'TELEFONO','maxlength' => '10']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('TELEFONO2','Teléfono 2:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('LADA2',null,['class' => 'form-control','placeholder' => 'LADA','maxlength' => '3']) !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('TELEFONO2',null,['class' => 'form-control','placeholder' => 'TELEFONO','maxlength' => '10']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CELULAR','Teléfono celular o fax:') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('CELULAR_LADA',null,['class' => 'form-control','placeholder' => 'LADA','maxlength' => '3']) !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('CELULAR',null,['class' => 'form-control','placeholder' => 'TELEFONO','maxlength' => '10']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CORREO','Correo Electrónico:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::email('CORREO',null,['class' => 'form-control','placeholder' => 'ejemplo@ejemplo.com','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('PAGINAWEB','Página Web:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('PAGINAWEB',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'DATOS DE COORDINACIÓN EDUCATIVA' }}</div>
									</div>
								</div>
							</div><br>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('ZONA','Zona Escolar:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('ZONA',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('SECTOR','Sector:') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('SECTOR',null,['class' => 'form-control','placeholder' => 'Máx. 50 caracteres','maxlength' => '50']) !!}
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('SUBSISTEMA','* Subsistema: ') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="SUBSISTEMA" required>									
		            					@foreach($subsistemas as $nivel)
		            						<option name="SUBSISTEMA" value="{{ $nivel->cve_subsistema }}">{{ $nivel->desc_subsistema }}</option>
		            					@endforeach
									</select>
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NIVEL','* Nivel: ') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="NIVEL" required>									
		            					@foreach($niveles as $nivel)
		            						@if($nivel->cve_nivel > 0 AND $nivel->cve_nivel <= 3)
		            							<option name="nivel" id="NIVEL" value="{{ $nivel->cve_nivel }}">{{ $nivel->desc_nivel }}</option>
		            						@endif
		            					@endforeach
									</select>
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NIVEL_EDUC','* Nivel Educativo: ') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="NIVEL_EDUC" required>									
		            					@foreach($educativos as $nivel)
		            						<option name="NIVEL_EDUC" value="{{ $nivel->cve_nivel_educativo }}">{{ $nivel->desc_nivel_educativo }}</option>
		            					@endforeach
									</select>
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('TURNO','* Turno: ') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="TURNO" required>									
		            					@foreach($turnos as $nivel)
		            						<option name="TURNO" value="{{ $nivel->cve_turno }}">{{ $nivel->desc_turno }}</option>
		            					@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-8">
									{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
									<a href="{{ route('centro-trabajo.create') }}" class="btn btn-danger">Cancelar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
@endsection