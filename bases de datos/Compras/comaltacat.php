<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="comprasweb";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
	if(!empty($_POST["nombre"])) {
		$nombre=$_POST["nombre"];
		altaCategoria($connect,$nombre);
	}
	if(empty($_POST["nombre"])) {
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Alta de Categoria</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>Nombre: <input type="text" name="nombre" id="nombre" /></br>
			</br>
				<input type="submit" value="Alta" name="alta" />
			</form> 
		</body>
		</html>
<?php
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>