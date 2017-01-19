<?php
//Funcion PHP para finalñizar la sesion de un usuario.
	session_start();

	if(isset ($_SESSION['Uid'])){
		session_unset();
		session_destroy();
		header("location:../index.html");
	}
	else{
		header("location:../index.html");
	}
?>