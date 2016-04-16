<?php

require_once("conexion.class.php");
session_start();
class login
{
	private static $instancia;
	private $dbh;

	private function __construct()
	{
		$this->dbh = Conexion::singleton_conexion();

	}

	public static function singleton_login()
	{
		if(!isset(self::$instancia)){
			$miclase =__CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function login_users($correo,$password)
	{
		try{
			$sql = "SELECT * FROM usuarios where Correo = ? AND password = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$correo);
			$query->bindParam(2,md5($password));
			$query->execute();
			$this->dbh = null;

			//SI EXISTE VA A LA PAGINA
			if($query->rowCount()==1)
			{
				$fila = $query->fetch();
				$_SESSION["correo"] = $fila["correo"];
				return true;
			}

		}catch(PDOException $e){
			print "Error!: " . $e->getMessage();
		}
	}


}
/*
if(isset($_POST["correo"])){
	$correo=$_POST["Correo"];
	$password=md5($_POST["password"]);

	$sentencia = $conn->prepare("SELECT * FROM usuarios where (Correo = ? && password = ?)");
	$sentencia->bindParam(1, $correo);
	$sentencia->bindParam(2, $password);

	$result = $sth->fetchAll();
	if(result>0)
	{
		$sentencia->execute();
	header("Location: http://www.google.com");
	}
	if(result<=0)
	{
		$sentencia->execute();
		header("Location: acceso.html");
	}

}
*/
?>


