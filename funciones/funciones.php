<?php
	#Funcion que regresa los autos registrado de un usuario
	function RegresaAutos($idUsr){
		require_once("conexion.php");
		$link = Conectarse();
    	$result=mysqli_query($link,"SELECT vehiculo.IDauto,vehiculo.ModeloEspc,vehiculo.Año,vehiculo.capTanque  FROM vehiculo inner join revisar on revisar.IDauto = vehiculo.IDauto WHERE revisar.IDUsuario = '$idUsr'");
    	return $result;
	}

	function RegresaDatos($idAuto){
		require_once("conexion.php");
		$link = Conectarse();
		$result=mysqli_query($link, "SELECT * FROM vehiculo WHERE vehiculo.IDauto='$idAuto'");
		return $result;
	}

	function RegresaPrecios(&$PMagna, &$PPremium, &$PDiesel){
		require_once("conexion.php");
		$link = Conectarse();
		$Consulta=mysqli_query($link, "SELECT gasolinera.TDiesel, gasolinera.TMagna, gasolinera.TPremium FROM gasolinera WHERE IDgasolinera=1");
		$num = mysqli_num_rows($Consulta);
		if ($num==0){
			$PMagna = $PPremium = $PDiesel = 0;
			return;
		}
		else{
			while($row=mysqli_fetch_array($Consulta)){
	            			$PMagna=$row['TMagna'];
	            			$PPremium = $row['TPremium'];
	            			$PDiesel = $row['TDiesel'];
	            			return;
	            	}
		}
	}
	function Elimina($IdAuto, $IDusuario){
		require_once("conexion.php");
		$link = Conectarse();
		#$Consulta = "DELETE * FROM revisar WHERE IDauto='$IdAuto' AND IDUsuario='$IDusuario'";
		return mysqli_query($link,"DELETE FROM revisar WHERE IDauto='$IdAuto' AND IDUsuario='$IDusuario'");
	}
	function Anadir($IdAuto, $IDusuario){
		require_once("conexion.php");
		$link = Conectarse();
		#$Consulta = "DELETE * FROM revisar WHERE IDauto='$IdAuto' AND IDUsuario='$IDusuario'";
		return mysqli_query($link,"INSERT INTO revisar(IDauto, IDUsuario) VALUES ('$IdAuto','$IDusuario')");

	}
	function Añadir($IdAuto, $IDusuario){
		require_once("conexion.php");
		$link = Conectarse();
		#$Consulta = "DELETE * FROM revisar WHERE IDauto='$IdAuto' AND IDUsuario='$IDusuario'";
		return mysqli_query($link,"DELETE FROM revisar WHERE IDauto='$IdAuto' AND IDUsuario='$IDusuario'");
	}

	function RegresaMarcas(){
		require_once("conexion.php");
		$link = Conectarse();
		$result=mysqli_query($link, "SELECT DISTINCT marca FROM vehiculo");
		$opciones = '<option value="Default">Elije una Marca</option>';
		#$opciones ="";
		while ($row=mysqli_fetch_array($result)) {
					$Marca = $row['marca'];
					$opciones.= "<option value='".$Marca."'>".$Marca."</option>";
				}
		return $opciones;
	}

	function RegresaCapcidad($marca, $modelo, $ModEsp){
		require_once("conexion.php");
		$link = Conectarse();
		$result=mysqli_query($link, "SELECT IdAuto,Año,capTanque FROM vehiculo WHERE marca='$marca' AND ModeloEspc='$ModEsp'");
		return $result;
	}

?>