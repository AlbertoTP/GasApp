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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/style0.css">

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

<div class="container-fluid">
	<h1>Calculadora</h1>
</div>
</body>
</html>