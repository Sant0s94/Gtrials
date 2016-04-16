<?php
require_once("base_datos.php");
if(isset($_POST["correo"])){
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$correo=$_POST["correo"];
	$password=md5($_POST["password"]);
	$universidad=$_POST["universidad"];
	$gender=$_POST["gender"];


	$sentencia = $conn->prepare("INSERT INTO usuarios(Nombre, Apellido, Correo, password, Universidad, Sexo) VALUES (?, ?, ?, ?, ?, ?)");
	$sentencia->bindParam(1, $nombre);
	$sentencia->bindParam(2, $apellido);
	$sentencia->bindParam(3, $correo);
	$sentencia->bindParam(4, $password);
	$sentencia->bindParam(5, $universidad);
	$sentencia->bindParam(6, $gender);


	$sentencia->execute();
	header("Location: http://www.google.com");
}
?>