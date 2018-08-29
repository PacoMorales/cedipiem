@extends('main')

@section('title','Iniciar Sesión')

@section('header')
@endsection

@section('content')

	{!! Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><i class="fa fa-lock"></i> {{ 'ACCESO AL SISTEMA' }}</div>
						<div class="card-body">
							<!--<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('FOLIO','* Folio de la tarjeta') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									<input type="text" class="form-control" name="FOLIO" value="{{ old('FOLIO') }}" placeholder="FOLIO" required maxlength="6">
									
								</div>	
							</div>-->

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('LOGIN','Cuenta de Usuario') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('LOGIN',null,['class' => 'form-control','placeholder' => 'Cuenta de Usuario' ,'required','maxlength' => '50']) !!}
								</div>
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('PASSWORD','Contraseña') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::password('PASSWORD',['class' => 'form-control','placeholder' => 'Constraseña','required','maxlength' => '30']) !!}
								</div>
							</div>

								<div class="alert alert-danger" role="alert">
									<ul>
											<li>Tu sesión ha expirado. Por favor, vuelve a iniciar sesión para continuar con las actividades.</li>
									</ul>
								</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-5">
									{!! Form::submit('Entrar',['class' => 'btn btn-success']) !!}
								</div>
							</div>
							<br>
							<!--<div class="form-group row">
                            	<div class="col-md-12 offset-md-0">
                                	<div class="form-check">-->
                                    	<!--<label class="form-check-label" for="siguenos">
                                        	Al registrarte estás participando en la rifa de premios para tí. Consulta nuestras redes sociales.
                                    	</label>-->
                                    	<!--<div class="col-md-0 offset-md-5">
                                    		<button class="btn btn-info" onclick="window.open('https://twitter.com/imej_?lang=es');"><i class="fa fa-twitter"></i></button>
                                    		<button class="btn btn-primary" onclick="window.open('https://www.facebook.com/imej.edomex/');"><i class="fa fa-facebook"></i></button>-->
                                    		<!--<i class="fa fa-thumbs-up"></i>-->
                                    	<!--</div>
                                	</div>
                            	</div>
                        	</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
@endsection