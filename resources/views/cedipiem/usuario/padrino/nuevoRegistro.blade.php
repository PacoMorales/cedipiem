@extends('main')

@section('title','Nuevo Padrino')

@section('header')
@endsection

@section('content')
{!! Form::open(['route' => 'padrino.nuevo', 'method' => 'POST']) !!}
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO AL DIRECTORIO DE PADRINOS' }}
							<div class="text-md-center" style="color:blue; ">{{'PROGRAMA GUBERNAMENTAL: '}}  {!! $programa->programa !!}</div>
						</div>
						 	@csrf		
							<div class="card-body">
								@if(count($errors) > 0)
									<div class="alert alert-danger" role="alert">
										<ul>
											@foreach($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<div class="justify-content-center">
									<div class="mol-md-8">
										<div class="card">
											<div class="card-header justify-content-center  text-md-center">{{ 'CARTA DE AUTORIZACIÓN DE DESCUENTOS VÍA NÓMINA' }}<div>{{ 'PERSONAS DE SERVICIO PÚBLICO' }}</div><div style="color:brown;">{{'SECTOR: '}}{!! $clasificgob->clasificgob_desc !!}</div><div style="color:green;">{{'ESTRUCTURA: '}}{!! $estruc->estrucgob_desc !!}</div></div>
										</div>
									</div>
								</div>
								<br>
								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('SECTOR','SECTOR: ') !!}
									</div>
									<div class="col-md-6 offset-md-0">
										<p><input type="text" name="SECTOR" value="{{ $clasificgob->clasificgob_desc }}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
									</div>	
								</div>
								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('ESTRUCTURA','ESTRUCTURA: ') !!}
									</div>
									<div class="col-md-6 offset-md-0">
										<p><input type="text" name="ESTRUCTURA" value="{{ $estruc->estrucgob_desc }}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
									</div>	
								</div>
								<div class="form-group row mb-0">
									<div class="col-md-10 offset-md-1 text-right">
										<div class = "form-group row">
											<div class="col-md-9 col-form-label text-md-right">
												{!! Form::label('LUGAR','Lugar:') !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('LUGAR',null,['class' => 'form-control']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-9 col-form-label text-md-right">
												{!! Form::label('FECHA','Fecha:') !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('FECHA',$hoy,['class' => 'form-control','placeholder' => 'dd/mm/aaaa']) !!}
											</div>
										</div>
									</div>
									<div class="col-md-10 offset-md-1">
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('LUGAR','DIRECCIÓN GENERAL DE PERSONAL DEL GOBIERNO DEL ESTADO DE MÉXICO,') !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('LUGAR','EQUIVALENTE DEL ORGANISMO AUXILIAR O TESORERÍA MUNICIPAL') !!}
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('LUGAR','PRESENTE') !!}
											</div>
										</div>
									</div>
									<div class="col-md-10 offset-md-1 text-justify">
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('SUSCRIBE','Quien suscribe:') !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('PATERNO',null,['class' => 'form-control','placeholder' => 'Apellido paterno']) !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('MATERNO',null,['class' => 'form-control','placeholder' => 'Apellido materno']) !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('NOMBRES',null,['class' => 'form-control','placeholder' => 'Nombre(s)']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('CVE_SERV_PUBLICO','con clave de servicio público ') !!}
												<!--<p> con clave de servicio público </p>-->
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('CVE_SERV_PUBLICO',null,['class' => 'form-control','placeholder' => 'Clave de Servicio Público']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('RFC','y con RFC ') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('RFC',null,['class' => 'form-control','placeholder' => 'RFC']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ADSCRITO',', adscrito (a) a') !!}
											</div>
											<div class="col-md-10 offset-md-0">
												{!! Form::text('ADSCRITO',null,['class' => 'form-control']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('MONTO',' y con fundamento en el artículo 84 fracción IX de la Ley del Trabajo de los Servidores Públicos del Estado de ') !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('MONTO','México y Municipios, AUTORIZO que de mi sueldo se realice el descuento quincenal de $') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('MONTO',null,['class' => 'form-control','placeholder' => '$$$$$']) !!}
											</div>
											<div class="col-md-1 col-form-label text-md-right">
												{!! Form::label('MONTO','(') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('MONTO2',null,['class' => 'form-control','placeholder' => 'Cantidad escrita']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('QUINCENA','pesos 00/100 M.N) a partir de la ') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('QUINCENA',null,['class' => 'form-control','placeholder' => 'Número']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('MES',' quincena') !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('MES',' del mes de ') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('MES',null,['class' => 'form-control','placeholder' => 'Mes']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ANIO','del año ') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('ANIO',null,['class' => 'form-control','placeholder' => 'Año']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ANIO','. Lo anterior, como apoyo al Programa de Desarrollo ') !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ANIO','Social Familias Fuertes Niñez Indígena, operado por el Consejo Estatal para el Desarrollo Integral de los Pueblos') !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ANIO','Indígenas del Estado de México.') !!}
											</div>
										</div>
									</div>
									<br></br>
									<div class="col-md-10 offset-md-1">
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('CARGO','Cargo:') !!}
											</div>
											<div class="col-md-7 offset-md-0">
												{!! Form::text('CARGO',null,['class' => 'form-control','placeholder' => 'Cargo']) !!}
											</div>
										</div>
									</div>
									<div class="col-md-10 offset-md-1">
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('UNIDAD','Unidad Administrativa:') !!}
											</div>
											<div class="col-md-5 offset-md-0">
												{!! Form::text('UNIDAD',null,['class' => 'form-control','placeholder' => 'Unidad Administrativa']) !!}
											</div>
										</div>
									</div>
									</div>
									<div class="col-md-10 offset-md-1">
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('DEPENDENCIA','Dependencia:') !!}
											</div>
											<div class="col-md-6 offset-md-0">
												<select class="form-control m-bot15" name="select_dep" id="select_dep">									
			            							@foreach($dependencias as $dependencia)
			            								<option name="clasificgob" id="clasificgob" value="{{ $dependencia->depen_id }}">{{ $dependencia->depen_desc }}</option>
			            							@endforeach
												</select>
											</div>
											<!--<div class="col-md-6 offset-md-0">
												{!! Form::text('DEPENDENCIA',null,['class' => 'form-control','placeholder' => 'Dependencia']) !!}
											</div>-->
										</div>
									</div>
									<div class="col-md-10 offset-md-1 text-justify">
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('DEPENDENCIA','Domicilio Laboral') !!}
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('CALLE','Calle:') !!}
											</div>
											<div class="col-md-5 offset-md-0">
												{!! Form::text('CALLE',null,['class' => 'form-control','placeholder' => 'Calle']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('NUM_EXT','Núm. Ext:') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('NUM_EXT',null,['class' => 'form-control']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('NUM_INT','Núm. Int:') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('NUM_INT',null,['class' => 'form-control']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('COLONIA','Colonia:') !!}
											</div>
											<div class="col-md-7 offset-md-0">
												{!! Form::text('COLONIA',null,['class' => 'form-control','placeholder' => 'Colonia']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('CP','C.P.') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('CP',null,['class' => 'form-control']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('CORREO','Correo Electrónico') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::email('CORREO',null,['class' => 'form-control','placeholder' => 'ejemplo@ejemplo.com']) !!}
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-10 offset-md-1 text-justify">
									<div class = "form-group row">
										<div class="col-md-12 col-form-label text-md-center">
											{!! Form::label('DEPENDENCIA','Opción de municipio para apadrinar') !!}
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-3 offset-md-2">
											{!! Form::text('OPCION1',null,['class' => 'form-control','placeholder' => 'OPCION 1']) !!}
										</div>
										<div class="col-md-3 offset-md-0">
											{!! Form::text('OPCION2',null,['class' => 'form-control','placeholder' => 'OPCION 2']) !!}
										</div>
										<div class="col-md-3 offset-md-0">
											{!! Form::text('OPCION3',null,['class' => 'form-control','placeholder' => 'OPCION 3']) !!}
										</div>
									</div>
								</div>
								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-8">
										{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
										<a href="{{ route('padrino.create') }}" class="btn btn-danger">Cancelar</a>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
{!! Form::close() !!}
@endsection