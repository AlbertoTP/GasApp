<?PHP  session_start();
if(!isset($_SESSION['Uid']))
      header("Location:IniciarSesion.php");
<<<<<<< HEAD
else{
	require_once("funciones/Calificar.php");
	if (!puedeComentar($_SESSION['Uid']))
		header("Location:Usuario.php");
}
=======
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
?>
<?php
		  $comentario="";
		  $calificacion="";
		  if(isset($_POST['Enviar']))
		  	if ($_SERVER["REQUEST_METHOD"] == "POST"){
				$comentario=$_POST['comentario'];
				$calificacion=$_POST['calificacion'];
<<<<<<< HEAD
				if (!puedeComentar($_SESSION['Uid']))
					header("Location:Usuario.php");
				else
					calificar($_SESSION["IDGas"],$_SESSION['Uid'],$comentario,$calificacion);
=======
				require_once("funciones/Calificar.php");
				calificar($_SESSION["IDGas"],$_SESSION['Uid'],$comentario,$calificacion);
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
			}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Califica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style0.css">
  <link rel="stylesheet" href="css/style1.css">
  <style>
  .cal {
	  padding: 5px 40px 5px 40px;
	}
  html,body {
		  width: 100%;
		  height: 100%;
		  background: url("img/gasolina3.jpg") no-repeat center center fixed;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
	}
	input[type=radio] {
		visibility:hidden;
		margin:10px;
	}
	input[type=radio] + label {
		display:inline-block;
		margin:-2px;
		padding: 8px 16px;
		background-color: #e7e7e7;
		border-color: #ddd;
	}
	input[type=radio]:checked + label { 
		background-image: none;
		background-color: #72FF48;
	}
	.submit {
	  width: 45px;
	  height: 45px;
	  display: block;
	  margin: 0 auto -15px auto;
	  background: #fff;
	  border-radius: 100%;
	  border: 1px solid #0000FF;
	  color: #0000FF;
	  font-size: 24px;
	  cursor: pointer;
	  box-shadow: 0px 0px 0px 7px #fff;
	  transition: 0.2s ease-out;
	}
	.submit:hover,
	.submit:focus {
	  background: #0000FF;
	  color: #fff;
	  outline: 0;
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
<<<<<<< HEAD
        <li><a href="Autos.php">Calculadora</a></li>
        <li><a href="Tips.php">Tips</a></li>
=======
        <li><a href="Calculadora.php">Calculadora</a></li>
        <li><a href="Tips.html">Tips</a></li>
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
        <li><a href="Contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="funciones/Desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Inicio Califica -->
    <div class="evalua">
    <fieldset>
    <legend class="legend"><h1>Califica</h1></legend>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    	<div class="cal">
        <label for="comment"><h4>Calificacion general de la gasolinera:</h4></label>
        <br>
        	<h5>
        	<input type="radio" id="radio1" name="calificacion" value="1" required>
<<<<<<< HEAD
            	<label for="radio1"><img width="30px" src="img/cal1.png"> Malo</label><br class="visible-xs visible-sm">
            <input type="radio" id="radio2" name="calificacion" value="2">
            	<label for="radio2"><img width="30px" src="img/cal2.png"> Deficiente</label><br class="visible-xs visible-sm">
            <input type="radio" id="radio3" name="calificacion" value="3">
            	<label for="radio3"><img width="30px" src="img/cal3.png"> Regular</label><br class="visible-xs visible-sm">
            <input type="radio" id="radio4" name="calificacion" value="4">
            	<label for="radio4"><img width="30px" src="img/cal4.png"> Muy bueno </label><br class="visible-xs visible-sm">
            <input type="radio" id="radio5" name="calificacion" value="5">
            	<label for="radio5"><img width="30px" src="img/cal5.png"> Excelente</label>
=======
            	<label for="radio1"><img width="35px" src="img/cal1.png"> Malo</label>
            <input type="radio" id="radio2" name="calificacion" value="2">
            	<label for="radio2"><img width="35px" src="img/cal2.png"> Deficiente</label>
            <input type="radio" id="radio3" name="calificacion" value="3">
            	<label for="radio3"><img width="35px" src="img/cal3.png"> Regular</label>
            <input type="radio" id="radio4" name="calificacion" value="4">
            	<label for="radio4"><img width="35px" src="img/cal4.png"> Muy bueno </label>
            <input type="radio" id="radio5" name="calificacion" value="5">
            	<label for="radio5"><img width="35px" src="img/cal5.png"> Excelente</label>
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
            </h5>
         </div>
    	 <div class="form-group cal">
         	<label for="comment"><h4>Comentario:</h4></label>
            <textarea class="form-control" name="comentario" rows="5" id="comment" maxlength=150 placeholder="Escribe tu reseña de esta gasolinera" required></textarea>
         </div>
         <button type="submit" class="submit" name = "Enviar" value ="Enviar"><i class="fa fa-long-arrow-right"></i></button>
    </form>
    </fieldset>
    </div>
</body>
</html>