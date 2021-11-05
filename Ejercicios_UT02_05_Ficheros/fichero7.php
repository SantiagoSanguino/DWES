<?php

	if(!empty($_POST["fichori"])&&!empty($_POST["fichact"])) {
		$mensaje="";
		/* Nombre y/o ruta del fichero */
		$fichero1=$_POST["fichori"]; //Fichero Origen
		if($_POST["fichact"]=="copyfich") {
			// Copiar fichero
			/* Compruebo si han escrito algo en el destino y si existe el fichero origen*/
			if(!empty($_POST["fichdest"])&&(file_exists($fichero1)==1)) {
				$fichero2=$_POST["fichdest"]; // Fichero destino
				/* Compruebo si son fichero los dos valores que me pasan*/
				if(is_file($fichero1)) {
					if(!is_file($fichero2)){
						/* En el caso de que no exista lo creo*/
					}
					$mensaje=$mensaje."Son ficheros";
				}else {
					$mensaje=$mensaje."No son ficheros";
				}
			}
		}else if($_POST["fichact"]=="renamefich") {
			// Renombrar fichero
		}else if($_POST["fichact"]=="deletfich") {
			// Borrar fichero
		}
		echo $mensaje;
	}
	
	/* Formulario */
	if(empty($_POST["fichori"])||empty($_POST["fichact"])) {
		echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
				<br/>
				<label for=\"fichori\">Fichero Origen(Path/nombre): </label>
				<input type=\"text\" name=\"fichori\" /> </br>
				<label for=\"fichdest\">Fichero Destino(Path/nombre): </label>
				<input type=\"text\" name=\"fichdest\" /> </br></br>
				<legend>Operaciones</legend>
				<input type=\"radio\" value=\"copyfich\" name=\"fichact\" /> Copiar fichero </br>
				<input type=\"radio\" value=\"renamefich\" name=\"fichact\" /> Renombrar fichero </br>
				<input type=\"radio\" value=\"deletfich\" name=\"fichact\" /> Borrar fichero </br></br>
				</br>
				<input type=\"submit\" name=\"enviar\" value=\"Ver datos fichero\">
				<input type=\"reset\" name=\"borrar\" value=\"Borrar\"></br>
			</form>";
	}
?>