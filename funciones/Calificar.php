<?php
	//Se utilizara para calificar las gasolineras existentes
	//Calcula el promedio general de la gasolinera seleccionada
	function promedioGasolinera($gas){
		require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT AVG(calificacionUsuario) FROM escribe_calificacion WHERE IDGasolinera='$gas'";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		mysqli_data_seek ($resultado, 0);
		$resultado= mysqli_fetch_array($resultado);
		if ($resultado[0]===NULL)
			return -1;
		else{
			$prom = round($resultado[0], 1);
			return $prom;
		}
	}
	//regresa imagen dependiendo el promedio
	function imgPromedio($prom){
		if ($prom > 0){
			if ($prom > 0 && $prom <= 1.7)
				return '<img class="img-responsive" src="img/cal1.png" alt="Calificación Mala">';
			elseif ($prom > 1.7 && $prom <= 3.4)
				return '<img class="img-responsive" src="img/cal3.png" alt="Calificación Regular">';
			else
				return '<img class="img-responsive" src="img/cal4.png" alt="Calificación Excelente">';
		}
		else{
			return '<img class="img-responsive" src="img/cal5.png" alt="Sin Calificación">';
		}
	}
	function imgPromedio2($prom){
		if ($prom > 0){
			if ($prom > 0 && $prom <= 1.7)
				return "img/gas1.png";
			elseif ($prom > 1.7 && $prom <= 3.4)
				return "img/gas2.png";
			else
				return "img/gas3.png";
		}
		else{
			return "img/gas0.png";
		}
	}
	//muestra todos los comentarios de la gasolinera seleccionada
	function verTodosC($gas){
		require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT usuario.NUsuario,escribe_calificacion.comentario,escribe_calificacion.dia_hora FROM usuario,escribe_calificacion WHERE usuario.IDUsuario=escribe_calificacion.IDUsuario AND IDGasolinera='$gas' ORDER BY dia_hora DESC";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res);
		if ($res===NULL)
			return 0;
		else
			return $resultado;
	}
	//Separa fecha de facha y hora
	function getfecha($fecha){
		$datetime0=explode(" ",$fecha);
		$datetime1=explode("-",$datetime0[0]);
		return $datetime1;
	}
	//Datos de la gasolinera elegida
	function datos($gas){
		require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta ="SELECT NGasolinera,direccion,TMagna,TPremium,TDiesel FROM gasolinera WHERE gasolinera.IDGasolinera='$gas' ";
		$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res,MYSQLI_ASSOC);
		if ($res===NULL)
			return 0;
		else
			return $res;
	}
	//califica la gasolinera seleccionada Calificacion Usuario y comentario
	function calificar($idgas,$uid,$com,$cal){
		$time = time();
		$tiempo = date('Y-m-d H:i:s',$time);
		//echo "GAS|",$idgas,"|UID|",$uid,"|COM|",$com,"|Cal|",$cal,"|TIME|",$tiempo;
		require_once("conexion.php");
      	$link = Conectarse();
		$Consulta="INSERT INTO escribe_calificacion (idEC,IDGasolinera,IDUsuario,comentario,calificacionUsuario,dia_hora) VALUES (0,'$idgas', '$uid', '$com', '$cal', '$tiempo')";
		if(mysqli_query($link,$Consulta)){
			echo "Datos enviados";
			header("Location:gasolinera.php?gas=".urlencode($idgas));
exit; 
		}
		else{
			printf("Error: %s\n", mysqli_error($link));
			echo "No se enviaron datos";
			header("Location:calificarGasolinera.php?gas=".urlencode($idgas));
		}
	}
	
	//lleva las gasolineras de la BD a google maps
	function BDaMaps(){
		require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT gasolinera.IDGasolinera, gasolinera.NGasolinera,gasolinera.Latitud, gasolinera.Longitud FROM gasolinera WHERE 1";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res);
		if ($res===NULL)
			return 0;
		else
			return $resultado;
	}
?>