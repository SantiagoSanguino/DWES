<?php
	/* Sesiones */
	//session_start();
	/* Cookies */
	$cookie_name="NIF/Usuario";
	
	/* Fichero con las funciones*/
	
	include "funciones.php";
	/* Sesion */
	/*
	if(!isset($_SESSION["nif"])&&!isset($_SESSION["username"])) {
		header("location: comlogincli.php");
	} /* */
	/* Cookies */
	if(!isset($_COOKIE["cookie_name"])) {
		//header("location: comlogincli.php");
	} /* */
?>

	<html>
	<head>
		<meta name="author" content="Santiago Sanguino" />
		<meta charset="utf-8">
		<title> Welcome</title>
	</head>
<?php
	/* Sesiones */
	/*
	if(isset($_SESSION["nif"])&&isset($_SESSION["username"])) {
?>
	<body>
			<div>
				<h4>Sesion iniciada <?php echo $_SESSION["nif"]." / ". $_SESSION["username"] ?></h4>
				
<?php
	} 	/* */
	/* Cookies*/
	
	//if(isset($_COOKIE["cookie_name"])) {
	?>
	<body>
			<div>
				<h4>Sesion iniciada <?php echo strstr($_COOKIE[$cookie_name],"/",1) ?></h4>
				
<?php
	//}	/* */
?>
				<ul>
					<li><a href="compro.php">Compra de producto</a></li>
					<li><a href="comconscom.php">Consultar compras</a></li>
				</ul>
			</div>
			<form action="comlogincli.php" method="post">
				<input type="submit" value="Cerrar sesion" name="Cerrar sesion" >
			</form>
			<!-- <a href=""><input type="" value=" " name=" " /></a> <!-- -->
		
	</body>
	</html>