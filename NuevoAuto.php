<?PHP  session_start();
if(!isset($_SESSION['Uid']))
      header("Location:IniciarSesion.php");
?>
<?PHP
	#Funcion para eliminar un auto del Usuario
	if (isset($_GET['anadir'])) {
		echo $_GET['anadir'];
		require_once("funciones/funciones.php");
		if (Anadir($_GET['anadir'], $_SESSION['Uid'])){
			header("Location:Autos.php");
		}
	}
	$ErrorMarca = $ErrorModelo= "";
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
		if(confirm('¿Estas seguro de añadir este auto?')){
			location.href='NuevoAuto.php?anadir='+id;
		}
	}
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#marca").change(function(){
					$.ajax({
						url:"./funciones/Modelos.php",
						type: "GET",
						data:"marca="+$("#marca").val(),
						success: function(opciones){
							$("#modelo").html(opciones);
						}
					})
					//location.href='./funciones/Modelos.php?marca='+$("#marca").val();
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#modelo").change(function(){
					$.ajax({
						url:"./funciones/Tipos.php",
						type: "GET",
						data:"tipo="+$("#modelo").val(),
						success: function(opciones){
							$("#tipo").html(opciones);
						}
					})
					//location.href='./funciones/Tipos.php?tipo='+$("#modelo").val();
				});
			});
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
<!-- Codigo de mi calculadora -->
<div class="container-fluid">
	<h2><span class="glyphicon glyphicon-plus logo-small"></span> Añade un nuevo auto</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    	<div class="row">
        	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		    	 <label> Marca:</label>
				 <select id="marca" name="marca" required><span class="error"><?php echo $ErrorMarca ?></span>
				 <?php
				 #Aqui regreso las marcas de autos de mi BD
				 require_once("funciones/funciones.php");
				 $opciones = RegresaMarcas();
				 echo $opciones; ?>
                 </select>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <label> Modelo:</label>
                <select id="modelo" name="modelo" required></select><span class="error"><?php echo $ErrorModelo ?></span>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <label> Tipo:</label>
                <select id="tipo" name="tipo" required></select>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <button type = "submit" name = "Consultar" value = "Consultar" class='btn btn-warning btn-sm'><span class="glyphicon glyphicon-search"></span> Consultar</button>
                <button type = "submit" name = "Nuevo" value = "Regresar" onclick="Regresa()" class='btn btn-danger btn-sm'><span class="glyphicon glyphicon-menu-left"></span> Regresar</button>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				     <?php
				     	if(isset($_POST['Consultar'])){
				            if ($_SERVER["REQUEST_METHOD"] == "POST"){
				              		$marca = $_POST['marca'];
				              		$modelo = $_POST['modelo'];
				              		$tipo = $_POST['tipo'];
				              		require_once("funciones/funciones.php");
									$result = RegresaCapcidad($marca, $modelo, $tipo);
									$num = mysqli_num_rows($result);
									if($num == 0){
										echo "<h2><center>No hay ningun registro con esos datos, Reintenta<br></center></h2>";
									}
									else{
										echo "<center>";
										echo "<h2><i class='fa fa-car logo-small'></i> ".$marca." - ".$tipo."</h2>";
										echo '<div class="table-responsive">
											  <table width="300">
												<thead>
												  <tr>
													<th>Año</th>
													<th>Capacidad</th>
													<th>Añadir</th>
												  </tr>
												</thead>';
										while($row=mysqli_fetch_array($result)){
												$id=$row['IdAuto'];
												//$año=$row['Año'];
												//$cap=$row['capTanque'];
												echo "<tbody><tr>";
												echo "<td>",$row['Año'],"</td>";
												echo "<td>",$row['capTanque'],"</td>";
												echo "<td><input type='button' value='Añadir' onclick='return confirmar($id)''></td>";
												echo "</tr></tbody>";
											} 
										echo "</table></center>";
										echo '<div class="container-fluid"><footer class="text-center"><a href="#" title="arriba"><span class="glyphicon glyphicon-chevron-up"></span></a><h5>Volver al Inicio</h5></footer></div>';
				                  }
				              }
						}
				     ?>
		            <!--<input type = "submit" name = "Nuevo" value = "Regresar" onclick="Regresa()">-->
            </div>
    	</div>
	</form>
	<script>
		function Regresa() {
		   location.href='Autos.php?marca=';  
		}
	</script>
</div>
<!-- Codigo de mi calculadora -->
 
<script src="js/scroll.js"></script>
</body>
</html>
