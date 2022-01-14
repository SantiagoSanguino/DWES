<?php
	session_start();
	/* Fichero con las funciones*/
	include "funciones.php";
	
	if(!empty($_POST["username"])&&!empty($_POST["password"])) {
		$usuario="root";//$_POST["user"];
		$password="rootroot";//$_POST["password"];
		$basedatos="comprasweb";//$_POST["database"];
		$connect=conexionOpenPdo($usuario,$password,$basedatos);
		$user=$_POST["username"];
		$pass=$_POST["password"];
		$essesion=resgistroCliente($connect,$user,$pass);
		
		if($essesion){
			session_unset();
			$_SESSION["username"]=$user;
			$_SESSION["password"]=$pass;
		}
		conexionClosePdo($connect);/*Se cierra la conexion*/
	}
	if(isset($_SESSION["username"])&&isset($_SESSION["password"])) {
		
		
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Sesion iniciada <?php echo $_SESSION["username"] ?> </title>
		</head>
		<body>
			
				<!-- <a href=""><input type="" value=" " name=" " /></a> <!-- -->
			
		</body>
		</html>
		<?php
	}else if(!isset($_SESSION["username"])&&!isset($_SESSION["password"])) {
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Login</title>
		</head>
		<body>
			<h3>Inicio de sesion de usuario de la base de datos</h3>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>Usuario: <input type="text" name="username" id="username" /></br>
			<p>Contraseña: <input type="password" name="password" id="password" /></br>
			</br>
				<input type="submit" value="Iniciar sesion" name="Iniciar sesion" />
			</form>
		</body>
		</html>
<?php
	}
?>