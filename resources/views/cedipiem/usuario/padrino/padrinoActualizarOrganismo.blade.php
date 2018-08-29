@extends('main')

@section('title','Actualizar Datos Personales Padrino')

@section('header')
@endsection

@section('content')
	{!! Form::open(['route' => 'padrino.store', 'method' => 'POST']) !!}
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO AL DIRECTORIO DE PADRINOS' }}<div class="text-md-center" style="color:blue; ">{{'PROGRAMA GUBERNAMENTAL: '}}  {!! $programa->programa !!}</div></div>
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
											<div class="card-header justify-content-center  text-md-center">{{ 'DATOS PERSONALES 	| 	PADRINO ' }}<div style="color:green;">{!! $padrino->nombre_completo !!}</div></div>
										</div>
									</div>
								</div>
								<br>
								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('DEP','* Dependencia, Organismo, Ayuntamiento u otro') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										<select class="form-control m-bot15" name="select_dep" id="select_dep" required>									
	            							@foreach($clasificgob as $cl)
	            								@if($cl->clasificgob_id == $padrino->clasificgob_id)
	            									<option name="clasificgob" id="clasificgob" value="{{ $cl->clasificgob_id }}" selected>{{ $cl->clasificgob_desc }}</option>
	            								@else
	            									<option name="clasificgob" id="clasificgob" value="{{ $cl->clasificgob_id }}">{{ $cl->clasificgob_desc }}</option>
	            								@endif
	            							@endforeach
										</select>
									</div>	
								</div>
								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CVE_SP','* Clave servidor público, No. empleado y/o trabajador') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										{!! Form::text('CVE_SP',$padrino->cve_sp,['class' => 'form-control','placeholder' => 'Max. 35 dígitos | Min. 4 dígitos' ,'required','minlength' => '4','maxlength' => '35']) !!}
										<!--<p><input type="text" name="CVE_SP" value="{{$padrino->cve_sp}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly"></p>-->
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CVE_PADRINO','* Clave de Padrino') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										<!--{!! Form::text('CVE_PADRINO',$padrino->cve_padrino,['class' => 'form-control','placeholder' => 'Max. 35 dígitos | Min. 4 dígitos' ,'required','minlength' => '4','maxlength' => '35']) !!}-->
										<p><input type="text" name="CVE_PADRINO" value="{{$padrino->cve_padrino}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly"></p>
									</div>
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('PRIMER_APELLIDO','* Primer apellido') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('APELLIDO_PATERNO',$padrino->apellido_paterno,['class' => 'form-control','placeholder' => 'Max. 35 caracteres | Min. 4 caracteres' ,'required','minlength' => '4','maxlength' => '35']) !!}
										<!--<p><input type="text" name="PADRINO" value="{{$padrino->nombre_completo}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly"></p>-->
									</div>
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('SEGUNDO_APELLIDO','Segundo apellido') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('APELLIDO_MATERNO',$padrino->apellido_materno,['class' => 'form-control','placeholder' => 'Max. 35 caracteres | Min. 4 caracteres','minlength' => '4','maxlength' => '35']) !!}
										<!--<p><input type="text" name="PADRINO" value="{{$padrino->nombre_completo}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly"></p>-->
									</div>
								</div>
								
								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('NOMBRES','* Nombre(s)') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('NOMBRES',$padrino->nombres,['class' => 'form-control','placeholder' => 'Max. 35 caracteres | Min. 4 caracteres' ,'required','minlength' => '4','maxlength' => '35']) !!}
										<!--<p><input type="text" name="PADRINO" value="{{$padrino->nombre_completo}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly"></p>-->
									</div>
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('FECHA_NACIMIENTO','* Fecha de nacimiento') !!}
									</div>
				                    <div class="col-md-2 offset-md-0">
				                        <input type="text" class="form-control datepicker" name="FECHA_NACIMIENTO" placeholder="dd/mm/aaaa" required>
				                            <div class="input-group-addon">
				                                <span class="glyphicon glyphicon-th"></span>
				                            </div>
				                    </div>
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('SEXO','* Sexo') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										<p><input type="radio" name="sexo" checked value="H" style="margin-right:5px;">Hombre
										<input type="radio" name="sexo" value="M" style="margin-right:5px;">Mujer</p>
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('RFC','RFC') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('RFC',$padrino->rfc,['class' => 'form-control','placeholder' => 'Max. 10 caracteres | Min. 10 caracteres','minlength'=>"10",'maxlength'=>"14"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CURP','CURP') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('CURP',$padrino->curp,['class' => 'form-control','placeholder' => 'Max. 18 caracteres | Min. 18 caracteres','minlength'=>"18",'maxlength'=>"18"]) !!}
									</div>	
								</div>
								<br>
								<div class="justify-content-center">
									<div class="mol-md-8">
										<div class="card">
											<div class="card-header justify-content-center  text-md-center">{{ 'DOMICILIO' }}</div>
										</div>
									</div>
								</div>
								<br>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CALLE','* Calle') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('CALLE',$padrino->calle,['class' => 'form-control','placeholder' => 'Max. 45 caracteres | Min. 4 caracteres' ,'required','minlength' => '4','maxlength' => '45']) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('COLONIA','* Colonia') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('COLONIA',$padrino->colonia,['class' => 'form-control','placeholder' => 'Max. 35 caracteres | Min. 4 caracteres' ,'required','minlength' => '4','maxlength' => '35']) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('ENTRE_CALLE','Entre calle') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('ENTRE_CALLE',$padrino->entre_calle,['class' => 'form-control','placeholder' => 'Max. 35 caracteres | Min. 4 caracteres','minlength' => '4','maxlength' => '35']) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('Y_CALLE','Y calle') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('Y_CALLE',$padrino->y_calle,['class' => 'form-control','placeholder' => 'Max. 35 caracteres | Min. 4 caracteres','minlength' => '4','maxlength' => '35']) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('OTRA_REFERENCIA','* Otra referencia') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('OTRA_REFERENCIA',$padrino->otra_referencia,['class' => 'form-control','placeholder' => 'Max. 50 caracteres | Min. 4 caracteres' ,'required','minlength' => '4','maxlength' => '50']) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CODIGO_POSTAL','Código postal') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::text('CODIGO_POSTAL',$padrino->cp,['class' => 'form-control','placeholder' => '5 dígitos' ,'minlength'=>"5",'maxlength'=>"5"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('LADA_TEL','Teléfono fijo (lada)') !!}
									</div>
									<div class="col-md-1 offset-md-0">
										{!! Form::text('LADA_TEL',$padrino->lada_tel,['class' => 'form-control','placeholder' => 'Max. 3 dígitos | Min. 2 dígitos','minlength'=>"2",'maxlength'=>"3"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('TELEFONO','Teléfono fijo') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										{!! Form::text('TELEFONO',$padrino->telefono,['class' => 'form-control','placeholder' => '7 dígitos','minlength'=>"7",'maxlength'=>"7"]) !!}
									</div>	
								</div>
								
								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('LADA_CEL','Teléfono celular (lada)') !!}
									</div>
									<div class="col-md-1 offset-md-0">
										{!! Form::text('LADA_CEL',$padrino->lada_cel,['class' => 'form-control','placeholder' => 'Max. 3 dígitos | Min. 2 dígitos','minlength'=>"2",'maxlength'=>"3"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CELULAR','Teléfono celular') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										{!! Form::text('CELULAR',$padrino->celular,['class' => 'form-control','placeholder' => '7 dígitos','minlength'=>"7",'maxlength'=>"7"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CORREO_ELECT','Correo electrónico') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										{!! Form::email('CORREO_ELECT',$padrino->correo_elect,['class' => 'form-control','placeholder' => 'Max 50 caracteres | Min. 8 caracteres','minlength'=>"8",'maxlength'=>"50"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CVE_GRADO_ESTUDIO','* Grado de estudios') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										<select class="form-control m-bot15" name="CVE_GRADO_ESTUDIO" id="select_dep" required>									
	            							@foreach($estudio as $est)
	            								@if($est->cve_grado_estudios == $padrino->cve_grado_estudio)
	            									<option name="CVE_GRADO_ESTUDIO" id="clasificgob" value="{{ $est->cve_grado_estudios }}" selected>{{ $est->grado_estudios }}</option>
	            								@else
	            									<option name="CVE_GRADO_ESTUDIO" id="clasificgob" value="{{ $est->cve_grado_estudios }}">{{ $est->grado_estudios }}</option>
	            								@endif
	            							@endforeach
										</select>
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('MUNICIPIO','* Municipio donde vive') !!}
									</div>
									<div class="col-md-4 offset-md-0">
										<select class="form-control m-bot15" name="MUNICIPIO" id="select_dep" required>									
	            							@foreach($municipio as $mun)
	            								@if($mun->municipioid == $padrino->cve_municipio)
	            									<option name="MUNICIPIO" id="clasificgob" value="{{ $mun->municipioid }}" selected>{{ $mun->municipionombre }}</option>
	            								@else
	            									<option name="MUNICIPIO" id="clasificgob" value="{{ $mun->municipioid }}">{{ $mun->municipionombre }}</option>
	            								@endif
	            							@endforeach
										</select>
									</div>	
								</div>
								<br>
								<div class="justify-content-center">
									<div class="mol-md-8">
										<div class="card">
											<div class="card-header justify-content-center  text-md-center">{{ 'DATOS LABORALES' }}</div>
										</div>
									</div>
								</div>
								<br>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('UNIDAD','* Unidad Administrativa /Organismo, empresa u otro') !!}
									</div>
									<div class="col-md-5 offset-md-0">
										<select class="form-control m-bot15" name="UNIDAD" id="select_dep" required>									
	            							@foreach($gob as $gb)
	            								@if($gb->estrucgob_id == $padrino->estrucgob_id)
	            									<option name="UNIDAD" id="clasificgob" value="{{ $gb->estrucgob_id }}" selected>{{ $gb->estrucgob_desc}}</option>
	            								@else
	            									<option name="UNIDAD" id="clasificgob" value="{{ $gb->estrucgob_id }}">{{ $gb->estrucgob_desc }}</option>
	            								@endif
	            							@endforeach
										</select>
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('UNIDAD_ADMIN','Departamento, área u otro') !!}
									</div>
									<div class="col-md-5 offset-md-0">
										{!! Form::text('UNIDAD_ADMIN',$padrino->unidad_admin,['class' => 'form-control','placeholder' => '80 caracteres','minlength'=>"8",'maxlength'=>"80"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('CARGO','Cargo') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										{!! Form::text('CARGO',$padrino->cargo,['class' => 'form-control','placeholder' => 'Max. 80 caracteres','minlength'=>"5",'maxlength'=>"80"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('DIRECCION_LAB','Dirección laboral') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										{!! Form::text('DIRECCION_LAB',$padrino->direccion_lab,['class' => 'form-control','placeholder' => 'Max. 100 caracteres | Min. 4 caracteres','minlength' => '4','maxlength' => '100']) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('LADA_LAB','Lada') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										{!! Form::text('LADA_LAB',$padrino->lada_lab,['class' => 'form-control','placeholder' => 'Max. 3 dígitos | Min. 2 dígitos','minlength'=>"2",'maxlength'=>"3"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('TELEFONO_LAB','Teléfono') !!}
									</div>
									<div class="col-md-3 offset-md-0">
										{!! Form::text('TELEFONO_LAB',$padrino->telefono_lab,['class' => 'form-control','placeholder' => '7 dígitos' ,'required','minlength'=>"7",'maxlength'=>"7"]) !!}
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('MUNICIPIO','* Municipio donde labora') !!}
									</div>
									<div class="col-md-5 offset-md-0">
										<select class="form-control m-bot15" name="MUNICIPIO" id="select_dep" required>									
	            							@foreach($municipio as $mun)
	            								@if($mun->municipioid == $padrino->cve_municipio_lab)
	            									<option name="MUNICIPIO" id="clasificgob" value="{{ $mun->municipioid }}" selected>{{ $mun->municipionombre }}</option>
	            								@else
	            									<option name="MUNICIPIO" id="clasificgob" value="{{ $mun->municipioid }}">{{ $mun->municipionombre }}</option>
	            								@endif
	            							@endforeach
										</select>
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('N_PERIODO','* Periodo fiscal') !!}
									</div>
									<div class="col-md-5 offset-md-0">
										<select class="form-control m-bot15" name="N_PERIODO" id="select_dep" required>									
	            							@foreach($periodo as $per)
	            								@if($per->n_periodo == $padrino->n_periodo)
	            									<option name="N_PERIODO" id="clasificgob" value="{{ $per->n_periodo }}" selected>{{ $per->comentario_1 }}</option>
	            								@else
	            									<option name="N_PERIODO" id="clasificgob" value="{{ $per->n_periodo }}">{{ $per->comentario_1 }}</option>
	            								@endif
	            							@endforeach
										</select>
									</div>	
								</div>

								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('OBS','Observaciones') !!}
									</div>
									<div class="col-md-6 offset-md-0">
										{!! Form::text('OBS',$padrino->obs,['class' => 'form-control','placeholder' => 'Max. 240 caracteres. Omitir comillas simples o comillas dobles, etc.','maxlength'=>"240"]) !!}
									</div>	
								</div>

								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-8">
										{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
										<a href=" {{ route('padrino.create') }}" class="btn btn-danger">Cancelar</a>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        startDate: "01/01/1900",
        endDate: "31/12/2000",
        startView: 2,
        maxViewMode: 2,
        clearBtn: true,
        language: "es",
        autoclose: true
    });
</script>

	{!! Form::close() !!}
@endsection