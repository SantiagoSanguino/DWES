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
			echo "Volviendo";
		}
		
	}
   ?>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
   
 <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - CONSULTA ALQUILERES </div>
		<div class="card-body">
	  
	  	
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
				
		<B>Bienvenido/a:</B><?php 
			mostrarUsuario($conn,$_COOKIE["dni"]);
		?><BR><BR>
		<B>Saldo Cuenta:</B><?php
			echo saldoCuenta($conn,$_COOKIE["dni"]);
		?><BR><BR>
		     
			 Fecha Desde: <input type='date' name='fechadesde' value='' size=10 placeholder="fechadesde" class="form-control">
			 Fecha Hasta: <input type='date' name='fechahasta' value='' size=10 placeholder="fechahasta" class="form-control"><br><br>
		<?php
		 if($_SERVER["REQUEST_METHOD"]=="POST") {
			if(isset($_POST["consultar"])&&!empty($_POST['fechadesde'])&&!empty($_POST['fechahasta'])) {
				$fechaIni=$_POST['fechadesde'];
				$fechaFin=$_POST['fechahasta'];
				if($fechaIni>$fechaFin){
					$auxFecha=$fechaIni;
					$fechaIni=$fechaFin;
					$fechaFin=$auxFecha;
				}
				$dni=$_COOKIE["dni"];
				consultarPatines($conn,$dni,$fechaIni,$fechaFin);
				
				echo "<br/>";
			}
		}
		?>
		<div>
			<input type="submit" value="Consultar" name="consultar" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
    <BR><a href="elogin.php">Cerrar Sesión</a>

  </body>
   <?php
	conexionClosePdo($conn);
   ?>
</html>
