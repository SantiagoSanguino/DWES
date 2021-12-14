<?php

	include "fempinfosal.php";
	/*Deberia haber otra forma de conseguir los valores*/
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="empleadosnn";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
		
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Empleado info salario</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>DNI: 
			<select name="dni" id="dni"> 
			<?php
				$consulta=sacarOpcionesEmpDniPdo($connect);
				foreach($consulta as $valor) {
					echo "<option value=\"".$valor["dni"]."\">".$valor["dni"]."</option>";
				}/**/
			?>
			</select>
			</p>
			</br>
				<input type="submit" value="Mostrar" name="mostrar" /><br/>
			</form> 
		</body>
		</html>
<?php
	if(!empty($_POST["dni"])) {
		
		$dni=$_POST["dni"];
		echo empinfosal($connect,$dni);
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>