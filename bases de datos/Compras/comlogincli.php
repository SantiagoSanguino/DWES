<?php
	/* Sesiones */
	//session_start();
	/* Cookies */
	$cookie_name="NIF/Usuario";
	
	/* Fichero con las funciones*/
	include "funciones.php";
	include "loginbbdd.php";
	
	
		
	if(!empty($_POST["username"])&&!empty($_POST["password"])) {
		
		$user=$_POST["username"];
		$pass=$_POST["password"];
		$essesion=comprobarInicio($connect,$user,$pass);
		$nif=getNif($connect,$user,$pass);
		/* Cookies */
		$cookie_value=$nif."/".$user;
		//if($essesion){
			setcookie($cookie_name,$cookie_value,time() + (24*60*60), "/" );
			// La / en las cookies significa la ruta
			header("location: comwelcome.php");
		/*}else {
			setcookie($cookie_name,"",time() - (24*60*60) );
		} /* */
		
		/* Sesiones */
		/*
		if($essesion){
			session_unset();
			$_SESSION["username"]=$user;
			$_SESSION["nif"]=$nif;
			header("location: comwelcome.php");
		}else {
			session_unset();
			session_destroy();
		} /* */
		conexionClosePdo($connect);/*Se cierra la conexion*/
	}else {
		if(isset($_COOKIE["cookie_name"])) {
			setcookie($cookie_name,"",time() - (24*60*60) ); 
		}
		if(isset($_SESSION["nif"])&&isset($_SESSION["username"])) {
			session_unset();
			session_destroy();
		}
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