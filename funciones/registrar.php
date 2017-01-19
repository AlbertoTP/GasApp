<?php
	function Registrar($nm, $em,$ps){
		require_once("conexion.php");
		//Crear Hash de contraseña para guardar en la BD
		$ps = password_hash($ps, PASSWORD_DEFAULT);
		//Las contraseñas estaràn guardadas en la BD por clave, no se usarà el valor como tal
		$link = Conectarse();
		//Se actualizar la BD con el nuevo registro
		$consulta = "INSERT INTO usuario(NUsuario,correo,contraseña) values('$nm','$em','$ps')";
		if(mysqli_query($link,$consulta)){
			echo "Registro exitoso";
			header("location:IniciarSesion1.php");
		}
		else{
			printf("Error: %s\n", mysqli_error($link));
			echo "Registro fallo";
			header("location:Registro.php");
		}
	}

	//Con esta funcion se loguea al usuario y se inicia la sesion
	function Login($nm, $ps, &$Mensaje){
		require_once("conexion.php");
		$link = Conectarse();
		//Para iniciar la sesion
		$Consulta = "SELECT * FROM usuario WHERE NUsuario='$nm'";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		if($row = mysqli_fetch_array($resultado)){
			$user = $row['NUsuario'];
			$contraseña = $row['contraseña'];
		}
		//Sacamos el usuario y la contraseña
		if (password_verify($ps, $contraseña)){ //Usamos password_Verify para verficar las contraseñas de la BD
			//Iniciamos la Sesion
			session_start();
			$_SESSION['Uid'] = $row['IDUsuario'];
			$_SESSION['Unombre'] = $user;
			$_SESSION['Correo'] = $row['correo'];
			//$Mensaje =  "Usuario y contraseña correcta";
			$Mensaje='<div class="alert alert-success fade in"><strong>Iniciando Sesión ...</strong></div>';
			return true;
		}
		else{
			//$Mensaje= "Datos incorrectos";
			$Mensaje='<div class="alert alert-warning fade in"><strong>Contraseña incorrecta</strong></div>';
			return false;
		}
	}

?>