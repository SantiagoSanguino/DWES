<html>
   <?php
	/* Agrego el fichero con funciones */
	include "efunciones.php";
	/* Inicio las sesiones */
	$conn=conexionOpenPdo();
	
	if(!isset($_COOKIE["dni"])) {
		header("location: elogin.php");
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
	<?php ?>
    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">


		<B>Bienvenido/a:</B><?php 
			mostrarUsuario($conn,$_COOKIE["dni"]);
		?><BR><BR>
		<B>Saldo Cuenta:</B><?php
			echo saldoCuenta($conn,$_COOKIE["dni"]);
		?><BR><BR>
	  
		<!--Formulario con enlaces -->
		<ul>
			<li><a href="ealquilar.php">Alquilar Patin</a></li>
			<li><a href="econsultar.php">Consultar Alquileres</a></li>
			<li><a href="eaparcar.php">Aparcar Patin</a></li>  		 
		</ul>
		  <BR><a href="elogin.php">Cerrar Sesión</a>
	</div>  
	  
   </body>
   <?php
	conexionClosePdo($conn);
   ?>
</html>


