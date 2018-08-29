@extends('main')

@section('title','Elige Sector del Padrino')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO AL DIRECTORIO DE PADRINOS' }}<div class="text-md-center" style="color:blue; ">{{'PROGRAMA GUBERNAMENTAL: '}}  {!! $programa->programa !!}</div></div>
							{!! Form::open(['route' => 'padrino.eligesec', 'method' => 'GET']) !!} 
						 	@csrf		
							<div class="card-body">
								<div class="form-group rpw">
									<div class="col-md-12 col-form-label text-md-center">
										{!! Form::label('TITULO','Elige el sector al que pertenece el nuevo padrino') !!}
									</div>
								</div>
								<div class = "form-group row">
									<div class="col-md-6 col-form-label text-md-right">
										{!! Form::label('DEP','Sector') !!}
									</div>
									<div class="col-md-5 offset-md-0">
										<select class="form-control m-bot15" name="select_dep" id="select_dep" required>									
	            							@foreach($clasificgob as $cl)
	            								<option name="clasificgob" id="clasificgob" value="{{ $cl->clasificgob_id }}">{{ $cl->clasificgob_desc }}</option>
	            							@endforeach
										</select>
									</div>	
								</div>
										<div class = "form-group row">
											<div class="col-md-6 col-form-label text-md-right">
												{!! Form::label('DEPENDENCIA','Estructura Gubernamental') !!}
											</div>
											<div class="col-md-5 offset-md-0">
												<select class="form-control m-bot15" name="estruc" id="estruc">									
			            								<option value="">SELECCIONE ESTRUCTURA</option>
												</select>
											</div>
											<!--<div class="col-md-6 offset-md-0">
												{!! Form::text('DEPENDENCIA',null,['class' => 'form-control','placeholder' => 'Dependencia']) !!}
											</div>-->
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
										{!! Form::submit('Continuar',['class' => 'btn btn-success']) !!}
										<!--<a href=" {{ route('padrino.ver') }}" class="btn btn-success">Mostrar</a>-->
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection