@extends('main')

@section('title','Menú')

@section('header')
@endsection

@section('content')
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header" style="color: red;"><h6>{{ 'FAMILIAS FUERTES NIÑEZ INDÍGENA' }}</h6></div>
							<div class="container">
							  <ul class="nav nav-pills nav-justified">
							    <li class="nav-item dropdown">
							      <a class="nav-link dropdown-toggle btn-success" data-toggle="dropdown" href="#">Catálogos</a>
							      <div class="dropdown-content">
							        <a class="dropdown-item" href="#">Dependencias, Organismos, Ayuntamientos, Iniciativa Privada...</a>
							        <a class="dropdown-item" href="#">Unidades Administrativas</a>
							        <a class="dropdown-item" href="#">Dependencias</a>
							        <a class="dropdown-item" href="{{ route('centro-trabajo.create') }}">Centros de Trabajo (Escuelas)</a>
							        <a class="dropdown-item" href="{{ route('padrino.create') }}">Padrinos</a>
							        <a class="dropdown-item" href="#">Procesos</a>
							        <a class="dropdown-item" href="#">Actividades</a>
							        <a class="dropdown-item" href="#">Transacciones del Sistema</a>
							        <a class="dropdown-item" href="#">Catalogo 3</a></div>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link active btn-info" href="#">Registro</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link active btn-info" href="#">Tableros de Control</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link active btn-info" href="#">Back Office del Sistema</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link active btn-info" href="#">Administración</a>
							    </li>
							    <!--<li class="nav-item dropdown">
							      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Dropdown</a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="#">Link 1</a>
							        <a class="dropdown-item" href="#">Link 2</a>
							        <a class="dropdown-item" href="#">Link 3</a></div>
							    </li>-->
							    <!--<li class="nav-item">
							      <a class="nav-link disabled" href="#">Disabled</a>
							    </li>-->
							  </ul>
							</div>

						<div class="card-body">
							<div class = "form-group row">
								<div class="col-md-11">
									<!--<div class="dropdown">
										<button class="dropbtn btn">Catálogos</button>
											<div class="dropdown-content">
									    		<a href="#">Catálogo 1</a>
									    		<a href="#">Catálogo 2</a>
									    		<a href="#">Catálogo 3</a>
									  		</div>
									</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection