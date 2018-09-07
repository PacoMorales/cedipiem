@extends('main')

@section('title','Ver mi info')

@section('header')
@endsection

@section('content')

	{!! Form::open(['route' => 'padrino.login-app', 'method' => 'POST']) !!}
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header text-md-center" style="color: gray;"><div>{!! $programa->programa !!}</div><i class="fa fa-lock"></i> {{ 'VER MI INFO' }}</div>
						<div class="card-body">
							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_PADRINO','* Clave de Padrino:') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('CVE_PADRINO',null,['class' => 'form-control','placeholder' => 'Clave de Padrino' ,'required','maxlength' => '50']) !!}
								</div>
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('RFC','* RFC:') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('RFC',null,['class' => 'form-control','placeholder' => 'RFC','required','maxlength' => '30']) !!}
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
									{!! Form::submit('Iniciar',['class' => 'btn btn-success']) !!}
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