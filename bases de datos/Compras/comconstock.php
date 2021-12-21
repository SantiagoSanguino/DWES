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
			<title>Mostrar stock</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
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
			
			</br>
				<input type="submit" value="Alta" name="alta" />
			</form> 
		</body>
		</html>
<?php
	if(!empty($_POST["producto"])) {
		$producto=$_POST["producto"];
		$productoCantidad=mostrarProdAlmaCantPdo($connect,$producto);
		?>
		<p>Cantidad de <?php echo $producto ?>: </br>
			<?php
			foreach($productoCantidad as $valor) {
				echo $valor["localidad"]." - ".$valor["cantidad"]."<br />";
			}
			?>
		
		<?php
	}
	conexionClosePdo($connect);/*Se cierra la conexion*/
?>

