<?php
      $nombre = "";
      $mail = "";
      $psw1 = "";
      $psw2 = "";
      $ErrorNombre = "";
      $ErrorEmail = "";
      $ErrorPassWord = "";
      if(isset($_POST['Enviar']))
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                  $nombre = $_POST['nombre'];
                  $mail = $_POST['mail'];
                  $psw1 = $_POST['pass1'];
                  $psw2 = $_POST['pass2'];
                  require_once("funciones/ValidarDatos.php");
                  if (Validar($nombre, $mail, $psw1,$psw2, $ErrorNombre, $ErrorEmail, $ErrorPassWord)) {
					  	//$regisrtado='<div class="alert alert-success fade in"><strong>Iniciando Sesión ...</strong></div>';
                        require_once("funciones/registrar.php");
                        Registrar($nombre, $mail, $psw1);
                  }
              }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- captcha -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Demo - MotionCAPTCHA jQuery/javascript HTML5 Canvas plugin, featuring Harmony and the Dollar/Protractor Recognizer" />
  <meta name="keywords" content="motioncaptcha,motion,captcha,jquery,plugin,javascript,html5,canvas,mrdoob,harmony,dollar,recognizer" /> 	
  <!-- This one is needed: -->
  <link rel="stylesheet" href="MotionCAPTCHA/jquery.motionCaptcha.0.2.css"/>
  <!--fin captcha-->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();  
	});
  </script>
  <script>
  	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();  
	});
	function msm(){
		alert("Enviando a Base de Datos")
	}
   </script>
  <link rel="stylesheet" href="css/style0.css">
  <link rel="stylesheet" href="css/style1.css">
  <style>
  html,body{
	  width: 100%;
	  height: 100%;
	  background: url("img/gasolina3.jpg") no-repeat center center fixed;
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
	  font-family: 'Caviar Dreams';
	  font-weight: 200;
  }
  .submit {
	  display: block;
	  margin: 0 auto -15px auto;
	  background: #fff;
	  border: 1px solid #0000FF;
	  color: #0000FF;
	  font-size: 24px;
	  cursor: pointer;
	  box-shadow: 0px 0px 0px 15px #fff;
	  transition: 0.2s ease-out;
  }
  .submit:hover,.submit:focus {
	  background: #0000FF;
	  color: #fff;
	  outline: 0;
  }
  </style>
</head>
<body id="mc-form" data-spy="scroll" data-target=".navbar" data-offset="60">

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
    <div class="register">
	<fieldset>
  	<legend class="legend"><h1>Registro</h1></legend>
    <form id="mc-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="row">
	    <?php echo $ErrorNombre?>
    	<div class="col-sm-12 col-md-3 col-lg-3 letreros">
        	<span class="glyphicon glyphicon-user"></span> Usuario:
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="input">
                <a class="test" data-toggle="tooltip" title="Longitud maxima es de 15 caracteres, puedes utilizar letras, numeros y guiones. Ejemplo: Usuario-0_123">
                <input type="text" name = "nombre" maxlength=15 value="<?php echo $nombre?>" placeholder="Nombre de Usuario" required />
                </a>
            </div>
         </div>
    </div>
    <div class="row">
    	<?php echo $ErrorEmail?>
    	<div class="col-sm-12 col-md-3 col-lg-3 letreros">
        	<span class="glyphicon glyphicon-envelope"></span> E-mail:
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="input">
                <input type="email" name = "mail" value="<?php echo $mail?>" placeholder="Correo Electronico" required />
            </div>
        </div>
    </div>
    <div class="row">
    	<?php echo $ErrorPassWord?>
    	<div class="col-sm-12 col-md-3 col-lg-3 letreros">
        	<span class="glyphicon glyphicon-lock"></span> Contraseña:
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="input">
                <a class="test" data-toggle="tooltip" title="La contraseña debe tener maximo 15 caracteres e incluir al menos una letra minúscula una mayúscula y un número">
                <input type="password" name = "pass1" maxlength=10 placeholder="Contraseña" required />
                </a>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-12 col-md-3 col-lg-3 letreros">
        	<span class="glyphicon glyphicon-lock"></span> Repetir Contraseña:
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="input">
                <input type="password" name = "pass2" maxlength=10 placeholder="Repetir Contraseña" required />
            </div>
        </div>
    </div>
    <!--captcha-->
    <div class="input" id="mc">
    	<p>Por favor, dibujar la forma en la caja para enviar el formulario: (<a onClick="window.location.reload()" href="#" title="Click for a new shape">nueva figura</a>)</p>
        <canvas id="mc-canvas">
        	Your browser doesn't support the canvas element - please visit in a modern browser.
        </canvas>
        <input type="hidden" id="mc-action" value="http://josscrowcroft.com/projects/motioncaptcha-jquery-plugin/" />
    </div>
				<!--<input disabled="disabled" autocomplete="false" type="submit" class="submit" name = "Enviar" value="Enviar" onclick="msm();">-->
    <!--fin captcha-->
    <input disabled="disabled" autocomplete="false" type="submit" class="submit" name = "Enviar" value="Enviar" onclick="msm();">
    <!--<button type="submit" class="submit" name = "Enviar" value ="Enviar" onclick="msm();"><i class="fa fa-long-arrow-right"></i></button>-->
    </form>
    </fieldset>
    </div>
<!-- HTML5 Placeholder fallback: -->
<script src="js/jquery.placeholder.1.1.1.min.js" type="text/javascript"></script>	
<!-- MotionCAPTCHA: -->
<script src="MotionCAPTCHA/jquery.motionCaptcha.0.2.js" ></script>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			// Do the biznizz:
			$('#mc-form').motionCaptcha({
				shapes: ['triangle', 'x', 'rectangle', 'circle', 'check', 'zigzag', 'arrow', 'delete', 'pigtail', 'star']
			});
			
			// Yep:
			$("input.placeholder").placeholder();
		});
</script>
</body>
</html>