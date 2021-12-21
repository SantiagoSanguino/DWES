<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="comprasweb";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
	if(!empty($_POST["cantidad"])) {
		$cantidad=$_POST["cantidad"];
		$almacen=$_POST["almacen"];
		$producto=$_POST["producto"];
		aprovisionarProdAlma($connect,$producto,$almacen,$cantidad);
	}
	if(empty($_POST["cantidad"])) {
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Asignar cantidad producto a un almacen</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>Localidad almacen:
			<select name="almacen" id="almacen"> 
			<?php
				$consulta=sacarOpcionesAlmaNumPdo($connect);
				foreach($consulta as $valor) {
					echo "<option value=\"".$valor["num_almacen"]."\">".$valor["num_almacen"]."</option>";
				}/**/
			?>
			</select>
			</p>
			<p>Nombre producto:
			<select name="producto" id="producto"> 
			<?php
				$consulta=sacarOpcionesProdPdo($connect);
				foreach($consulta as $valor) {
					echo "<option value=\"".$valor["nombre"]."\">".$valor["nombre"]."</option>";
				}/**/
			?>
			</select>
			</p>
			<p>Cantidad: <input type="text" name="cantidad" id="cantidad" /></br>
			</br>
				<input type="submit" value="Alta" name="alta" />
			</form> 
		</body>
		</html>
<?php
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>

