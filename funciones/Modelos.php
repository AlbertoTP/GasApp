<?php
	require_once("conexion.php");
	$link = Conectarse();
	$marca = $_GET['marca'];
	#echo $marca;
    $consulta = "SELECT DISTINCT modelo FROM vehiculo WHERE marca= '".$marca."'";
    #echo $consulta;
    $query = mysqli_query($link,$consulta);
    $opciones ="<option value=Default>Elije Modelo</option>";
    #$opciones ="";
    while ($fila = mysqli_fetch_array($query)) {
       $opciones.= "<option value='".$fila['modelo']."'>".$fila['modelo']."</option>";
    };
    echo $opciones;
 
?>