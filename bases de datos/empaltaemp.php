<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	include "fconnect_close.php";
	/*Deberia haber otra forma de conseguir los valores*/
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="empleadosnn";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
	
	
	/* Compruebo que estan todos los datos necesarios */
	//if(!empty($_POST["user"])&&!empty($_POST["password"])&&!empty($_POST["database"])
	//	&&!empty($_POST["table"])&&!empty($_POST["datos"])){
	if(!empty($_POST["dni"])&&!empty($_POST["nombre"])&&!empty($_POST["apellidos"])&&!empty($_POST["fecha_nac"])&&!empty($_POST["salario"])&&!empty($_POST["departamento"])) {
		$usuario="root";//$_POST["user"];
		$password="rootroot";//$_POST["password"];
		$basedatos="empleadosnn";//$_POST["database"];
		//$tabla="empleado";//$_POST["table"];
		$dni=$_POST["dni"];
		$nombre=$_POST["nombre"];
		$apellidos=$_POST["apellidos"];
		$fecha_nac=$_POST["fecha_nac"];
		$salario=$_POST["salario"];
		$cod_dpto=$_POST["departamento"];
		$datos=array($dni,$nombre,$apellidos,$fecha_nac,$salario);
		altaEmple($connect,$datos);
	}
	if(empty($_POST["dni"])&&empty($_POST["nombre"])&&empty($_POST["apellidos"])&&empty($_POST["fecha_nac"])&&empty($_POST["salario"])) {
		
		echo "
		<!DOCTYPE HTML>
		<html>
		<head>
			<meta name=\"author\" content=\"Santiago Sanguino\" />
			<meta charset=\"utf-8\">
			<title>Alta Empleado</title>
		</head>
		<body>
			<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
			<p>DNI: <input type='text' name='dni'/></br>"./*sacarOpcionesEmpDniPdo($connect)./**/"
			<p>Nombre: <input type='text' name='nombre'/></br>
			<p>Apellidos: <input type='text' name='apellidos'/></br>
			<p>Fecha nacimiento: <input type='text' name='fecha_nac' /></br>
			<p>Salario: <input type='text' name='salario'/></br>
			<p>Codigo departamento: ";
				sacarOpcionesDeprtPdo($connect);/**/
		echo "</br></br>
				<input type=\"submit\" value=\"Alta\" name=\"alta\" />
			</form> 
		</body>
		</html>";
	}
	
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>