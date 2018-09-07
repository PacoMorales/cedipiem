@extends('main')

@section('title','Apadrina un Niño Indígena')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header text-md-left" style="color: purple;">{{ 'APADRINA UN NIÑO INDÍGENA' }}</div>
							<div class="card-body">
						 		@csrf
						 		<div class="justify-content-center">
									<div class="mol-md-0">
										<div class="card">
											<div class="card-header">
												<div class = "form-group  justify-content-center  text-md-center row">
													<a href="{{ route('padrino.crear-nuevo') }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Regístrate aquí</a>
												</div>
												<div class = "form-group row">
													<div class="col-md-12 col-form-label text-md-center">
														{!! Form::label('O','o') !!}
													</div>	
												</div>
						 						<div class = "form-group  justify-content-center  text-md-center row">
						 							<a href="{{ route('padrino.inicio-login') }}" class="btn btn-info"><i class="fa fa-address-card"></i> Ver mi info</a>
						 						</div>
											</div>
										</div>
									</div>
								</div>
						 	</div>
						</div>
						<br><div class = "form-group  justify-content-center  text-md-center row">
							<a href="#" onclick="window.open('http://cedipiem.edomex.gob.mx/aviso_de_priacidad');"><i class="fa fa-info-circle"></i> Aviso de privacidad</a>
						 </div>
					</div>
				</div>
			</div>
		</div>
@endsection