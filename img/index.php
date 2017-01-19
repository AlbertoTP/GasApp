<?PHP  session_start();
if(!isset($_SESSION['Uid'])){
      header("Location:IniciarSesion.php");
}
require_once("../funciones/ValidarDatos.php");
if(!isAdmin($_SESSION['Unombre'])){
	header("Location:../index.html");
}
?>