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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style0.css">
<!-- Codigo de mi calculadora -->
<script>
	function confirmar(id)
	{
		if(confirm('¿Estas seguro de eliminar este auto?')){
			location.href='Autos.php?eliminar='+id;
		}
	}
</script>
<!-- Codigo de mi calculadora -->
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
    	<div class="col-xs-9 col-sm-8 col-md-9 col-lg-9">
			<h2><i class="fa fa-car logo-small"></i> Mis Autos</h2>
        </div>
        <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3">
        	<img class="img-responsive visible-xs" src="img/logo3.png" alt="Gas App">
	        <img class="img-responsive visible-sm visible-md visible-lg" src="img/logo2.png" alt="Gas App">
        </div>
    </div>
	<!-- Codigo de mi calculadora -->
	<?PHP
		#Funcion para eliminar un auto del Usuario
		if (isset($_GET['eliminar'])) {
			echo $_GET['eliminar'];
			require_once("funciones/funciones.php");
			if (Elimina($_GET['eliminar'], $_SESSION['Uid'])){
				header("Location:Autos.php");
			}
		}
	?>
    <div align="center">
	<?php
    	require_once("funciones/funciones.php");
		$result = RegresaAutos($_SESSION['Uid']);
		$num = mysqli_num_rows($result);
		#Hago consulta a BD, si regresa 0 reusltados se le pedirà que agregue uno nuevo
		if($num == 0)
			echo "<div class='container-fluid'><h3><center>No tienes ningún auto registrado :(<br> Agrega Uno</center></h3>			</div>";
		else
			echo'<div class="table-responsive">
				  <table class="table table-condensed">
					<thead>
					  <tr>
						<th>Calcular</th>
						<th>Modelo</th>
						<th>Año</th>
						<th>Capacidad</th>
						<th>Eliminar</th>
					  </tr>
					</thead>';
		while($row=mysqli_fetch_array($result)){
			$id=$row['IDauto'];
			/*$modelo=$row['ModeloEspc'];
			$año=$row['Año'];
			$cap=$row['capTanque'];*/

			echo "<tbody><tr>";
					//echo "<td><a href='Calculadora.php?iden=$id'><input type='button' value='Calcular'></a></td>";
					echo "<td><a href='Calculadora.php?iden=$id'><button type='button' class='btn btn-warning btn-sm' value = 'Calcular'><i class='fa fa-calculator'></i></button></a></td>";
					echo "<td>",$row['ModeloEspc'],"</td>";
					echo "<td>",$row['Año'],"</td>";
					echo "<td>",$row['capTanque'],"</td>";
					//echo "<td><input type='button' value='Eliminar' onclick='return confirmar($id)''></td>";
					echo "<td><button type='button' class='btn btn-danger btn-sm' value = 'Eliminar' onclick='return confirmar($id)'><span class='glyphicon glyphicon-minus'></span></button></td>";
			echo "</tr></tbody>";
			/*echo "<tr><td width=150><center>$modelo</center></td>
			<td width=50>$año</td><td width=50>
			<center>$cap</center></td><td width=50>
			<a href='Calculadora.php?iden=$id'><input type='button' value='Calcular'></a></td>
									<td>
									<input type='button' value='Eliminar' onclick='return confirmar($id)''>	
									</td>
									</tr>";*/
		} 
		echo "</table></div>";
		if($num < 5){    
	?>
	<form action="NuevoAuto.php" enctype="multipart/form-data">
    	<!--<input type = "submit" name = "Nuevo" class="btn btn-success" value = "Agregar nuevo">-->
        <button type="submit" name = "Nuevo" class="btn btn-success btn-lg" value = "Agregar nuevo">
          <span class="glyphicon glyphicon-plus"></span> Agregar Nuevo
        </button>
    </form>
    <?php
		}
	?>
    </div>
<!-- Codigo de mi calculadora -->
</div>
</body>
</html>
