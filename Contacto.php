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

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="bg-gray">

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

<div id="contacto" class="container-fluid bg-gray">
  <h2 class="text-center">Contacto</h2>
  <div class="row">
    <div class="col-sm-5">
      <h6>Puedes comunicarte con nuestro equipo de trabajo para cualquier duda, comentario o sugerencia</h6>
      <p><span class="glyphicon glyphicon-map-marker logo-small"></span> Benemérita Universidad Autónoma de Puebla.<br>Av. San Claudio y 14 Sur, Cd Universitaria, 72592 Puebla, Pue.</p>
      <p><span class="glyphicon glyphicon-envelope logo-small"></span> <a href="mailto:gas-app@outlook.com?Subject=Mensaje_desde_pagina" target="_top"> Gas App</a></p>
      GasAppV.2.0
    </div>
    <div class="col-sm-7">
    <div id="googleMap" style="height:250px;width:100%;"></div>

    <!-- Google Maps -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDE5NMXt8QOjzu0lAdgN-INsjAad9uf5vA&sensor=false"></script>
    <script>
    var myCenter = new google.maps.LatLng(19.005349, -98.204703);
    function initialize() {
    var mapProp = {
      center:myCenter,
      zoom:15,
      scrollwheel:false,
      draggable:false,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({
      position:myCenter,
      });
    marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    </div>
  </div>
</div>
 <div class="container-fluid text-right bg-gray">
 	<h6><i>Derechos Reservados (c) <a href="Equipo.html">Equipo Desarrollador de Gas App</a> 2016</i></h6>
 </div>
</body>
</html>