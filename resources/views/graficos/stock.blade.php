<!-- index.blade.php -->

<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Beneficiarios por Región</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    </head>
    <body>
      <div class="row">
       <div class="col-md-11 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading"><b>Gráfica de Beneficiarios por Región</b></div>
               <div class="panel-body">
                   <canvas id="canvas" height="450" width="980"></canvas>
               </div>
           </div>
       </div>
     </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script>
        //var url = "{{url('sedesem/ver/graficos')}}";
        var url = "{{ route('stock') }}";
        //var Years = new Array();
        //var Labels = new Array();
        //var Prices = new Array();
        var ids = new Array();
        var regiones = new Array();
        var total = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            //var i = 0;
            response.forEach(function(data){
                //alert('');
                //alert('Posicion ['+i+'] - Region: '+data[0].region);
                //alert('Posicion ['+i+'] - Total: '+data[0].total);
                //Years.push(data.stockYear);
                //Labels.push(data.stockName);
                //Prices.push(data.stockPrice);
                ids.push(data[0].ide);
                regiones.push(data[0].region);
                total.push(data[0].total);
                //i++;
                //alert('Regiones: '+regiones);
                //alert('Totales: '+total);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'horizontalBar',
                  data: {
                      //labels:Years,
                      //labels:[ids[0],ids[1]],
                      labels:[regiones[0],regiones[1],regiones[2],regiones[3],regiones[4],regiones[5],regiones[6],regiones[7],regiones[8],regiones[9],regiones[10],regiones[11],regiones[12],regiones[13],regiones[14],regiones[15],regiones[16],regiones[17],regiones[18],regiones[19]],
                      //labels:regiones,
                      datasets: [{
                          label: 'Beneficiarios por Regiones',
                          //data: Prices,
                          data: total,
                          backgroundColor: [
                            'rgba(0, 99, 132, 0.6)',
                            'rgba(15, 99, 132, 0.6)',
                            'rgba(30, 99, 132, 0.6)',
                            'rgba(45, 99, 132, 0.6)',
                            'rgba(60, 99, 132, 0.6)',
                            'rgba(75, 99, 132, 0.6)',
                            'rgba(90, 99, 132, 0.6)',
                            'rgba(105, 99, 132, 0.6)',
                            'rgba(120, 99, 132, 0.6)',
                            'rgba(135, 99, 132, 0.6)',
                            'rgba(150, 99, 132, 0.6)',
                            'rgba(165, 99, 132, 0.6)',
                            'rgba(180, 99, 132, 0.6)',
                            'rgba(195, 99, 132, 0.6)',
                            'rgba(210, 99, 132, 0.6)',
                            'rgba(225, 99, 132, 0.6)',
                            'rgba(240, 99, 132, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(270, 99, 132, 0.6)',
                            'rgba(285, 99, 132, 0.6)'],
                          borderColor: [
                            'rgba(0, 99, 132, 1)',
                            'rgba(15, 99, 132, 1)',
                            'rgba(30, 99, 132, 1)',
                            'rgba(45, 99, 132, 1)',
                            'rgba(60, 99, 132, 1)',
                            'rgba(75, 99, 132, 1)',
                            'rgba(90, 99, 132, 1)',
                            'rgba(105, 99, 132, 1)',
                            'rgba(120, 99, 132, 1)',
                            'rgba(135, 99, 132, 1)',
                            'rgba(150, 99, 132, 1)',
                            'rgba(165, 99, 132, 1)',
                            'rgba(180, 99, 132, 1)',
                            'rgba(195, 99, 132, 1)',
                            'rgba(210, 99, 132, 1)',
                            'rgba(225, 99, 132, 1)',
                            'rgba(240, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(270, 99, 132, 1)',
                            'rgba(285, 99, 132, 1)',
                          ],
                          borderWidth: 2,
                          hoverBorderWidth: 0
                          //backgroundColor: ['red','blue','green','gray','yellow','orange','brown','pink','purple','silver','red','blue','green','gray','yellow','orange','brown','pink','purple','silver']
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
        </script>
    </body>
</html>