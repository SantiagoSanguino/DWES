<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="comprasweb";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
	if(!empty($_POST["nombre"])&&!empty($_POST["categoria"])) {
		$nombre=$_POST["nombre"];
		$precio=$_POST["precio"];
		$categoria=$_POST["categoria"];
		altaProducto($connect,$nombre,$precio,$categoria);
	}
	if(empty($_POST["nombre"])&&empty($_POST["categoria"])) {
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Alta de Producto</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>Nombre: <input type="text" name="nombre" id="nombre" /></br>
			<p>Precio: <input type="text" name="precio" id="precio" /></br>
			<p>Nombre categoria:
			<select name="categoria" id="categoria"> 
			<?php
				$consulta=sacarOpcionesCategPdo($connect);
				foreach($consulta as $valor) {
					echo "<option value=\"".$valor["nombre"]."\">".$valor["nombre"]."</option>";
				}/**/
			?>
			</select>
			</p>
			</br>
				<input type="submit" value="Alta" name="alta" />
			</form> 
		</body>
		</html>
<?php
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>

