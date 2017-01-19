<?php
    
          //Quita Caracteres Raros en
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES);
            return $data;
          }
    
          $nombre = "";
		  $mail = "";
          $psw = "";
          $ErrorNombre = "";
		  $ErrorMail = "";
          $ErrorPassWord = "";            
          if(isset($_POST['Enviar']))
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                      $nombre = $_POST['nombre'];
					  $mail = $_POST['mail'];
                      $psws = $_POST['password'];
                      require_once("../funciones/ValidarDatos.php");
                      //Llama a la funcion VaLoginAD que revisa que el Usuario, Correo y la contraseña esten correctos
					  if(ValLoginAD($nombre, $mail, $psws,$ErrorNombre,$ErrorMail,$ErrorPassWord)){
                            header("Location:admin1.php");
                      }
                      
                }
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ingreso</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="../css/style0.css">
  <link rel="stylesheet" href="../css/style1.css">
  <style>
  html,body{
	  width: 100%;
	  height: 100%;
	  background: url("../img/gasolina1.jpg") no-repeat center center fixed;
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
	  font-family: 'Caviar Dreams';
	  font-weight: 200;
  }
  .login {
	  position: relative;
	  top: 45%;
	  width: 60%;
	  display: table;
	  margin: -150px auto 0 auto;
	  background: #fff;
	  border-radius: 4px;
	}
  </style>
</head>
<body>

    <div class="login">
	<fieldset>
  	<legend class="legend"><h1>Ingreso Ad.</h1></legend>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="input">
    	<?php echo $ErrorNombre?>
        <input type="text" name = "nombre" maxlength=15 value="<?php echo $nombre?>" placeholder="Nombre" required />
    </div>
    <div class="input">
    	<?php echo $ErrorMail?>
        <input type="email" name = "mail" maxlength=50 value="<?php echo $mail?>" placeholder="Correo" required />
    </div>
    <div class="input">
    	<?php echo $ErrorPassWord?>
    	<input type="password" name = "password" maxlength=15 placeholder="Contraseña" required />
    </div>
    <button type="submit" class="submit" name = "Enviar" value ="Enviar"><i class="fa fa-long-arrow-right"></i></button>
    </form>
    </fieldset>
    </div>

</body>
</html>
