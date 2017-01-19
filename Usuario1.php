<?PHP  session_start();
if(!isset($_SESSION['Uid']))
      header("Location:IniciarSesion.php");
?>
<?php
	require_once("funciones/Calificar.php");
    $prom = "";
	for($i=1; $i<=mysqli_num_rows(BDaMaps()); $i++){
           $prom=$prom.strval( imgPromedio2( promedioGasolinera($i) ) )." ";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gas App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style0.css">
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- NavBar -->
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
        <li><a href="Calculadora.php">Calculadora</a></li>
        <li><a href="Tips.html">Tips</a></li>
        <li><a href="Contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="funciones/Desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--
<div class="container-fluid">
	<h1>Bienvenido: <?PHP  echo $_SESSION['Unombre']; ?><br></h1>
    <a href="gasolinera.php?gas=1"> Gasolinera1 </a>
</div>
-->
<br></br>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
    	<!-- Modal content-->
               	<p align="right"><button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button><br></p>
      	<img class="img-responsive" src="img/quicktutorial.png">
    </div>
</div>
<!-- Fin Modal -->

<!-- Se determina y escribe la localizacion -->
<script type="text/javascript">
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(mostrarUbicacion);
	} else {alert("¡Error! Este navegador no soporta la Geolocalización.");}
function mostrarUbicacion(position) {
    var times = position.timestamp;
	var latitud = position.coords.latitude;
	var longitud = position.coords.longitude;
    var altitud = position.coords.altitude;	
	var exactitud = position.coords.accuracy;	
	var div = document.getElementById("ubicacion");
<!--	div.innerHTML = "Timestamp: " + times + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud + "<br>Altura en metros: " + altitud + "<br>Exactitud: " + exactitud;}	-->
function refrescarUbicacion() {	
	navigator.geolocation.watchPosition(mostrarUbicacion);}	
</script>
<!-- Se escribe un mapa con la localizacion anterior-->
<div id="demo"></div>
<div id="mapholder"></div>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDE5NMXt8QOjzu0lAdgN-INsjAad9uf5vA&sensor=false"></script>
<!--<button onclick="cargarmap()">Cargar mapa</button>-->
<script type="text/javascript">
var x=document.getElementById("demo");

function cargarmap(){
navigator.geolocation.getCurrentPosition(showPosition,showError);
var gasList = [
<?php
$consulta=BDaMaps();
while($row = mysqli_fetch_array($consulta)){
	echo '{"latlng":[';
	echo $row["Latitud"],",",$row["Longitud"];
	echo '],name:"';
	echo $row["NGasolinera"];
	echo '",info:"gasolinera.php?gas=';
	echo $row["IDGasolinera"];
	echo '"},';
}
?>
];
var infoWnd;
var gdir;
var geocoder;
var infoCliente;
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='91%';
  mapholder.style.width='100%';
  var myOptions={
  center:latlon,zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,icon: "img/pos.png"});
  var gas, i, latlng;

  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer({
          draggable: true,
          map: map,
          panel: document.getElementById('right-panel')
        });
  directionsDisplay.setOptions( { suppressMarkers: true } );

  var tempLatLng={lat: lat, lng: lon};
  infoCliente=":v"
  geocoder = new google.maps.Geocoder(); 
  geocoder.geocode({'location':tempLatLng}, function(results, status) {
    //infoCliente=results[1].formatted_address//":v"
    //infoCliente=results[0].address_components[1].long_name
	infoCliente=results[0].formatted_address
	//infoCliente=lat+","+lon
  });
  

  //Creates a infowindow object.
  infoWnd = new google.maps.InfoWindow();

   //var title=":v"
   google.maps.event.addListener(marker, "click", function(){
      infoWnd.setContent("<strong>"+infoCliente+"</title>");
      infoWnd.open(map, marker);
    });
  var gas, i, latlng, info, infoD, total, ttotal;
  var markerI = []<!--[gasList.length];-->
  
  //directionsDisplay.addListener('directions_changed', function() {
  //        computeTotalDistance(directionsDisplay.getDirections());
  //      });
  //<?php $indice=0;?>;
  var HP="<?php echo $prom;?>";
  //alert(HP)
  temp=""
  var iconos=[];
  var nI=0;
  for (j in HP){
	if (HP[j] != ' '){
		temp=temp+HP[j];
        }
	else{
		//alert(temp)
		iconos[nI]=temp;
		nI=nI+1;
		temp=""
	}
  }
  for (i in gasList) {
    //Creates a marker
    
    gas = gasList[i];
    latlng = new google.maps.LatLng(gas.latlng[0], gas.latlng[1]);
    markerI = new google.maps.Marker({
      position : latlng,
      map : map,
      title : gas.name,
      //icon: "img/gas0.png"
      icon: iconos[i]
     });
    google.maps.event.addListener(markerI, 'click', (function(markerI, i) {
          return function() {
            displayRoute(lat+","+lon, gasList[i].latlng[0]+","+gasList[i].latlng[1], directionsService,directionsDisplay);
            total = 0;
	    ttotal = 0;
            infoD=" ";
            var request = {
    		 	origin:lat+","+lon,
		        destination:gasList[i].latlng[0]+","+gasList[i].latlng[1],
		        travelMode: google.maps.TravelMode.DRIVING
	      };
              directionsService.route(request, function(result, status) {
                  if (status == google.maps.DirectionsStatus.OK) {
				
                              	var myroute = result.routes[0];
				//alert(myroute.legs[0].duration_in_traffic.value);
      				for (var k = 0; k < myroute.legs.length; k++) {
					  ttotal += myroute.legs[k].duration.value;
				          total += myroute.legs[k].distance.value;
			        }
			        total = total / 1000;
				ttotal = ttotal / 60;
                                infoD="<br>Esta a "+total.toFixed(2)+" km. de su lugar actual.<br>Llega aproximadamente en "+ttotal.toFixed(0)+" minutos"
                                info="<a href="+gasList[i].info+">Consultar informacion</a>"
		                infoWnd.setContent("<strong>"+gasList[i].name+"</title><br>"+info+infoD); 
		                infoWnd.open(map, markerI);
			        //alert(total);
                       		//computeTotalDistance(result);
                     }
              });
	      
	    
          }
        })(markerI, i));
  }
	
  }
function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="La información de la localización no esta disponible."
      break;
    case error.TIMEOUT:
      x.innerHTML="El tiempo de petición ha expirado."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Ha ocurrido un error desconocido."
      break;
    }
  }}

      function displayRoute(origin, destination, service, display) {
        service.route({
          origin: origin,
          destination: destination,
          //waypoints: [{location: 'Puebla, Mexico'}, {location: 'Puebla, Mexico'}],
          travelMode: 'DRIVING',
          avoidTolls: true
          //icon: "vacio.png"
        }, function(response, status) {
          if (status === 'OK') {
            display.setDirections(response);
          } else {
            alert('Could not display directions due to: ' + status);
          }
        });
      }

     function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        alert(total);
        //document.getElementById('total').innerHTML = total + ' km';
      }
    
google.maps.event.addDomListener(window, 'load', cargarmap);
</script>
<script> <!-- Modal -->
$(document).ready(function(){
        $("#myModal").modal("show");
});
</script>

</body>
</html>