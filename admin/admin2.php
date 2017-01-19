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
if(isset($_POST["checkbox"])) {
    $delete = $_POST["checkbox"];
	require_once("../funciones/administra.php");
	if (eliminaGasolinera($delete))
		header("Location:admin1.php");
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
<h2>Todas las gasolineras:</h2>
<h3>
<form method="post" action="">
<div class="table-responsive">
	<table class="table table-condensed table-hover">
    	<thead>
          <tr>
            <th><span class="glyphicon glyphicon-remove iconoRojo"></span></th>
            <!--<th><span class="glyphicon glyphicon-edit"></span></th>-->
            <th>IDG</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>T. Diesel</th>
            <th>T. Magna</th>
            <th>T. Premium</th>
          </tr>
        </thead>
        <tbody>
          <?php
		  require_once("../funciones/administra.php");
		  $vgas=verGasolineras();
		  if ($vgas===0)
		  		echo "No hay gasolineras";
		  else{
				while($row = mysqli_fetch_array($vgas)){
					echo "<tr>";
					?>
                    <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["IDGasolinera"]; ?>"></td>
                    <!--<td><a href="admin6.php?IDGasolinera=<?php echo $row['IDGasolinera']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>-->
                    <?php
					echo "<td>",$row["IDGasolinera"],"</td>";
					echo "<td>",$row["NGasolinera"],"</td>";
					echo "<td>",$row["direccion"],"</td>";
					echo "<td>",$row["Estado"],"</td>";
					echo "<td>",$row["Municipio"],"</td>";
					echo "<td>",$row["TDiesel"],"</td>";
					echo "<td>",$row["TMagna"],"</td>";
					echo "<td>",$row["TPremium"],"</td>";
					echo "</tr>";
        	}
		  }
		  ?>
        </tbody>
      </table>
</div>
<div class="fixed">
	<button type="submit" class="submit btn btn-danger btn-lg" value ="checkbox" ><span class="glyphicon glyphicon-remove"></span> Eliminar Marcados</button>
</div>
</form>
</div>

</body>
</html>