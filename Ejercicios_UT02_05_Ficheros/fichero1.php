<?php
	/* Apertura o creacion del fichero con el puntero al comienzo para escribir */
	$file=fopen("alumnos1.txt","a+");
	
	if(!empty($_POST["nombre"])&&!empty($_POST["apellido1"])&&!empty($_POST["apellido2"])&&!empty($_POST["fechaBorn"])&&!empty($_POST["localidad"])){
		$nombre=$_POST["nombre"];
		$apellido1=$_POST["apellido1"];
		$apellido2=$_POST["apellido2"];
		$fechaBorn=$_POST["fechaBorn"];
		$localidad=$_POST["localidad"];
		
		fwrite($file,"Nombre:".$nombre." Apellido1:".$apellido1." Apellido2:".$apellido2." Fecha Nacimiento:".$fechaBorn." Localidad:".$localidad." \n");
		/*fwrite($file," Nombre: ".$nombre);
		fwrite($file," Apellido1: ".$apellido1);
		fwrite($file," Apellido2: ".$apellido2);
		fwrite($file," Fecha Nacimiento: ".$fechaBorn);
		fwrite($file," Localidad: ".$localidad);
		fwrite($file," \n");/**/
	}
	
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
	fclose($file);
?>