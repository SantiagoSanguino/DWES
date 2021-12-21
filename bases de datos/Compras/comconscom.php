<?php
	/* Fichero con las funciones*/
	include "funciones.php";
	
	$usuario="root";//$_POST["user"];
	$password="rootroot";//$_POST["password"];
	$basedatos="comprasweb";//$_POST["database"];
	$connect=conexionOpenPdo($usuario,$password,$basedatos);
	
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Mostrar productos del almacen</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>NIF cliente:
			<select name="nif" id="nif"> 
			<?php
				$consulta=sacarOpcionesClientePdo($connect);
				foreach($consulta as $valor) {
					echo "<option value=\"".$valor["nif"]."\">".$valor["nif"]."</option>";
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
	if(!empty($_POST["nif"])) {
		$nif=$_POST["nif"];
		$compras=mostrarComprasPdo($connect,$nif);
		$inicio=true;
		foreach($compras as $valor) {
			if ($inicio) {
				echo "<p>Cliente ".$valor["nombreCliente"].": </br>";
				$inicio=false;
			}
			echo $valor["id_producto"].$valor["nombreProduct"].$valor["precio"]."<br />";
		}
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>

