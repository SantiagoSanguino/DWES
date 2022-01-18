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
		$essesion=comprobarInicio($connect,$user,$pass);
		
		if($essesion){
			session_unset();
			$_SESSION["username"]=$user;
			header("location: comwelcome.php");
		}
		conexionClosePdo($connect);/*Se cierra la conexion*/
	}
	?>
	<html>
	<head>
		<meta name="author" content="Santiago Sanguino" />
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<h3>Inicio de sesion de usuario</h3>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
		<p>Usuario: <input type="text" name="username" id="username" /></br>
		<p>Contraseña: <input type="password" name="password" id="password" /></br>
		</br>
			<input type="submit" value="Iniciar sesion" name="Iniciar sesion" />
		</form>
	</body>
	</html>