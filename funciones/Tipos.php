<?php
	require_once("conexion.php");
	$link = Conectarse();
	$tipo = $_GET['tipo'];
	echo $tipo;
    $consulta = "SELECT DISTINCT ModeloEspc FROM vehiculo WHERE modelo= '".$tipo."'";
    echo $consulta;
    $query = mysqli_query($link,$consulta);
    $opciones ="";
    while ($fila = mysqli_fetch_array($query)) {
       $opciones.= "<option value='".$fila['ModeloEspc']."'>".$fila['ModeloEspc']."</option>";
    };
    echo $opciones;
 
?>