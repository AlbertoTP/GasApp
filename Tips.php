<?PHP  session_start();
if(!isset($_SESSION['Uid']))
      header("Location:IniciarSesion.php");	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gas App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/style0.css">
  <style>
  a:link {
	    color: #FFF;
	    background-color: transparent;
    	text-decoration: none;
   }
   a:visited {
	    color: #FFF;
	    background-color: transparent;
    	text-decoration: none;
   }
   a:hover {
    	color: #FFF;
	    background-color: transparent;
    	text-decoration: none;
   }
   a:active {
		color: #FFF;
		background-color: transparent;
   }
  </style>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="Usuario.php" class="navbar-brand">Gas App</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<li><a href="Usuario.php">Mapa</a></li>
        <li><a href="Autos.php">Calculadora</a></li>
        <li><a href="Tips.php">Tips</a></li>
        <li><a href="Contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="funciones/Desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
	<div class="row">
    	<div class="col-xs-7 col-sm-7 col-md-8 col-lg-10">
	        <h2>Tips</h2>
			<h4>Con estos trucos vas a poder ahorrar hasta un 20% en combustible</h4>
        </div>
    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-2">
             <img class="img-responsive" src="img/logo3.png" alt="Gas App">
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- desplazamientos cortos -->
    <div class="panel-group">
      <div class="panel panel-default">
        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body">
          	<div id="carr1" class="container-fluid">
                <h2><i class="fa fa-building-o logo-small"></i> Lo recomendable para cortos desplazamientos:</h2>
                <div id="myCarousel1" class="carousel slide text-center" data-ride="carousel" data-interval="100000">
                <!-- Indicadores -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel1" data-slide-to="1"></li>
                  <li data-target="#myCarousel1" data-slide-to="2"></li>
                  <li data-target="#myCarousel1" data-slide-to="3"></li>
		  <li data-target="#myCarousel1" data-slide-to="4"></li>
                </ol>
            
                <!-- Slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <h4><strong>Apague el motor</strong> si va a estar <strong>parado más de un minuto.</strong></h4>
                  </div>
                  <div class="item">
                    <h4>Intente no realizar <strong>movimientos bruscos, como acelerones o frenazos.</strong></h4>
                  </div>
                  <div class="item">
                    <h4>Utilice siempre que pueda la <strong>velocidad más alta (considerando el límite de velocidad).</strong><br>
                    En primera deberían ser unos 2 segundos ya que es la velocidad que más consume.</h4>
                  </div>
                  <div class="item">
                    <h4>No use el aire acondicionado al menos que este a más de 90 km.</h4>
                  </div>
		  <div class="item">
                    <h4>Maneje a la <strong>velocidad límite</strong>, debido a que los <strong>semáforos</strong> están <strong>sincronizados con el límite de velocidad.</strong><br>
                    Si vas más rápido de lo necesario, estarás deteniéndote y arrancando nuevamente, lo que afecta el ahorro de gasolina.</h4>
                  </div>
                </div>
            
                <!-- Controles -->
                <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
		<div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1"><i class="fa fa-building-o logo-small2"></i>  En desplazamientos cortos por ciudad:</a>
          </h4>
        </div>
      </div>
    </div>
    
    <!-- desplazamientos largos -->
     <div class="panel-group">
      <div class="panel panel-default">
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
          	<div id="carr2" class="container-fluid">
                <h2><i class="fa fa-road logo-small"></i> Lo recomendable para largos desplazamientos:</h2>
                <div id="myCarousel2" class="carousel slide text-center" data-ride="carousel" data-interval="100000">
                <!-- Indicadores -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel2" data-slide-to="1"></li>
                  <li data-target="#myCarousel2" data-slide-to="2"></li>
                  <li data-target="#myCarousel2" data-slide-to="3"></li>
                  <li data-target="#myCarousel2" data-slide-to="4"></li>
                  <li data-target="#myCarousel2" data-slide-to="5"></li>
                  <li data-target="#myCarousel2" data-slide-to="6"></li>
                  <li data-target="#myCarousel2" data-slide-to="7"></li>
		  <li data-target="#myCarousel2" data-slide-to="8"></li>
                </ol>
            
                <!-- Slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <h4><strong>Presión en los neumáticos,</strong> cuida mucho que tengan la <strong>presión correcta.</strong><br>
                    Si están bajos aumenta considerablemente el consumo del combustible.<br>
                    Puedes optar por <strong>neumáticos ecológicos</strong> que <strong>consumen menos.</strong></h4>
                  </div>
                  <div class="item">
                    <h4><strong>Acelera de forma gradual,</strong> e intenta mantener siempre una velocidad de 90km a 120 km.</h4>
                  </div>
                  <div class="item">
                    <h4>Lo ideal es siempre tener entre 1500 y 2500 revoluciones.</h4>
                  </div>
                  <div class="item">
                    <h4>Use el <strong>aire acondicionado</strong> a más de <strong>90 km en vez de las ventanillas abiertas.</strong></h4>
                  </div>
                  <div class="item">
                    <h4>Cuidado con el <strong>exceso de aire acondicionado,</strong> lo <strong>ideal es 22°c.</strong></h4>
                  </div>
                  <div class="item">
                    <h4>Saque los objetos innecesarios para el viaje, el <strong>peso</strong> y la <strong>resistencia</strong> en aerodinámica hace <strong>aumentar el gasto de combustible.</strong></h4>
                  </div>
                  <div class="item">
                    <h4><strong>Revise el coche,</strong> si está en malas condiciones o en mal estado, el consumo se dobla y contaminamos mucho más.</h4>
                  </div>
                  <div class="item">
                    <h4><strong>Frene suavemente,</strong> cambiando las velocidades lo más tarde posible y siempre que puedas detén el coche sin cambiar la velocidad.</h4>
                  </div>
		   <div class="item">
                    <h4>Elimine el exceso de peso, <strong>la sobrecarga</strong> del vehículo puede <strong>aumentar más de 4% de consumo.</strong></h4>
                  </div>
                </div>
            
                <!-- Controles -->
                <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
		<div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse2"><i class="fa fa-road logo-small2"></i>  Para largos desplazamientos:</a>
          </h4>
        </div>
      </div>
    </div>
    
    <!-- desplazamiento general -->
    <div class="panel-group">
      <div class="panel panel-default">
        <div id="collapse3" class="panel-collapse collapse">
          <div class="panel-body">
          	<div id="carr3" class="container-fluid">
                <h2><i class="fa fa-tachometer logo-small"></i> Lo recomendable para cualquier desplazamiento:</h2>
                <div id="myCarousel3" class="carousel slide text-center" data-ride="carousel" data-interval="100000">
                <!-- Indicadores -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel3" data-slide-to="1"></li>
		  <li data-target="#myCarousel3" data-slide-to="2"></li>
		  <li data-target="#myCarousel3" data-slide-to="3"></li>
		  <li data-target="#myCarousel3" data-slide-to="4"></li>
		  <li data-target="#myCarousel3" data-slide-to="5"></li>
		  <li data-target="#myCarousel3" data-slide-to="6"></li>
		  <li data-target="#myCarousel3" data-slide-to="7"></li>
		  <li data-target="#myCarousel3" data-slide-to="8"></li>
                </ol>
            
                <!-- Slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <h4>Busca el <strong>camino más corto</strong> y/o con <strong>menos trafico,</strong> y use los mapas/GPS para no perderte.</h4>
                  </div>
                  <div class="item">
                    <h4>A <strong>menos de 90 km,</strong> mejor las <strong>ventanillas bajadas</strong> que el aire acondicionado.</h4>
                  </div>
	          <div class="item">
                    <h4>Evite conducir <strong>cerca</strong> de otro auto y pisar constantemente el freno, esta aceleración y frenado constante consume más combustible. Conduzca de manera <strong>constante</strong> y a una <strong>distancia segura.</strong></h4>
                  </div>
		  <div class="item">
                    <h4><strong>Acelere lentamente,</strong> si aumenta rápidamente la velocidad después de detenerte quemas combustible adicional y aumentas el <strong>desgaste de los neumáticos.</strong></h4>
                  </div>
		  <div class="item">
                    <h4>Estaciónate en la <strong>sombra,</strong> mientras más <strong>frío</strong> esté tu auto, menos gasolina se <strong>evaporará</strong> del tanque.</h4>
                  </div>
		  <div class="item">
                    <h4><strong>Afine el motor</strong> y con su <strong>servicio general</strong> como <strong>filtros de aire y aceite,</strong> mejorarán el consumo de combustible.</h4>
                  </div>
		  <div class="item">
                    <h4>Utilize <a data-toggle="tooltip" title="Ahorradores de combustible para autos">aditamentos para gasolina</a>, permiten que el combustible fluya sin problemas dentro del motor y <strong>aumente su eficiencia.</strong></h4>
                  </div>
		  <div class="item">
                    <h4><strong>Aprovecha las bajadas,</strong> Los descensos te permiten ahorrar el consumo de gasolina.<br>
                    Aprovecha la inercia para el cambio de velocidades circulando a bajas revoluciones.<br>
                    En las <strong>subidas, retrase el cambio de velocidad,</strong> incrementando la presión sobre el acelerador, aunque nunca pisando a fondo.</h4>
                  </div>
		  <div class="item">
                    <h4>Usa el <a data-toggle="tooltip" title="Porcentaje de octano que contiene la gasolina">octanaje</a> correcto, el vehículo funciona más eficientemente con el <a data-toggle="tooltip" title="Porcentaje de octano que contiene la gasolina">octanaje</a> indicado en la guía del propietario.</h4>
                  </div>
                </div>
            
                <!-- Controles -->
                <a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
		<div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse3"><i class="fa fa-tachometer logo-small2"></i>  Cualquier desplazamiento:</a>
          </h4>
        </div>
      </div>
    </div>
    
    <!-- llenar el tanque -->
    <div class="panel-group">
      <div class="panel panel-default">
        <div id="collapse4" class="panel-collapse collapse">
          <div class="panel-body">
          	<div id="carr4" class="container-fluid">
				<h2><i class="fa fa-tint logo-small"></i> Lo recomendable para la carga de combustible:</h2>
                <div id="myCarousel4" class="carousel slide text-center" data-ride="carousel" data-interval="100000">
                <!-- Indicadores -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel4" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel4" data-slide-to="1"></li>
                  <li data-target="#myCarousel4" data-slide-to="2"></li>
		  <li data-target="#myCarousel4" data-slide-to="3"></li>
                </ol>
            
                <!-- Slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <h4>Busque las <strong>gasolineras más baratas y con mejor reputación.</strong><br>
                    Elígelas mientras no este lejos.</h4>
                  </div>
                  <div class="item">
                    <h4>Eche gasolina por las <strong>mañanas o en bajas temperaturas,</strong> la gasolina está más densa y supone mayor cantidad al cargar.</h4>
                  </div>
                  <div class="item">
                    <h4>Llene el tanque <strong>antes de que esté por la mitad,</strong> porque así no tiene tanto aire y evita la evaporación del combustible. Gasta mucho menos que siempre medio vacío o en reserva.</h4>
                  </div>
		  <div class="item">
                    <h4>No llene el tanque cuando estén <strong>rellenando la gasolinera,</strong> se remueve el combustible restante junto con los sedimentos del fondo, con lo que corremos el riesgo de echar un <strong>combustible sucio.</strong></h4>
                  </div>
                </div>
            
                <!-- Controles -->
                <a class="left carousel-control" href="#myCarousel4" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel4" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
		<div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse4"><i class="fa fa-tint logo-small2"></i>  Trucos en la carga de combustible:</a>
          </h4>
        </div>
      </div>
    </div>
</div>

</body>
</html>