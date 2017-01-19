<?php
//Funcion PHP para conectarse a la BD cambia la codificacion para evitar errores 
function Conectarse() 
{ 
	/*Creo la conexion con la BD para regresar el link*/

   if (!($link = mysqli_connect("localhost", "root", "", "gasapp"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 

	/*Cambiar el conjunto de caracteres a UTF-8 para evitar problemas con los querys*/
	//printf("Conjunto de caracteres inicial: %s\n", mysqli_character_set_name($link));
	if (!mysqli_set_charset($link, "utf8")) {
	    printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($link));
	    exit();
	}

   return $link; 
} 
?>
