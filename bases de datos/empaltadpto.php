<?php
	include "funciones.php";
	include "fconnect_close.php";
	if(!empty($_POST["datos"])) {
		$usuario="root";//$_POST["user"];
		$password="rootroot";//$_POST["password"];
		$basedatos="empleadosnn";//$_POST["database"];
		
		$connect=conexionOpenPdo($usuario,$password,$basedatos);
			altaDpto($connect,$_POST["datos"]);
		conexionClosePdo($connect);
	}
	echo "
	</br>
	<a href=\"empaltadpto.html\">
		<input type=\"button\" name=\"Volver\" value=\"Volver\"/>
	</a>"
?>