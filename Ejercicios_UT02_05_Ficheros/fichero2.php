<?php
	include "fcomprobarfecha.php";
	/* Apertura o creacion del fichero con el puntero al comienzo para escribir */
	$carpeta="../../files/";
	$fichero="alumnos2.txt";
	
	$file=fopen($carpeta.$fichero,"a+");
	
	if(!empty($_POST["nombre"])&&!empty($_POST["apellido1"])&&!empty($_POST["apellido2"])&&!empty($_POST["fechaBorn"])&&!empty($_POST["localidad"])){
		$nombre=$_POST["nombre"];
		$apellido1=$_POST["apellido1"];
		$apellido2=$_POST["apellido2"];
		$fechaBorn=$_POST["fechaBorn"];
		$localidad=$_POST["localidad"];
		$esfecha=comprobarFecha($fechaBorn);
		if($esfecha) {
			fwrite($file,str_pad($nombre,40,"#").str_pad($apellido1,41,"#").str_pad($apellido2,42,"#").
			str_pad($fechaBorn,10,"#").str_pad($localidad,26,"#")."\n");
		}else {
			echo "No es una fecha valida";
		}
	}
	fclose($file);
	
	/* Formulario */
	if(empty($_POST["continuar"])||$_POST["continuar"]!="no"){
		echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
				<label for=\"nombre\">Nombre</label></br>
				<input type=\"text\" name=\"nombre\" /> </br>
				<label for=\"apellido1\">Apellido 1</label></br>
				<input type=\"text\" name=\"apellido1\" /> </br>
				<label for=\"apellido2\">Apellido 2</label></br>
				<input type=\"text\" name=\"apellido2\" /> </br>
				<label for=\"fechaBorn\">Fecha nacimiento</label></br>
				<input type=\"text\" name=\"fechaBorn\" /> </br>
				<label for=\"localidad\">Localidad</label></br>
				<input type=\"text\" name=\"localidad\" /> </br>
				<legend>¿Desea continuar?</legend>
				<input type=\"radio\" value=\"si\" name=\"continuar\" /> Si </br>
				<input type=\"radio\" value=\"no\" name=\"continuar\" /> No </br>
				</br>
				<input type=\"submit\" name=\"Escribir\" value=\"Escribir\">
				<input type=\"reset\" name=\"borrar\" value=\"Borrar\"></br>
			</form>";
	}
	
?>