<?php
require_once("login.class.php");
$nuevoSingleton = login::singleton_login();
if(isset($_POST["correo"]))
{
	$correo = $_POST["correo"];
	$password = $_POST["password"];

	$usuario = $nuevoSingleton->login_users($correo, $password);

	if($usuario == TRUE)
	{
		header("location: http://www.google.com");
	}
	else{

		$mensaje = "Usuario o contraseña incorrectos. Intenta nuevamente";
		
		echo "<script>";
		echo "alert('$mensaje');";  
		echo "window.location = 'acceso.html';";
		echo "</script>";  
	}
}