<?php
	
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="comprasweb";//$_POST["database"];
	/*Conexion a la base de datos*/
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
?>