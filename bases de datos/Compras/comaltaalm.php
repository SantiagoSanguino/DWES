<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="comprasweb";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
	if(!empty($_POST["localidad"])) {
		$localidad=$_POST["localidad"];
		altaAlmacen($connect,$localidad);
	}
	if(empty($_POST["localidad"])) {
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Alta almacen</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>Localidad: <input type="text" name="localidad" id="localidad" /></br>
			</br>
				<input type="submit" value="Alta" name="alta" />
			</form> 
		</body>
		</html>
<?php
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>

