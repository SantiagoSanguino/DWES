<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="comprasweb";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
	if(!empty($_POST["nif"])) {
		$nif=$_POST["nif"];
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$cp=$_POST["cp"];
		$direccion=$_POST["direccion"];
		$ciudad=$_POST["ciudad"];
		$datos=array($nif,$nombre,$apellido,$cp,$direccion,$ciudad);
		
		altaCliente($connect,$datos);
	}
	if(empty($_POST["nif"])) {
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Alta Cliente</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>NIF: <input type="text" name="nif" id="nif" /></br>
			<p>Nombre: <input type="text" name="nombre" id="nombre" /></br>
			<p>Apellido: <input type="text" name="apellido" id="apellido" /></br>
			<p>Codigo Postal: <input type="text" name="cp" id="cp" /></br>
			<p>Direccion: <input type="text" name="direccion" id="direccion" /></br>
			<p>Ciudad: <input type="text" name="ciudad" id="ciudad" /></br>
			</br>
				<input type="submit" value="Alta" name="alta" />
			</form>
		</body>
		</html>
<?php
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>

