<?php
	include "funciones_bolsa.php";
	if(!empty($_POST["fichero"])) {
		/* Ejecutar funcion */
		mostrarBolsa($_POST["fichero"]);
	}
	
	/* Formulario */
	if(empty($_POST["enviar"])) {
		echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
				<br/>
				<label for=\"fichero\">Fichero bolsa (Path/nombre): </label>
				<input type=\"text\" name=\"fichero\" /> </br></br>
				</br>
				<input type=\"submit\" name=\"enviar\" value=\"Ver datos bolsa\">
				<input type=\"reset\" name=\"borrar\" value=\"Borrar\"></br>
			</form>";
	}
?>