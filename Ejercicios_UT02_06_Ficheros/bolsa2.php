<?php
	include "funciones_bolsa.php";
	if(!empty($_POST["fichero"])&&!empty($_POST["bursatil"])) {
		/* Ejecutar funcion */
		valorBursatil($_POST["fichero"],$_POST["bursatil"]);
	}
	
	/* Formulario */
	if(empty($_POST["fichero"])&&empty($_POST["bursatil"])) {
		echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">
				<br/>
				<label for=\"fichero\">Fichero bolsa (Path/nombre): </label>
				<input type=\"text\" name=\"fichero\" /> </br>
				<label for=\"bursatil\">Valor Bursatil: </label>
				<input type=\"text\" name=\"bursatil\" /> </br></br>
				</br>
				<input type=\"submit\" name=\"enviar\" value=\"Ver datos bolsa\">
				<input type=\"reset\" name=\"borrar\" value=\"Borrar\"></br>
			</form>";
	}
?>