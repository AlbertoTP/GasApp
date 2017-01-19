<?PHP  session_start();
if(!isset($_SESSION['Uid']))
      header("Location:IniciarSesion.php");	
$_SESSION["IDGas"] = $_GET['gas'];
$gas=$_GET['gas'];
?>
<?php
require_once("funciones/Calificar.php");
$prom=promedioGasolinera($gas);
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
  <style>
	  html,body {
		  width: 100%;
		  height: 100%;
		  background: url("img/gasolina3.jpg") no-repeat center center fixed;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		.h8{
			font-family: 'Caviar Dreams';
			font-size:16px;
			color: #000;
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

<!-- Inicio del contenido -->
<div class="container-fluid">
	<div class="row">
    	<!-- Boton Califica -->
    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 bg-blue">
        	<center>
        	<a class="btn btn-primary btn-lg visible-lg visible-md" href="calificarGasolinera.php?gas=<?php echo $gas; ?>"><span class="glyphicon glyphicon-star-empty"></span> Calificar</a>
            <a class="btn btn-primary visible-xs visible-sm" href="calificarGasolinera.php?gas=<?php echo $gas; ?>"><span class="glyphicon glyphicon-star-empty"></span> Calificar</a>
            </center>
        </div>
        <!-- logo solo md y lg -->
        <div class="col-md-6 col-lg-6 visible-md visible-lg">
        	<center>
            <img height="50%" width="50%" class="img-responsive" src="img/logo2.png" alt="Gas App">
            </center>
        </div>
        <!-- estrella solo sm y xs -->
        <div class="col-xs-6 col-sm-6 visible-xs visible-sm">
        	<center>
            <br>
            <?php
				$img=imgPromedio($prom);
				echo $img,"<br>";
			?>
            </center>
        </div>
        <!-- logo solo sm y xs -->
        <div class="col-xs-6 col-sm-6 visible-xs visible-sm">
        	<center>
            <br>
            <img class="img-responsive" src="img/logo3.png" alt="Gas App">
            </center>
        </div>
        <!-- Promedio -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 bg-blue">
        	<center>
			<?php
				echo $prom;
				if ($prom > 0){
					echo "<prom>Promedio:",$prom,"</prom>";
				}
				else{
					echo '<prom>Sin Promedio</prom>';
				}
            ?>
            </center>
        </div>
    </div>
    <div class="row">
    _
    </div>
    <div class="row">
    	<!-- Datos -->
    	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 bg-write">
        	<h4>
            Nombre: <strong><?php $row=datos($gas);	echo $row["NGasolinera"]; ?></strong><br>
        	Direccion: <strong><?php echo $row["direccion"]; ?></strong><br><br>
            <div class="row" align="center">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 bg-success">
                Tarifa Magna:<br>$<strong><?php echo $row["TMagna"]; ?></strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 bg-danger">
                Tarifa Premium:<br>$<strong><?php echo $row["TPremium"]; ?></strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 bg-gray">
                Tarifa Diesel:<br>$<strong><?php echo $row["TDiesel"]; ?></strong>
                </div>
            </div>
            </h4>
        </div>
        <!-- estrella -->
    	<div class="col-md-2 col-lg-2 visible-md visible-lg">
        	<center>
            <?php
				$img=imgPromedio($prom);
				echo $img,"<br>";
			?>
            </center>
        </div>
    </div>
    <div class="row">
        <!-- Comentarios -->
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-write">
            <?php
				require_once("funciones/Calificar.php");
				$comentarios=verTodosC($gas);
				if ($comentarios===0)
					echo "<br><div class='panel panel-default'>Aun no hay comentarios de esta gasolinera</div>";
				else{
					?>
					<div class="container-fluid">
					  <h2>Comentarios</h2>
					  <div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-collapse">
							<?php
							//Muestra solo 3 comentarios
							for ($i=0;$i<3;$i++){
								if($row = mysqli_fetch_array($comentarios)){
									echo "<ul class='list-group'>";
									echo "<li class='list-group-item'>";
									$datetime0=getfecha($row['dia_hora']);
									echo "<p align='right'>",$datetime0[2],"/",$datetime0[1],"/",$datetime0[0],"</p>";
									echo '<span class="glyphicon glyphicon-user"></span> ';
									echo $row['NUsuario'],": ",$row['comentario'];
									echo "</li>";
									echo "</ul>";
								}
							}
							?>
						  </div>
						</div>
					</div>
					<div class="panel-group">
						<div class="panel panel-default">
							<?php
							//muestra todos los comentarios restantes
							if (!is_null($row)){
								echo '<div id="collapse1" class="panel-collapse collapse">';
								while($row = mysqli_fetch_array($comentarios)){
									echo "<ul class='list-group'>";
									echo "<li class='list-group-item'>";
									$datetime0=getfecha($row['dia_hora']);
									echo "<p align='right'>",$datetime0[2],"/",$datetime0[1],"/",$datetime0[0],"</p>";
									echo '<span class="glyphicon glyphicon-user"></span> ';
									echo $row['NUsuario'],": ",$row['comentario'];
									echo "</li>";
									echo "</ul>";
								}
								echo '</div>';
								//boton Ver Todos
								echo '<div class="panel-heading">';
									echo '<h4 class="panel-title">';
									echo '<a data-toggle="collapse" href="#collapse1">Ver todos</a>';
									echo '</h4>';
								echo '</div';
							}
				}
			?>
						</div>
					</div>
				</div>
        </div>
        <!-- fin row comentarios -->
    </div>
</div>

</body>
</html>