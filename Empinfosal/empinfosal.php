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
			<p>Departamento: 
			<select name="departamento" id="departamento"> 
			<?php
				$consulta=sacarOpcionesDeprtPdo($connect);
				foreach($consulta as $valor) {
					echo "<option value=\"".$valor["nombre_dpto"]."\">".$valor["nombre_dpto"]."</option>";
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
	if(!empty($_POST["departamento"])) {
		
		$departamento=$_POST["departamento"];
		echo empinfosal($connect,$departamento);
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>