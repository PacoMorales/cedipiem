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
											<div class="card-header justify-content-center  text-md-center">{{ 'CARTA DE PARTICIPACIÓN PARA PERSONAS FÍSICAS Y JURIDICA COLECTIVA' }}<div style="color:brown;">{{'SECTOR: '}}{!! $clasificgob->clasificgob_desc !!}</div></div>
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
								<div class="form-group row mb-0">
									<div class="col-md-10 offset-md-1 text-right">
										<div class = "form-group row">
											<div class="col-md-9 col-form-label text-md-right">
												{!! Form::label('FECHA','Fecha:') !!}
											</div>
											<div class="col-md-3 offset-md-0">
												{!! Form::text('FECHA',$hoy,['class' => 'form-control','placeholder' => 'dd/mm/aaaa']) !!}
											</div>
										</div>
									</div>
								</div>
									<div class = "form-group row">
										<div class="col-md-4 col-form-label text-md-center">
											{!! Form::label('SUSCRIBE','SECRETARIO DE DESARROLLO SOCIAL') !!}
										</div>
									</div>
									<div class = "form-group row">
										<div class="col-md-4 col-form-label text-md-center">
											{!! Form::label('SUSCRIBE','PRESENTE') !!}
										</div>
									</div>
								<div class="form-group row mb-0">
									<div class="col-md-10 offset-md-1 text-justify">
										<div class = "form-group row">
											<div class="col-md-2 col-form-label text-md-right">
												{!! Form::label('SUSCRIBE','* Nombre o razón social:') !!}
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
											<div class="col-md-12 offset-md-0">
												{!! Form::text('RAZON_SOCIAL',null,['class' => 'form-control','placeholder' => 'Razón social']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-4 col-form-label text-md-right">
												{!! Form::label('CVE_SERV_PUBLICO','* Representante de la empresa: :') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('CVE_SERV_PUBLICO',null,['class' => 'form-control','placeholder' => 'Representante de la empresa']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-4 col-form-label text-md-right">
												{!! Form::label('RFC','Con RFC (sólo si aplica):') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('RFC',null,['class' => 'form-control','placeholder' => 'RFC']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('AHIJADOS','Ahijados a apadrinar: ') !!}
											</div>
											<div class="col-md-4 offset-md-0">
												<select class="form-control m-bot15" name="Ahijados" id="ahijados" required>									
			            								<option name="clasificgob" id="clasificgob" value="1">UNO</option>
			            								<option name="clasificgob" id="clasificgob" value="2">DOS</option>
			            								<option name="clasificgob" id="clasificgob" value="3">TRES</option>
			            								<option name="clasificgob" id="clasificgob" value="4">CUATRO</option>
			            								<option name="clasificgob" id="clasificgob" value="5">CINCO</option>
			            								<option name="clasificgob" id="clasificgob" value="6">SEIS</option>
			            								<option name="clasificgob" id="clasificgob" value="7">SIETE</option>
			            								<option name="clasificgob" id="clasificgob" value="8">OCHO</option>
			            								<option name="clasificgob" id="clasificgob" value="9">NUEVE</option>
			            								<option name="clasificgob" id="clasificgob" value="10">DIEZ</option>
												</select>
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-4 offset-md-0">
												{!! Form::text('MONTO',null,['class' => 'form-control','placeholder' => 'Descuento Quincenal (Cifra)']) !!}
											</div>
											<div class="col-md-4 offset-md-0">
												{!! Form::text('MONTO2',null,['class' => 'form-control','placeholder' => 'Cantidad escrita']) !!}
											</div>
										</div>
										<div class = "form-group row">
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ANIO','Lo anterior, como apoyo al Programa de Desarrollo Social Familias Fuertes Niñez Indígena,') !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ANIO','operado por el Consejo Estatal para el Desarrollo Integral de los Pueblos ') !!}
											</div>
											<div class="col-md-0 col-form-label text-md-right">
												{!! Form::label('ANIO','Indígenas del Estado de México.') !!}
											</div>
										</div>
									</div>
									<br></br>
									<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'DATOS ADMINISTRATIVOS' }}</div>
									</div>
								</div>
							</div><br>
									<div class="col-md-10 offset-md-1 text-justify">
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