<?php

	if(!empty($_POST["fichero"])) {
		/* Nombre y/o ruta del fichero */
		$fichero=$_POST["fichero"];
		
		echo "<b>Nombre del fichero: </b>".basename($fichero)."<br/>";
		$direct=realpath($fichero);
		echo "<b>Directorio: </b>".substr($direct,0,strrpos($direct,"\\"))."<br/>";
		echo "<b>Tamaño del fichero: </b>".filesize($fichero)."<br/>";
		echo "<b>Fecha ultima modificacion fischero: </b>".date("F d Y H:i:s",filectime($fichero))."<br/>";
	}
	
	/* Formulario */
	if(empty($_POST["fichero"])) {
		echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
				<br/>
				<label for=\"fichero\">Fichero (Path/nombre): </label>
				<input type=\"text\" name=\"fichero\" /> </br></br>
				</br>
				<input type=\"submit\" name=\"enviar\" value=\"Ver datos fichero\">
				<input type=\"reset\" name=\"borrar\" value=\"Borrar\"></br>
			</form>";
	}
?>