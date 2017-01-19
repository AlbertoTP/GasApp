<?PHP  session_start();
if(!isset($_SESSION['Uid']))
      header("Location:IniciarSesion.php");
require_once("../funciones/ValidarDatos.php");
$_SESSION["IDGas"]=$_GET['IDGasolinera'];
if(!isAdmin($_SESSION['Unombre']))
	header("Location:../Usuario.php");
/*require_once("../funciones/administra.php");
$result=buscarGasolineras($_SESSION["IDGas"],1);
		if ($result===0)
		  		echo "No hay resultados";
		else{
			while($row = mysqli_fetch_array($result)){
				echo $row['IDGasolinera'];
				echo $row['NGasolinera'];
				echo $row['direccion'];
				echo $row['TDiesel'];
				echo $row['TMagna'];
				echo $row['TPremium'];
			}
		}*/
?>
<?php
$idgas="";
$nombre="";
$direccion="";
$td="";
$tm="";
$tp="";
if(isset($_POST["Enviar"])) {
		$idgas = $_POST[$_SESSION["IDGas"]];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$td = $_POST['td'];
		$tm = $_POST['tm'];
		$tp = $_POST['tp'];
		//echo $idgas,$nombre,$direccion,$td,$tm,$tp;
		require_once("../funciones/conexion.php");
      	$link = Conectarse();
      	$Consulta = "UPDATE gasolinera SET gasolinera.NGasolinera='$nombre', gasolinera.direccion='$direccion', gasolinera.TDiesel='$td', gasolinera.TMagna='$tm', gasolinera.TPremium='$tp' WHERE gasolinera.IDGasolinera='$idgas'";
		mysqli_query($link, $Consulta);
		/*if (mysqli_query($link, $Consulta))
			header("Location:admin2.php");
		else
			printf("Error: %s\n", mysqli_error($link));*/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administracion</title>
  <meta charset="utf-8">
</head>

<body>

<div class="container-fluid">
<h2>Modificar Gasolinera:</h2>

<h3>
<fieldset>
<form method="post" action="">
<div >
	<input type="text" name = "nombre" maxlength=50 value="<?php echo $nombre?>" required />
</div>
<div >
	<input type="text" name = "direccion" maxlength=80 value="<?php echo $direccion?>" placeholder="" required />
</div>
<div >
	<input type="text" name = "td" value="<?php echo $td?>" required />
</div>
<div >
	<input type="text" name = "tm" value="<?php echo $tm?>"  required />
</div>
<div >
	<input type="text" name = "tp" value="<?php echo $tp?>"  required />
</div>
<button type="submit" name = "Enviar" value ="Enviar" >Modificar</button>

</form>
</fieldset>
</div>

</body>
</html>