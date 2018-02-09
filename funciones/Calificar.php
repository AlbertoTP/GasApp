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
<<<<<<< HEAD
	//revisa en la BD si la gasolinera existe
	function existeGasolinera($idgas){
		require_once("conexion.php");
		$link = Conectarse();
      	$Consulta = "SELECT * FROM gasolinera WHERE IDGasolinera='$idgas'";
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res);
		if ($res===NULL)
			return true;
		else
			return false;
	}
=======
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
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
<<<<<<< HEAD
	//Separa la hora de la fecha
	function gethora($fecha){
		$datetime0=explode(" ",$fecha);
		$datetime1=explode(":",$datetime0[1]);
		return $datetime1;
	}
	//verifica que el usuario no comente seguido solo 1 vez por hora y maximo 5 veces por dia
	function puedeComentar($idu){
		$time = time();
		//$newDate = date('Y-m-d',$time)." ".date("H:i:s");
                $date = date_create('00:00:00');
                $newDate = date_format($date, 'Y-m-d H:i:s');
		//echo "newfecha|",$newDate;
		require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta ="SELECT escribe_calificacion.dia_hora FROM escribe_calificacion WHERE dia_hora>='$newDate' AND IDUsuario='$idu' ORDER BY dia_hora DESC";
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res1=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res);
		if ($res===Null)
			return true;
		elseif (mysqli_num_rows($res1)<5){
			//hora del ultimo comentario
			$hora = gethora($res[0]);
			//hora actual
			$time = time();
			$horaActual=date('H:i:s',$time);
			$horaActual1=explode(":",$horaActual);
			//tiene que tener por lo menos una hora mas
                        //echo "hora actual:",$horaActual1," HoraComment: ",$hora[0];
			if ($horaActual1[0]>$hora[0])
				return true;
			else
				return false;
		}
		else
			return false;
	}
=======
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
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
<<<<<<< HEAD
			header("Location:gasolinera.php?gas=".base64_encode(base64_encode(base64_encode($idgas))));
=======
			header("Location:gasolinera.php?gas=".urlencode($idgas));
exit; 
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
		}
		else{
			printf("Error: %s\n", mysqli_error($link));
			echo "No se enviaron datos";
<<<<<<< HEAD
			header("Location:calificarGasolinera.php");
=======
			header("Location:calificarGasolinera.php?gas=".urlencode($idgas));
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
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