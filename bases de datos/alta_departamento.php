<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	include "fconnect_close.php";
	/* Compruebo que estan todos los datos necesarios */
	//if(!empty($_POST["user"])&&!empty($_POST["password"])&&!empty($_POST["database"])
	//	&&!empty($_POST["table"])&&!empty($_POST["datos"])){
	if(!empty($_POST["datos"])) {
		$usuario="root";//$_POST["user"];
		$password="rootroot";//$_POST["password"];
		$basedatos="empleados1n";//$_POST["database"];
		$tabla="departamento";//$_POST["table"];
		$datos=$_POST["datos"];
		altaDeprt($usuario,$password,$basedatos,$tabla,$datos);
	}
	if(empty($_POST["datos"])){
		echo "
		<!DOCTYPE HTML>
		<html>
		<head>
			<meta name=\"author\" content=\"Santiago Sanguino\" />
			<meta charset=\"utf-8\">
			<title>Alta Departamento</title>
		</head>
		<body>
			<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
			<p>Datos: <input type='text' name='datos'></br></br>
				<input type=\"submit\" value=\"Alta\" name=\"alta\">
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
			<p>Usuario: <input type='text' name='user'></br>
			<p>Contraseña: <input type='password' name='password'></br>
			<p>Base de datos: <input type='text' name='database'></br>
			<p>Tabla: <input type='text' name='table'></br>
			<p>Datos: <input type='text' name='datos'></br></br>
				<input type=\"submit\" value=\"Alta\" name=\"alta\">
			</form>
		</body>
		</html>";
	}/**/
?>