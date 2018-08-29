@extends('main')

@section('title','Padrinos')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'MANTENIMIENTO DEL DIRECTORIO DE PADRINOS' }}</div>
						 <!--<form method="POST" action="">-->
						 {!! Form::open(['route' => 'padrino.ver', 'method' => 'GET']) !!} 
						 	@csrf		
							<div class="card-body">
								<div class = "form-group row">
									<div class="col-md-5 col-form-label text-md-right">
										{!! Form::label('DEP','Dependencia, Organismo, Ayuntamiento u otro') !!}
									</div>
									<div class="col-md-4 offset-md-1">
										<select class="form-control m-bot15" name="select_dep" id="select_dep">									
	            							@foreach($clasificgob as $cl)
	            								<option name="clasificgob" id="clasificgob" value="{{ $cl->clasificgob_id }}">{{ $cl->clasificgob_desc }}</option>
	            							@endforeach
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