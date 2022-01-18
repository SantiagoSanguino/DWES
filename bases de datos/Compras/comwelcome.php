<?php
	session_start();
	/* Fichero con las funciones*/
	include "funciones.php";
	
	if(!isset($_SESSION["username"])) {
		header("location: comlogincli.php");
	}
?>

	<html>
	<head>
		<meta name="author" content="Santiago Sanguino" />
		<meta charset="utf-8">
		<title> Welcome</title>
	</head>
<?php
	if(isset($_SESSION["username"])) {
?>
	<body>
			<div>
				<h4>Sesion iniciada <?php echo $_SESSION["username"] ?></h4>
				
				<ul>
					<li><a href="compro.php">Compra de producto</a></li>
					<li><a href="comconscom.php">Consultar compras</a></li>
				</ul>
			</div>
			<!-- <a href=""><input type="" value=" " name=" " /></a> <!-- -->
		
	</body>
	</html>
<?php
	}
?>