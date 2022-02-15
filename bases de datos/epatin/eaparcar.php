<html>
   <?php
	/* Agrego el fichero con funciones */
	include "efunciones.php";
	/* Inicio las sesiones */
	$conn=conexionOpenPdo();
	
	if(!isset($_COOKIE["dni"])) {
		header("location: elogin.php");
	}
	if($_SERVER["REQUEST_METHOD"]=="POST") {
		if(isset($_POST["volver"])) {
			header("location: einicio.php");
		}
		if(isset($_POST["devolver"])&&!empty($_POST["patinetes"])) {
			$matricula=$_POST["patinetes"];
			devolverPatin($conn,$_COOKIE["dni"],$matricula);
		}
	}
   ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a EPATIN</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
   
  <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - APARCAR PATINETE </div>
		<div class="card-body">
	  
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
	
		<B>Bienvenido/a:</B><?php 
			mostrarUsuario($conn,$_COOKIE["dni"]);
		?><BR><BR>
		<B>Saldo Cuenta:</B><?php
			echo saldoCuenta($conn,$_COOKIE["dni"]);
		?><BR><BR>
				
			<B>PATINETES ALQUILADOS: </B><select name="patinetes" class="form-control">
				<?php mostrarPatinesUser($conn,$_COOKIE["dni"]); ?>
			</select>
		<BR><BR>
		<div>
			<input type="submit" value="Aparcar Patinete" name="devolver" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
	<a href = "elogin.php">Cerrar Sesion</a>
	
  </body>
   <?php
	conexionClosePdo($conn);
   ?>
</html>



