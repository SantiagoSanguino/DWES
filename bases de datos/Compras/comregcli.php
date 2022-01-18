<?php
	session_start();
	/* Fichero con las funciones*/
	include "funciones.php";
	
	if(!empty($_POST["nif"])&&!empty($_POST["apellido"])) {
		$usuario="root";//$_POST["user"];
		$password="rootroot";//$_POST["password"];
		$basedatos="comprasweb";//$_POST["database"];
		$connect=conexionOpenPdo($usuario,$password,$basedatos);
		
		$nif=$_POST["nif"];
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$cp=$_POST["cp"];
		$direccion=$_POST["direccion"];
		$ciudad=$_POST["ciudad"];
		$clave=createClave($apellido);
		$datos=array($nif,$nombre,$apellido,$cp,$direccion,$ciudad,$clave);
		
		resgistroCliente($connect,$datos);
		
		conexionClosePdo($connect);/*Se cierra la conexion*/
	}
		
		
		?>
		<html>
		<head>
			<meta name="author" content="Santiago Sanguino" />
			<meta charset="utf-8">
			<title>Registro de cliente</title>
		</head>
		<body>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
			<p>NIF: <input type="text" name="nif" id="nif" /></br>
			<p>Nombre: <input type="text" name="nombre" id="nombre" /></br>
			<p>Apellido: <input type="text" name="apellido" id="apellido" /></br>
			<p>Codigo Postal: <input type="text" name="cp" id="cp" /></br>
			<p>Direccion: <input type="text" name="direccion" id="direccion" /></br>
			<p>Ciudad: <input type="text" name="ciudad" id="ciudad" /></br>
			</br>
				<input type="submit" value="Alta" name="alta" />
			</form>
			<a href="comlogincli.php">Inicio de Sesion</a>
			
		</body>
		</html>
<?php
		/*
		<h3>Inicio de sesion de usuario de la base de datos</h3>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " >
		<p>Usuario: <input type="text" name="username" id="username" /></br>
		<p>Contraseña: <input type="password" name="password" id="password" /></br>
		</br>
			<input type="submit" value="Iniciar sesion" name="Iniciar sesion" />
		</form>
		*/
		
?>