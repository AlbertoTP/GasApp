<?php
          //Quita Caracteres Raros en
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES);
            return $data;
          }
    
          $nombre = "";
          $psw = "";
          $ErrorNombre = "";
          $ErrorPassWord = "";            
          if(isset($_POST['Enviar']))
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                      $nombre = $_POST['nombre'];
                      $psws = $_POST['password'];
<<<<<<< HEAD
                      $nombre = test_input($nombre);
                      $psws = test_input($psws);
                      require_once("funciones/ValidarDatos.php");
=======
                      require_once("funciones/ValidarDatos.php");
                      $nombre = test_input($nombre);
                      $psws = test_input($psws);
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
                      //Llama a la funcion VaLogin que revisa que el Usuario y la contraseña esten correctos
                      if(ValLogin($nombre, $psws,$ErrorNombre,$ErrorPassWord)){
						   	header("Location:Usuario1.php");
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
  
  <link rel="stylesheet" href="css/style0.css">
  <link rel="stylesheet" href="css/style1.css">
  <style>
  html,body{
	  width: 100%;
	  height: 100%;
	  background: url("img/gasolina2.jpg") no-repeat center center fixed;
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
	  font-family: 'Caviar Dreams';
	  font-weight: 200;
  }
  .submit {
	  width: 45px;
	  height: 45px;
	  display: block;
	  margin: 0 auto -15px auto;
	  background: #fff;
	  border-radius: 100%;
	  border: 1px solid #0000FF;
	  color: #0000FF;
	  font-size: 24px;
	  cursor: pointer;
	  box-shadow: 0px 0px 0px 7px #fff;
	  transition: 0.2s ease-out;
	}
	.submit:hover,
	.submit:focus {
	  background: #0000FF;
	  color: #fff;
	  outline: 0;
	}
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.html">Gas App</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Registro.php"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
        <li><a href="IniciarSesion.php"><span class="glyphicon glyphicon-log-in"></span> Ingreso</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div class="login">
	<fieldset>
  	<legend class="legend"><h1>Ingreso</h1></legend>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="row">
<<<<<<< HEAD
	    <?php echo $ErrorNombre?>
=======
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
    	<div class="col-sm-12 col-md-3 col-lg-3 letreros">
        	<span class="glyphicon glyphicon-user"></span> Usuario:
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="input">
<<<<<<< HEAD
=======
                <?php echo $ErrorNombre?>
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
                <input type="text" name = "nombre" maxlength=15 value="<?php echo $nombre?>" placeholder="Nombre de Usuario" required />
            </div>
    	</div>
    </div>
    <div class="row">
<<<<<<< HEAD
    	<?php echo $ErrorPassWord?>
=======
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
    	<div class="col-sm-12 col-md-3 col-lg-3 letreros">
        	<span class="glyphicon glyphicon-lock"></span> Contraseña:
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="input">
<<<<<<< HEAD
=======
                <?php echo $ErrorPassWord?>
>>>>>>> 7fc8f5c22cfebcb17fbd67108e2f06f19dd9b921
                <input type="password" name = "password" maxlength=15 placeholder="Contraseña" required />
            </div>
        </div>
    </div>
    <p align="right" class="letreros">¿Aún no eres un usuario? <a href="Registro.php">Regístrate</a></p>
    <!--<input type = "submit" name = "Enviar" value ="Enviar">-->
    <button type="submit" class="submit" name = "Enviar" value ="Enviar"><i class="fa fa-long-arrow-right"></i></button>
    </form>
    </fieldset>
    </div>
<script src="js/scroll.js"></script>

</body>
</html>
