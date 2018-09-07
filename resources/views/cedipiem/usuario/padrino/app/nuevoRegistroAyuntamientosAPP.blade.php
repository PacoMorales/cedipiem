@extends('main')

@section('title','Nuevo Padrino')

@section('header')
@endsection

@section('content')
{!! Form::open(['route' => 'padrino.nuevo-app', 'method' => 'POST']) !!}
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'ALTA DE PADRINOS' }}
							<div class="text-md-center" style="color:brown; ">{{'PROGRAMA GUBERNAMENTAL: '}}  {!! $programa->programa !!}</div>
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
											<div class="card-header justify-content-center  text-md-center">{{ 'CARTA DE AUTORIZACIÓN DE DESCUENTOS VÍA NÓMINA' }}<div>{{ 'PERSONAS DE SERVICIO PÚBLICO' }}</div><div style="color:brown;">{{'SECTOR: '}}{!! $clasificgob->clasificgob_desc !!}</div><div style="color:green;">{{'ESTRUCTURA: '}}{!! $depend->municipionombre !!}</div></div>
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
										<p><input type="text" name="ESTRUCTURA" value="{{ $depend->municipionombre }}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
									</div>	
								</div>
								<div class="form-group row mb-0">
									<div class="col-md-10 offset-md-1 text-justify">
										<div class = "form-group row">
											<div class="col-md-2 col-form-label text-md-right">
												{!! Form::label('SUSCRIBE','Quien suscribe:') !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('PATERNO',null,['class' => 'form-control','placeholder' => 'Apellido paterno','required','maxlength' => '50']) !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('MATERNO',null,['class' => 'form-control','placeholder' => 'Apellido materno','required','maxlength' => '50']) !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('NOMBRES',null,['class' => 'form-control','placeholder' => 'Nombre(s)','required','maxlength' => '50']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('SEXO','* Sexo: ') !!}
											</div>
											<div class="col-md-3 offset-md-0">
												<select class="form-control m-bot15" name="SEXO"  required>									
			            								<option name="S" value="S">SIN ESPECIFICAR</option>
			            								<option name="H" value="H">HOMBRE</option>
			            								<option name="M" value="M">MUJER</option>
												</select>
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('CVE_SERV_PUBLICO','* Con clave de servidor publico:') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('CVE_SERV_PUBLICO',null,['class' => 'form-control','placeholder' => 'Clave de Servicio Público','required','maxlength' => '50']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('RFC','* Con RFC:') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('RFC',null,['class' => 'form-control','placeholder' => 'RFC','required','maxlength' => '50']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('AHIJADOS','* Ahijados a apadrinar: ') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												<select class="form-control m-bot15" name="AHIJADOS" id="ahijados" required>
													@for($i=1;$i<=500;$i++)
														<option name="AHIJADO" value="{{ $i }}">{{ $i }}</option>
													@endfor
												</select>
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('QUINCENA','* A partir de la ') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												<select class="form-control m-bot15" name="QUINCENA" id="select_dep" required>									
			            								<option name="clasificgob" id="clasificgob" value="1">PRIMER QUINCENA</option>
			            								<option name="clasificgob" id="clasificgob" value="2">SEGUNDA QUINCENA</option>
												</select>
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('MES','* Del mes de ') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												<select class="form-control m-bot15" name="MES" id="select_dep" required>									
													@foreach($meses as $mes)
														<option value="{{$mes->cve_mes}}">{{$mes->desc_mes}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('ANIO','* Del año: ') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('ANIO',null,['class' => 'form-control','placeholder' => 'Año','required','maxlength' => '4']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-12 col-form-label text-md-center">
												{!! Form::label('ANIO','Lo anterior, como apoyo al Programa de Desarrollo Social Familias Fuertes Niñez Indígena,') !!}
											</div>
											<div class="col-md-12 col-form-label text-md-center">
												{!! Form::label('ANIO','operado por el Consejo Estatal para el Desarrollo Integral de los Pueblos Indígenas del Estado de México.') !!}
											</div>
										</div>
										<br>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('CARGO','Cargo:') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('CARGO',null,['class' => 'form-control','placeholder' => 'Cargo','maxlength' => '50']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('UNIDAD','* Unidad Administrativa:') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('UNIDAD',null,['class' => 'form-control','placeholder' => 'Unidad Administrativa','required','maxlength' => '50']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('DEPENDENCIA','* Dependencia:') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												<select class="form-control m-bot15" name="DEPENDENCIA" required>									
			            							@foreach($dependencias as $dependencia)
			            								<option name="DEPENDENCIA" value="{{ $dependencia->municipioid }}">{{ $dependencia->municipionombre }}</option>
			            							@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
									<div class="justify-content-center">
										<div class="mol-md-8">
											<div class="card">
												<div class="card-header justify-content-center text-md-center">{{ 'DOMICILIO LABORAL' }}</div>
											</div>
										</div>
									</div><br>
									<div class="col-md-10 offset-md-1 text-justify">
										<div class="form-group row">
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('CALLE','Calle:') !!}
											</div>
											<div class="col-md-5 offset-md-0">
												{!! Form::text('CALLE',null,['class' => 'form-control','placeholder' => 'Calle','maxlength' => '80']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('NUM_EXT','Núm. Ext:') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('NUM_EXT',null,['class' => 'form-control','maxlength' => '10']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('NUM_INT','Núm. Int:') !!}
											</div>
											<div class="col-md-2 offset-md-0">
												{!! Form::text('NUM_INT',null,['class' => 'form-control','maxlength' => '10']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('COLONIA','Colonia:') !!}
											</div>
											<div class="col-md-7 offset-md-0">
												{!! Form::text('COLONIA',null,['class' => 'form-control','placeholder' => 'Colonia','maxlength' => '50']) !!}
											</div>
											<div class="col-md-0 col-form-label text-md-left">
												{!! Form::label('CP','C.P.') !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('CP',null,['class' => 'form-control','maxlength' => '5']) !!}
											</div>
											<div class = "form-group row">
												<div class="col-md-0 col-form-label text-md-right">
													{!! Form::label('TELEFONO','* Teléfono:') !!}
												</div>
												<div class="col-md-2 offset-md-0">
													{!! Form::text('LADA',null,['class' => 'form-control','placeholder' => 'LADA','required','maxlength' => '3']) !!}
												</div>
												<div class="col-md-3 offset-md-0">
													{!! Form::text('TELEFONO',null,['class' => 'form-control','placeholder' => 'TELEFONO','required','maxlength' => '10']) !!}
												</div>
												<div class="col-md-0 col-form-label text-md-left">
													{!! Form::label('CORREO','* Correo Electrónico') !!}
												</div>
												<div class="col-md-3 offset-md-0">
													{!! Form::email('CORREO',null,['class' => 'form-control','placeholder' => 'ejemplo@ejemplo.com','required','maxlength' => '50']) !!}
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-10 offset-md-1 text-justify">
									<div class = "form-group row">
										<div class="col-md-12 col-form-label text-md-center">
											{!! Form::label('DEPENDENCIA','* Opción de municipio para apadrinar') !!}
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-3 offset-md-2">
											<select class="form-control m-bot15" name="OPCION1" required>									
			            						@foreach($municipios as $municipio)
			            							<option name="OPCION2" value="{{ $municipio->municipioid }}">{{ $municipio->municipionombre }}</option>
			            						@endforeach
											</select>
										</div>
										<div class="col-md-3 offset-md-0">
											<select class="form-control m-bot15" name="OPCION2" required>									
			            						@foreach($municipios as $municipio)
			            							<option name="OPCION2" value="{{ $municipio->municipioid }}">{{ $municipio->municipionombre }}</option>
			            						@endforeach
											</select>
										</div>
										<div class="col-md-3 offset-md-0">
											<select class="form-control m-bot15" name="OPCION3" required>									
			            						@foreach($municipios as $municipio)
			            							<option name="OPCION3" value="{{ $municipio->municipioid }}">{{ $municipio->municipionombre }}</option>
			            						@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-8">
										{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
										<a href="{{ route('padrino.crear-nuevo') }}" class="btn btn-danger">Cancelar</a>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
{!! Form::close() !!}
@endsection