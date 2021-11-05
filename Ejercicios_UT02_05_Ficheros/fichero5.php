<?php
	//$carpeta="../../files/";
	
	if(!empty($_POST["fichero"])&&!empty($_POST["mostrar"])) {
		/* Apertura o creacion del fichero con el puntero al comienzo para escribir */
		$fichero=$_POST["fichero"]; //El fichero deberia de ser "quijote.txt" en esta ocasion
		/* Mostrarlo con file */
		
		$file=file($fichero);
		if ($_POST["mostrar"]=="mostrarfich") {
			$cont=0;
			$filesize=count($file);
			while($cont<$filesize){
				echo $file[$cont];
				$cont++;
			}
		}else if ($_POST["mostrar"]=="mostrarlinea") {
			$num=$_POST["numlinea"];
			echo $file[$num];
		}else if ($_POST["mostrar"]=="mostrarXlineas") {
			$num=$_POST["numXlinea"];
			for($i=0;$i<$num;$i++){
				echo $file[$num];
			}
		}/**/
		/* Mostrarlo con fopen */
		/*
		$file=fopen($fichero,"r");
		if ($_POST["mostrar"]=="mostrarfich") {
			while(!feof($file)){
				echo fgets($file);
			}
		}else if ($_POST["mostrar"]=="mostrarlinea") {
			$num=$_POST["numlinea"];
			for($i=1;$i<$num;$i++){
				fgets($file);
			}
			echo fgets($file);
		}else if ($_POST["mostrar"]=="mostrarXlineas") {
			$num=$_POST["numXlinea"];
			for($i=0;$i<$num;$i++){
				echo fgets($file);
			}
		}
		// Cierro el fichero al terminar de mostrarlo
		fclose($file);/**/
	}
	
	/* Formulario */
	if(empty($_POST["fichero"])) {
		echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
				<br/>
				<label for=\"fichero\">Fichero (Path/nombre): </label>
				<input type=\"text\" name=\"fichero\" /> </br><br/>
				<legend>Operaciones</legend>
				<input type=\"radio\" value=\"mostrarfich\" name=\"mostrar\" /> Mostrar fichero </br>
				<input type=\"radio\" value=\"mostrarlinea\" name=\"mostrar\" /> Mostrar linea 
				<input type=\"text\" name=\"numlinea\" size=\"3\" maxlength=\"3\"/> fichero </br>
				<input type=\"radio\" value=\"mostrarXlineas\" name=\"mostrar\" /> Mostrar  
				<input type=\"text\" name=\"numXlinea\" size=\"3\" maxlength=\"3\"/> primeras lineas</br></br>
				</br>
				<input type=\"submit\" name=\"enviar\" value=\"Enviar\">
				<input type=\"reset\" name=\"borrar\" value=\"Borrar\"></br>
			</form>";
	}
	
?>