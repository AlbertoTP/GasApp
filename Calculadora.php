<?PHP  session_start();
if(!isset($_SESSION['Uid']))
<<<<<<< HEAD
      header("Location:IniciarSesion.php");
=======
      header("Location:IniciarSesion.php");	
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gas App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<<<<<<< HEAD
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style0.css">
</head> 
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- NavBar -->
=======
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/style0.css">

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
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
        <li><a href="Contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="funciones/Desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
=======
        <li><a href="Calculadora.php">Calculadora</a></li>
        <li><a href="Tips.html">Tips</a></li>
        <li><a href="Contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="funciones/Desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
      </ul>
    </div>
  </div>
</nav>
<<<<<<< HEAD
<div class="container-fluid">
<!-- Codigo de mi calculadora -->
	<h2><i class='fa fa-calculator'></i> Calculadora</h2>
    <div class="row">
				<?php
					$idAuto = $_GET['iden'];
					require_once("funciones/funciones.php");
					$Consulta = RegresaDatos($idAuto);
					$num = mysqli_num_rows($Consulta);
					if($num == 0 || $num == Null){
						header("Location:Autos.php");
				?>
						<h2>No sé como llegaste aquí, pero No tienes Vehiculos registrados, regresa y selecciona "Agregar Nuevo"</h2>
						<form action="Autos.php" enctype="multipart/form-data">
		            		<input type = "submit" name = "Nuevo" value = "Regresar">
		            	</form>
	            <?php
	            	}
	            	else{
	            		while($row=mysqli_fetch_array($Consulta)){
	            			$cap = $row['capTanque'];
							echo '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">';
	            			echo "<h2> Modelo: </h2><h5>".$row['ModeloEspc'];
							echo '</div>';
							echo '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">';
							echo " <h2>Año: </h2><h5>".$row['Año'];
							echo '</div>';
							echo '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">';
							echo " <h2>Capacidad: </h2><h3>".$row['capTanque']." litros<br>";
							echo '</div>';
	            		}
	            ?>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <h2><center>Precios actuales</center></h2>
                            <?php
                                $PMagna = $PPremium = $PDiesel = 0;
                                require_once("funciones/funciones.php");
                                RegresaPrecios($PMagna,$PPremium,$PDiesel);
                            ?>
                            <div class="row" align="center">
                            	<h5>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 bg-success">
                                Tarifa Magna:<br>$<strong><?php echo $PMagna; ?></strong>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 bg-danger">
                                Tarifa Premium:<br>$<strong><?php echo $PPremium; ?></strong>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 bg-gray">
                                Tarifa Diesel:<br>$<strong><?php echo $PDiesel; ?></strong>
                                </div>
                                </h5>
                            </div>
                        </div>
	</div>
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h3><span class="glyphicon glyphicon-tint logo-small"></span> Aproximadamente ¿Què tan <strong>lleno</strong> esta tu tanque?</h3>
						<select id="Capacidad" onchange="myFunction()">
							<?php
								echo "<option value='".(($cap/4)*0)."'> Vacio (".(($cap/4)*0)." litros)</option>";
								echo "<option value='".(($cap/4)*1)."'>Casi vacio (".(($cap/4)*1)." litros)</option>";
								echo "<option value='".(($cap/4)*2)."'>A la mitad (".(($cap/4)*2)." litros)</option>";
								echo "<option value='".(($cap/4)*3)."'>Casi Lleno (".(($cap/4)*3)." litros)</option>";
							 ?> 
						</select>
                        <h4>Ajusta la barra para ver precios y litros de gasolina.</h4>
                        <span class="glyphicon glyphicon-circle-arrow-right logo-small visible-md visible-lg"></span>
                        <span class="glyphicon glyphicon-circle-arrow-down logo-small visible-xs visible-sm"></span>
                        
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h3><span class="glyphicon glyphicon-resize-horizontal logo-small"></span> Mueve la barra de abajo para calcular cuanto te costaria llenar tu tanque</h3>
						<br>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <h3>Lleno: <?php echo $cap." Litros"?></h3>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	                        <h3><p align="right"><span id="actual">Limite: 0 Litros</span></p></h3>
                        </div>
                        <input type="range" id="gas" min=0 max="<?php echo $cap?>" oninput="Actualizar()" value=0 step = .1>
						<h2><span class="glyphicon glyphicon-resize-horizontal"></span><p id="valor">Litros: 0</p></h2>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                <th class="bg-success">Magna</th>
                                <th class="bg-danger">Premium</th>
                                <th class="bg-gray">Diesel</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <th id="Magna" class="bg-success">$0.00</th>
                                <th id="Premium" class="bg-danger">$0.00</th>
                                <th id="Diesel" class="bg-gray">$0.00</th>
                                </tr>
                                </tbody>
                            </table>
                         </div>
	   </div>
	</div>
    <div class="row">
    	<center>
		<h3>O introduce el monto que piensas gastar y calcula cuantos litros deben ser</h3>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<span class="glyphicon glyphicon-usd"></span> <input type="number" id="calculo" min="1" max="1000" value="1" maxlength=6/>.00 Pesos
			<button type="button" onclick=" CalcLitros()">Calcular</button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        	<div class="table-responsive">
            	<table class="table">
                	<thead>
                    <tr>
                    <th class="bg-success">Magna</th>
                    <th class="bg-danger">Premium</th>
                    <th class="bg-gray">Diesel</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <th id="LMagna" class="bg-success">$0.00</th>
                    <th id="LPremium" class="bg-danger">$0.00</th>
                    <th id="LDiesel" class="bg-gray">$0.00</th>
                    </tr>
                    </tbody>
                </table>
             </div>
        </div>
					<script>
								function myFunction() {
								    var x = document.getElementById("Capacidad").value;
								    document.getElementById("gas").min = x;
								    document.getElementById("gas").value = x;
								    document.getElementById("valor").innerHTML = "Litros: 0";
								    document.getElementById("actual").innerHTML = "Limite: "+x+" Litros";
								    document.getElementById("Magna").innerHTML = "$0.0";
									document.getElementById("Premium").innerHTML = "$0.0";
									document.getElementById("Diesel").innerHTML = "$0.0";
								}
								function Actualizar(){
									var x = document.getElementById("gas").value;
									var y = document.getElementById("gas").min
									var Res = x-y;
									document.getElementById("valor").innerHTML = "Litros: "+Res.toFixed(1);
									var TMagna = <?php echo $PMagna; ?>;
									document.getElementById("Magna").innerHTML = "$"+(TMagna*Res.toFixed(1)).toFixed(2);
									var TPremium = <?php echo $PPremium; ?>;
									document.getElementById("Premium").innerHTML = "$"+(TPremium*Res.toFixed(1)).toFixed(2);
									var TDiesel = <?php echo $PDiesel; ?>;
									document.getElementById("Diesel").innerHTML = "$"+(TDiesel*Res.toFixed(1)).toFixed(2);
								}

								function CalcLitros(){
									var Res = document.getElementById("calculo").value;
									if (Res > 10000) {
										alert("El numero debe ser menor que 10,000");
										return;
									}
									var TMagna = <?php echo $PMagna; ?>;
									document.getElementById("LMagna").innerHTML = (Res/TMagna.toFixed(2)).toFixed(2)+" litros";
									var TPremium = <?php echo $PPremium; ?>;
									document.getElementById("LPremium").innerHTML = (Res/TPremium.toFixed(2)).toFixed(2)+" litros";
									var TDiesel = <?php echo $PDiesel; ?>;
									document.getElementById("LDiesel").innerHTML = (Res/TDiesel.toFixed(2)).toFixed(2)+" litros";
								}

						</script>
						<br>
						<br>
						<form action="Autos.php" enctype="multipart/form-data">
                            <button type = "submit" name = "Nuevo" value = "Regresar" onclick="Regresa()" class='btn btn-danger btn-sm'><span class="glyphicon glyphicon-menu-left"></span> Regresar</button>
		            	</form>
				<?php
						}
				?>
	</div>
<!-- Codigo de mi calculadora -->
=======

<div class="container-fluid">
	<h1>Calculadora</h1>
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
</div>
</body>
</html>