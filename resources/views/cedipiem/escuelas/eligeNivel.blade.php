@extends('main')

@section('title','Centros de Trabajo')

@section('header')
@endsection 

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO DEL CATALOGO DE CENTROS DE TRABAJO' }}</div>
						 <!--<form method="POST" action="">-->
						 {!! Form::open(['route' => 'centro-trabajo.ver', 'method' => 'GET']) !!} 
						 	@csrf		
							<div class="card-body">
								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('NIVEL_EDUC','Nivel Educativo: ') !!}
									</div>
									<div class="col-md-4 offset-md-1">
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
									</div>
								</div>
							{!! Form::close() !!}
							<!--</form>-->
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection