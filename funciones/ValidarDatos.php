<?php
/*Se usará para validar que los datos esten correctos cuando se meten en el formulario*/

	//Revisa que no exista algun otro registro con el mismo nombre de usuario.
	  function Existe($nombre){
      	require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT * FROM usuario WHERE NUsuario='$nombre'";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
      	if(mysqli_num_rows($resultado)==0){
      		return false;
      	}
      	return true;
      }
	  
	  //Revisa el nombre y correo del usuario
	  function Name_and_Mail($nombre,$mail){
      	require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT * FROM usuario WHERE NUsuario='$nombre' AND correo='$mail' ";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
      	if(mysqli_num_rows($resultado)==0){
      		return false;
      	}
      	return true;
      }
	  
	  //Revisa que sea usuario administrado id=1
	  function isAdmin($nombre){
      	require_once("conexion.php");
      	$link = Conectarse();
      	$Consulta = "SELECT IDUsuario FROM usuario WHERE NUsuario='$nombre' ";
      	$resultado=mysqli_query($link, $Consulta) or die (mysqli_error());
		mysqli_data_seek ($resultado, 0);
		$resultado= mysqli_fetch_array($resultado);
      	if($resultado[0]!=1){
      		return false;
      	}
      	return true;
      }

      //Valida el nombre, debe ser de 5 a 15 caracteres de longitud con guiones
      function ValidaNombre($nombre, &$Error){
            $validos = array('-','_');
            if(strlen($nombre)<5 || strlen($nombre)>15){
                  //$Error = "La longitud debe ser de al menos 5 caracteres y máximo 15";
				  $Error = '<div class="alert alert-danger fade in"><strong>La longitud del nombre debe ser de al menos 5 caracteres y máximo 15</strong></div>';
                  return false;
            }
            if(ctype_alnum(str_replace($validos, "", $nombre))){
            	if (Existe($nombre)) {
            		//$Error = "El nombre de usuario existe";
					$Error = '<div class="alert alert-danger fade in"><strong>El nombre de usuario existe, ingrese otro</strong></div>';
            		return false;
            	}
                  $Error = "";
                  return true;
            }
            //$Error = "Unicamente caracteres alfanumericos y guiones";
			$Error = '<div class="alert alert-danger fade in"><strong>Unicamente caracteres alfanumericos y guiones</strong></div>';
            return false;
      }
      //Valida la contraseña que metio el usuario, debe se der de 5 a 10 caracteres de
      //de logitud, debe tener al menos una letra minuscula, una mayuscula y algun numero
      function ValidaContra($contra1, $contra2, &$error){
            if(strcmp($contra1, $contra2)){
                  //$error = "Las contraseñas no coinciden";
				  $error = '<div class="alert alert-warning fade in"><strong>Las contraseñas no coinciden, verifique</strong></div>';
                  return false;
            }
            if(strlen($contra2)<5 || strlen($contra2)>10){
                  //$error = "Debe tener entre 5 y 10 caracteres de longitud";
				  $error = '<div class="alert alert-warning fade in"><strong>Debe tener entre 5 y 10 caracteres de longitud</strong></div>';
				  return false;
            }

            if (!preg_match('`[a-z]`',$contra1)){
                  //$error = "La clave debe tener al menos una letra minúscula";
				  $error = '<div class="alert alert-warning fade in"><strong>La clave debe tener al menos una letra minúscula</strong></div>';
                  return false;
            }
            if (!preg_match('`[A-Z]`',$contra1)){
                  //$error = "La clave debe tener al menos una letra mayúscula";
				  $error = '<div class="alert alert-warning fade in"><strong>La clave debe tener al menos una letra mayúscula</strong></div>';
                  return false;
            }
            if (!preg_match('`[0-9]`',$contra1)){
                  //$error = "La clave debe tener al menos un caracter numérico";
				  $error = '<div class="alert alert-warning fade in"><strong>La clave debe tener al menos un caracter numérico</strong></div>';
                  return false;
            }
            $error = "";
            return true;
      }

      //Valida el E-mail, usa funciones de PHP
      function ValidaEmail($Email, &$Error){
            $Email = filter_var($Email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                  //$Error = "Direccion de E-Mail invalida";
				  $Error = '<div class="alert alert-warning fade in"><strong>Direccion de E-mail invalida</strong></div>';
                  return false;
            }
            $error = "";
            return true;
      }

      //Valida el Usuario, el nombre y la contraseña para que pueda registrarse
      function Validar($Nombre, $Email, $Pswd1, $Pswd2, &$Error1, &$Error2, &$Error3){
            if(ValidaNombre($Nombre, $Error1))
                  if(ValidaEmail($Email, $Error2))
                        if(ValidaContra($Pswd1, $Pswd2, $Error3))
	                            return true;
            return false;
      }
      //Valo login lo primero que hace es revisar que exista el Usuario, luego comprueba la contraseña
      function ValLogin($nombre, $psws,&$ErrorNombre,&$ErrorPassWord){
          if (Existe($nombre)) {
                //echo "Existe el Usuario";
                //echo $psws;
                $psw = test_input($psws);
                //echo $psw;
                require_once("registrar.php");
                if(Login($nombre, $psws,$ErrorPassWord)){
                	return true;
                }
                return false;
          }
          else{
                //$ErrorNombre = "El usuario no existe";
				$ErrorNombre = '<div class="alert alert-danger fade in"><strong>El nombre de usuario NO existe o esta mal escrito</strong></div>';
                return false;
          }
      }
	  
	  function ValLoginAD($nombre, $mail, $psws,&$ErrorNombre,&$ErrorMail,&$ErrorPassWord){
		  //Comprueba que sea admin
		  if (isAdmin($nombre)){
			  if (Existe($nombre)) {
					//echo "Existe el Usuario";
					if(Name_and_Mail($nombre,$mail)){				
						$psw = test_input($psws);
						//echo $psw;
						require_once("registrar.php");
						if(Login($nombre, $psws,$ErrorPassWord)){
							return true;
						}
						return false;
					}
					else{
						$ErrorMail = '<div class="alert alert-danger fade in"><strong>El correo NO existe o esta mal escrito</strong></div>';
						return false;
					}
			  }
			  else{
					//$ErrorNombre = "El usuario no existe";
					$ErrorNombre = '<div class="alert alert-danger fade in"><strong>El nombre de usuario NO existe o esta mal escrito</strong></div>';
					return false;
			  }
		  }
		  else{
			  //No es admin
			  $ErrorNombre = '<div class="alert alert-danger fade in"><strong>No tiene permisos de estar aqui</strong></div>';
			  header("Location:../IniciarSesion.php");
		  }
      }
?>