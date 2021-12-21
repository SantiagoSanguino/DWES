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
			<p>Localidad almacen:
			<select name="localidad" id="localidad"> 
			<?php
				$consulta=sacarOpcionesAlmaLocalPdo($connect);
				foreach($consulta as $valor) {
					echo "<option value=\"".$valor["localidad"]."\">".$valor["localidad"]."</option>";
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
	if(!empty($_POST["localidad"])) {
		$localidad=$_POST["localidad"];
		$almacenProducto=mostrarAlmaProdPdo($connect,$localidad);
		$inicio=true;
		foreach($almacenProducto as $valor) {
			if ($inicio) {
				echo "<p>Productos en ".$valor["localidad"].": </br>";
				$inicio=false;
			}
			echo $valor["nombre"]."<br />";
		}
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>

