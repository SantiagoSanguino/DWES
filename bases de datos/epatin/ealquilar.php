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
		}else if(isset($_POST["agregar"])) {
			$matricula=$_POST["patinetes"];
			$cesta=array();
			if(isset($_COOKIE['cesta'])){
				$cesta=unserialize($_COOKIE['cesta']);
				//$cesta=array_push($cesta,$matricula);
			}
			$cont=count($cesta);
			if(!in_array($matricula,$cesta)){
				$cesta[$cont+1]=$matricula;
				setcookie("cesta",serialize($cesta),time()+24*60*60,"/");
				header("refresh:0");
			}
		}else if(isset($_POST["alquilar"])) {
			if(isset($_COOKIE["cesta"])) {
				$cesta=unserialize($_COOKIE["cesta"]);
				alquilarPatin($conn,$_COOKIE["dni"],$cesta);
				setcookie("cesta","",time()-24*60*60,"/");
				//header("refresh:0");
			}
		}else if(isset($_POST["vaciar"])) {
			setcookie("cesta","",time()-24*60*60,"/");
			header("refresh:0");
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
		<div class="card-header">Menú Usuario - ALQUILAR PATINETES</div>
		<div class="card-body">
	  	  

	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
	
		<B>Bienvenido/a:</B><?php 
			mostrarUsuario($conn,$_COOKIE["dni"]);
		?><BR><BR>
		<B>Saldo Cuenta:</B><?php
			echo saldoCuenta($conn,$_COOKIE["dni"]);
		?><BR><BR>
		
		<B>PATINETES disponibles</B><?php echo fecha(); ?><BR>
		
			<select name="patinetes" class="form-control">
				<?php
					mostrarPatines($conn);
				?>
			</select>
			<BR>
			<div>
				<p>CESTA</p>
				<table>
				<?php
					if(isset($_COOKIE["cesta"])) {
						$cesta=unserialize($_COOKIE["cesta"]);
						foreach($cesta as $patines){
							echo "<tr><td>".$patines."</td></tr>";
						}
					}
				?>
				</table>
			</div>
		 <BR><BR><BR><BR><BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
			<br/><br/>
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>		
		<BR><a href="elogin.php">Cerrar Sesión</a>
	</form>
	<!-- FIN DEL FORMULARIO -->
  </body>
   <?php
	conexionClosePdo($conn);
   ?>
</html>

