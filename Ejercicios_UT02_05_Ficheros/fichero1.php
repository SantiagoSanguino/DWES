<?php
	/* Una comprobacion de servidor para la fecha seria hacer date(d/m/Y)
		Asi la validaria sin necesidad de una funcion*/
	include "fcomprobarfecha.php";
	/* Apertura o creacion del fichero con el puntero al comienzo para escribir */
	$carpeta="../../files/";
	$fichero="alumnos1.txt";
	
	$file=fopen($carpeta.$fichero,"a+");
	if(!empty($_POST["nombre"])&&!empty($_POST["apellido1"])&&!empty($_POST["apellido2"])&&!empty($_POST["fechaBorn"])&&!empty($_POST["localidad"]))
	{
		$nombre=$_POST["nombre"];
		$apellido1=$_POST["apellido1"];
		$apellido2=$_POST["apellido2"];
		$fechaBorn=$_POST["fechaBorn"];
		$localidad=$_POST["localidad"];
		$esfecha=comprobarFecha($fechaBorn);
		if($esfecha) {
			//str_pad()
			//El pad_string de " " es omitible ya que por defecto seria con espacios
			fwrite($file,str_pad($nombre,40," ").str_pad($apellido1,41," ").str_pad($apellido2,42," ").
			str_pad($fechaBorn,10," ").str_pad($localidad,26," ")."\n");
			// Tambien estarian las opciones str_pad_left y str_pad_both
		}else {
			echo "No es una fecha valida";
		}
		
		/* Codigo antiguo
		$espacios="                                                                                ";
		fwrite($file,$nombre.$espacios,40);
		fwrite($file,$apellido1.$espacios,41);
		fwrite($file,$apellido2.$espacios,42);
		fwrite($file,$fechaBorn.$espacios,10);
		fwrite($file,$localidad.$espacios,26);
		fwrite($file," \n");/**/
	}
	fclose($file);
	
	/* Formulario */
	if(empty($_POST["continuar"])||$_POST["continuar"]!="no") {
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