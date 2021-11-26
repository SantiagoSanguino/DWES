<?php
	function conexionOpenProce($user,$pass,$base) { // Abrir conexion mysqli procedural
		$servername="localhost";
		$connect=mysqli_connect($servername,$user,$pass,$base);
		if(!$connect) {
			die("Conexion fallida: ". mysqli_connect_error());
		}
		return $connect;
	}
	function conexionCloseProce($connect) {  // Cerrar conexion mysqli procedural
		mysqli_close($connect);
	}
	
	function conexionOpenObject($user,$pass,$base) { // Abrir conexion mysqli object
		$servername="localhost";
		$connect=new mysqli($servername,$user,$pass,$base);
		if($connect->connect_error) {
			die("Conexion fallida: ".$connect->connect_error);
		}
		return $connect;
	}
	function conexionCloseObject($connect) {  // Cerrar conexion mysqli object
		$connect->close();
	}
	
	function conexionOpenPdo($user,$pass,$base) { // Abrir conexion mysql PDO
		$servername="localhost";
		$connect=new PDO("mysql:host=$servername;dbname=$base",$user,$pass);
		$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $connect;
	}
	function conexionClosePdo($connect) {  // Cerrar conexion mysql PDO
		$connect=null;
	}
	
?>