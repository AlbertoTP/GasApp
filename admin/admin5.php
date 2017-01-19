<?PHP  session_start();
if(!isset($_SESSION['Uid']))
      header("Location:IniciarSesion.php");
//echo $_SESSION['Unombre'];
require_once("../funciones/ValidarDatos.php");
if(!isAdmin($_SESSION['Unombre'])){
	header("Location:../Usuario.php");
}
?>
<?php
$nombre="";
$direccion="";
$estado="";
$municipio="";
$latitud="";
$longitud="";
$td="";
$tm="";
$tp="";
if(isset($_POST["Enviar"])) {
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$estado = $_POST['estado'];
		$municipio = $_POST['municipio'];
		$latitud = $_POST['latitud'];
		$longitud = $_POST['longitud'];
		$td = $_POST['td'];
		$tm = $_POST['tm'];
		$tp = $_POST['tp'];
		require_once("../funciones/administra.php");
		if(anadirGasolinera($nombre,$direccion,$estado,$municipio,$latitud,$longitud,$td,$tm,$tp))
			header("Location:admin2.php");
		else
			header("Location:admin5.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administracion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="../css/style0.css">
  <link rel="stylesheet" href="../css/style2.css">
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
      <a class="navbar-brand" href="#">Admin <?PHP  echo $_SESSION['Unombre']; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="admin1.php"><i class="fa fa-comment"></i> Comentarios</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="admin2.php"><i class="fa fa-tint"></i> Gasolineras
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin2.php"><span class="glyphicon glyphicon-th-list"></span> Ver todas</a></li>
          <li><a href="admin3.php"><span class="glyphicon glyphicon-repeat"></span> Actualizar Tarifas</a></li>
          <li><a href="admin4.php"><span class="glyphicon glyphicon glyphicon-search"></span> Buscar Gasolinera</a></li>
          <li><a href="admin5.php"><span class="glyphicon glyphicon-plus"></span> Añadir nueva</a></li>
        </ul>
      </li>
        <li><a href="../funciones/Desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid bg-gray">
<h2><span class="glyphicon glyphicon-plus logo-small"></span> Añadir nueva Gasolinera:</h2>
<h3>
<fieldset>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="input">
	<input type="text" name = "nombre" maxlength=50 value="<?php echo $nombre?>" placeholder="Nombre Gasolinera" required />
</div>
<div class="input">
	<input type="text" name = "direccion" maxlength=80 value="<?php echo $direccion?>" placeholder="Dirección" required />
</div>
<div class="input">
	<input type="text" name = "estado" maxlength=18 value="<?php echo $estado?>" placeholder="Estado" required />
</div>
<div class="input">
	<input type="text" name = "municipio" maxlength=18 value="<?php echo $municipio?>" placeholder="Municipio" required />
</div>
<div class="input">
	<input type="text" name = "latitud" value="<?php echo $latitud?>" placeholder="Latitud" required />
</div>
<div class="input">
	<input type="text" name = "longitud" value="<?php echo $longitud?>" placeholder="Longitud" required />
</div>
<div class="input">
	<input type="text" name = "td" value="<?php echo $td?>" placeholder="Tarifa Diesel" required />
</div>
<div class="input">
	<input type="text" name = "tm" value="<?php echo $tm?>" placeholder="Tarifa Magna" required />
</div>
<div class="input">
	<input type="text" name = "tp" value="<?php echo $tp?>" placeholder="Tarifa Premium" required />
</div>
<p align="right"><button type="submit" class="btn btn-lg btn-success" name = "Enviar" value ="Enviar" ><span class="glyphicon glyphicon-plus"></span> Añadir</button></p>
</form>
</fieldset>
</div>

</body>
</html>