@extends('main')

@section('title','Registro Exitoso Nuevo Padrino')

@section('header')
@endsection
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="card">
					<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'ALTA DE UN NUEVO PADRINO' }}
						<div class="text-md-center" style="color:brown; ">{{'PROGRAMA GUBERNAMENTAL: '}}  {!! $programa->programa !!}</div>
					</div>
					@csrf		
					<div class="card-body">
						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-2 text-md-center">
								<p>Ahora estarás en espera de que te den el visto bueno como un nuevo padrino por parte del programa social.</p>
								<p>Mantente al pendiente de tu correo electrónico. Ahí te llegará la confirmación de tu solicitud como un nuevo padrino.</p>
							</div>
							<div class="col-md-6 offset-md-5">
								<a href="{{route('padrino.inicio-app')}}" class="btn btn-success">Aceptar...</a>
							</div>

							<!--<div class="col-md-11 offset-md-1">
								<br><p>NOTA: Los datos han sido enviados a la cuenta de correo electrónico registrada por el usuario. En caso de no visualizarlo en la Bandeja de Entrada en 10 minutos, revisar la bandeja No Deseados.</p>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection