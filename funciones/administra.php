<?php
	//muestra todas las gasolineras del sistema
	function verGasolineras(){
		require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT * FROM gasolinera ";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res);
		if ($res===NULL)
			return 0;
		else
			return $resultado;
	}
	//elimina gasolineras marcadas con checkbox
	function eliminaGasolinera($delete){
		require_once("conexion.php");
		$link = Conectarse();
		$cantidad = count($delete);
		for ($i=0; $i<$cantidad; $i++) {
			 $delete_id = $delete[$i];
			 echo $delete_id;
		     $Consulta = "DELETE FROM gasolinera WHERE IDGasolinera='$delete_id' ";
			 if (mysqli_query($link, $Consulta))
			 	echo "eliminada";
			 else
			 	echo "NO";
		}
	}
	//añadir nueva gasolinera
	function anadirGasolinera($nombre,$direccion,$estado,$municipio,$latitud,$longitud,$td,$tm,$tp){
		$latitud=floatval($latitud);
		$longitud=floatval($longitud);
		$td=floatval($td);
		$tm=floatval($tm);
		$tp=floatval($tp);
		echo $nombre,$direccion,$td,$tm,$tp;
		require_once("conexion.php");
      	$link = Conectarse();
		$Consulta = "INSERT INTO gasolinera (IDGasolinera,NGasolinera,direccion,Estado,Municipio,Latitud,Longitud,TDiesel,TMagna,TPremium) VALUES ('0', '$nombre', '$direccion', '$estado', '$municipio', '$latitud', '$longitud', '$td', '$tm', '$tp')";
		if (mysqli_query($link, $Consulta))
			return true;
		else
			return false;
	}

	//actualiza los precios de todas las gasolineras
	function actualizarTarifas($precio,$opc){
		$precio=floatval($precio);
		$opc=intval($opc);
		echo $precio,"-",$opc;
		require_once("conexion.php");
      	$link = Conectarse();
		if ($opc==1)
			$Consulta="UPDATE gasolinera SET TDiesel=$precio WHERE 1";
		elseif ($opc==2)
			$Consulta="UPDATE gasolinera SET TMagna=$precio WHERE 1";
		else
			$Consulta="UPDATE gasolinera SET TPremium=$precio WHERE 1";
		if (mysqli_query($link, $Consulta))
			return true;
		else
			return false;
	}
	//busca gasolinera sesun opcion id o nombre o direccion
	function buscarGasolineras($bus,$opt){ 
		//echo "|",$bus,"-",$opt,"|";
		$opt=intval($opt);
		require_once("conexion.php");
      	$link = Conectarse();
		if ($opt==1)
			$Consulta = "SELECT * FROM `gasolinera` WHERE IDGasolinera='$bus'";
		elseif($opt==2)
			$Consulta = "SELECT * FROM `gasolinera` WHERE NGasolinera='$bus'";
		elseif($opt==3)
			$Consulta = "SELECT * FROM `gasolinera` WHERE direccion='$bus'";
		elseif($opt==4)
			$Consulta = "SELECT * FROM `gasolinera` WHERE Estado='$bus'";
		else
			$Consulta = "SELECT * FROM `gasolinera` WHERE Municipio='$bus'";
		$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res);
		if ($res===NULL)
			return 0;
		else
			return $resultado;
	}
	
/* ---------------------Comentarios--------------------------*/
	//muestra todos los comentarios
	function verComentarios(){
		require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT escribe_calificacion.idEC,escribe_calificacion.IDGasolinera,gasolinera.NGasolinera,usuario.NUsuario,escribe_calificacion.comentario,escribe_calificacion.calificacionUsuario,escribe_calificacion.dia_hora FROM escribe_calificacion,gasolinera,usuario WHERE escribe_calificacion.IDUsuario=usuario.IDUsuario AND escribe_calificacion.IDGasolinera=gasolinera.IDGasolinera ORDER BY escribe_calificacion.dia_hora DESC  ";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res=mysqli_query($link, $Consulta) or die (mysqli_error());
		$res = mysqli_fetch_array($res);
		if ($res===NULL)
			return 0;
		else{
			return $resultado;
		}
	}
	
	//elimina comentarios marcados con checkbox
	function eliminaComentarios($delete){
		require_once("conexion.php");
		$link = Conectarse();
		$cantidad = count($delete);
		for ($i=0; $i<$cantidad; $i++) {
			 $delete_id = $delete[$i];
			 echo $delete_id;
		     $Consulta = "DELETE FROM escribe_calificacion WHERE idEC='$delete_id' ";
			 if (mysqli_query($link, $Consulta))
			 	echo "eliminada";
			 else
			 	echo "NO";
		}
	}
	
?>