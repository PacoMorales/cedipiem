<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nivel Escolar por Región</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    </head>
    <body>
      <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header text-md-center" style="color: gray;"><i class="fa fa-user"></i> {{ 'Niveles escolares por Región' }}</div>
             {!! Form::open(['route' => 'nivelescolar', 'method' => 'GET']) !!} 
              @csrf   
              <div class="card-body">
                <div class = "form-group row">
                  <div class="col-md-6 col-form-label text-md-right">
                    {!! Form::label('periodo','Periodo: ') !!}
                  </div>
                  <div class="col-md-3 offset-md-0">
                    <select class="form-control m-bot15" name="periodo">
                              <option name="1" id="1" value="2018">2018</option>
                    </select>
                  </div>  
                </div>

                <div class = "form-group row">
                  <div class="col-md-6 col-form-label text-md-right">
                    {!! Form::label('programa','Programa:') !!}
                  </div>
                  <div class="col-md-3 offset-md-0">
                    <select class="form-control m-bot15" name="programa">                 
                              <option name="13" id="13" value="13">FAMILIAS FUERTES NIÑEZ INDIGENA</option>
                    </select>
                  </div>
                </div>

                <div class = "form-group row">
                  <div class="col-md-6 col-form-label text-md-right">
                    {!! Form::label('mes','Nómina del mes:') !!}
                  </div>
                  <div class="col-md-3 offset-md-0">
                    <select class="form-control m-bot15" name="mes">
                              <option name="6" id="6" value="6">Junio</option>
                    </select>
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
                    {!! Form::submit('Generar gráfica',['class' => 'btn btn-success']) !!}
                  </div>
                </div>
              {!! Form::close() !!}
              <!--</form>-->
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>