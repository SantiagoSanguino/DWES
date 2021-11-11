<?php

	if((!empty($_POST["fichori"])||!empty($_POST["fichdest"]))&&!empty($_POST["fichact"])) {
		$mensaje="";
		/* Nombre y/o ruta del fichero */
		$fichero1=$_POST["fichori"]; //Fichero Origen
		$fichero2=$_POST["fichdest"]; // Fichero destino
		if($_POST["fichact"]=="copyfich") {
			// Copiar fichero
			/* Compruebo si han escrito algo en el destino y si existe el fichero origen*/
			if(!empty($_POST["fichori"])&&!empty($_POST["fichdest"])&&(file_exists($fichero1)==1)) {
				/* Compruebo si son fichero los dos valores que me pasan*/
				if(is_file($fichero1)) {
					$direct=substr($fichero2,0,strrpos($fichero2,"\\"));
					if(file_exists($direct)==0){
						/* En el caso de que no exista lo creo*/
						//El directorio seria con mkdir
						mkdir($direct);
						$mensaje=$mensaje."Directorio creado<br/>";
					}
					//En el caso de que exista solo copia
					/* Se deben usar las \ para crear definir los directorios*/
					copy($fichero1,$fichero2);
					$mensaje=$mensaje."Archivo copiado correctamente<br/>";
				}
			}else {
				$mensaje=$mensaje."No se puede copiar";
			}
		}else if($_POST["fichact"]=="renamefich") {
			// Renombrar fichero
			if(!empty($_POST["fichori"])&&!empty($_POST["fichdest"])) {
				$fichero2=$_POST["fichdest"]; // Nuevo nombre
				rename($fichero1,$fichero2);
				$mensaje=$mensaje."Se ha renombrado correctamente<br/>";
			}else {
				$mensaje=$mensaje." No se puede renombrar el archivo<br/>";
			}
		}else if($_POST["fichact"]=="deletfich") {
			// Borrar fichero
			if(!empty($_POST["fichori"])&&file_exists($fichero1)==1){
				unlink($fichero1);
				$mensaje=$mensaje."Se ha borrado correctamente<br/>";
			}else if(!empty($_POST["fichdest"])&&file_exists($fichero2)==1){
				unlink($fichero2);
				$mensaje=$mensaje."Se ha borrado correctamente<br/>";
			}else{
				$mensaje=$mensaje."No se puede borrar el fichero<br/>";
			}
		}
		echo $mensaje;
	}
	
	/* Formulario */
	if(empty($_POST["fichori"])||empty($_POST["fichact"])) {
		echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
				<br/>
				<label for=\"fichori\">Fichero Origen (Path/nombre): </label>
				<input type=\"text\" name=\"fichori\" /> </br>
				<label for=\"fichdest\">Fichero Destino (Path/nombre): </label>
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