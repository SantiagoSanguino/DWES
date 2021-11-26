<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	include "fconnect_close.php";
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="empleados1n";//$_POST["database"];
	/* Compruebo que estan todos los datos necesarios */
	//if(!empty($_POST["user"])&&!empty($_POST["password"])&&!empty($_POST["database"])
	//	&&!empty($_POST["table"])&&!empty($_POST["datos"])){
	if(!empty($_POST["dni"])&&!empty($_POST["nombre_e"])&&!empty($_POST["fecha_nac"])&&!empty($_POST["departamento"])) {
		$usuario="root";//$_POST["user"];
		$password="rootroot";//$_POST["password"];
		$basedatos="empleados1n";//$_POST["database"];
		$tabla="empleado";//$_POST["table"];
		$dni=$_POST["dni"];
		$nombre_e=$_POST["nombre_e"];
		$fecha_nac=$_POST["fecha_nac"];
		$nombre_d=$_POST["departamento"];
		$datos=array($dni,$nombre_e,$fecha_nac,$nombre_d);
		altaEmple($usuario,$password,$basedatos,$tabla,$datos);
	}
	if(empty($_POST["dni"])&&empty($_POST["datos"])&&empty($_POST["fecha_nac"])&&empty($_POST["nombre_d"])){
			
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
			<p>DNI: <input type='text' name='dni'/></br>
			<p>Nombre empleado: <input type='text' name='nombre_e'/></br>
			<p>Fecha nacimiento: <input type='text' name='fecha_nac' /></br>
			<p>Nombre departamento: ";
					sacarOpcionesDeprt($usuario,$password,$basedatos);
		echo "</br></br>
				<input type=\"submit\" value=\"Alta\" name=\"alta\" />
			</form> 
		</body>
		</html>";
	}
	/*if(empty($_POST["user"])&&empty($_POST["password"])&&empty($_POST["database"])
		&&empty($_POST["table"])&&empty($_POST["datos"])){
			
		echo "
		<!DOCTYPE HTML>
		<html>
		<head>
			<meta name=\"author\" content=\"Santiago Sanguino\" />
			<meta charset=\"utf-8\">
			<title>Alta</title>
		</head>
		<body>
			<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
			<!--<p>Usuario: <input type='text' name='user'></br>
			<p>Contraseña: <input type='password' name='password'></br>
			<p>Base de datos: <input type='text' name='database'></br>-->
			<p>Tabla: <input type='text' name='table'></br>
			<p>Datos: <input type='text' name='datos'></br></br>
				<input type=\"submit\" value=\"Alta\" name=\"alta\">
			</form>
		</body>
		</html>";
	}/**/
?>