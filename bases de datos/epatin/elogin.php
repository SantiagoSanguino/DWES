<html>
   <?php 
	/* Agrego el fichero con funciones */
	include "efunciones.php";
	/* Inicio las sesiones */
	$conn=conexionOpenPdo();
	
	if(!empty($_POST["email"])&&!empty($_POST["password"])) {
		$email=$_POST["email"];
		$dni=$_POST["password"];
		
		if(checkpass($conn,$email,$dni)) {
			setcookie("dni",$dni,time()+24*60*60,"/");
			header("location: einicio.php");
			
		}else {
			echo "Contraseña o usuario no valido<br/>";
		}
	}else {
		if(isset($_COOKIE)){
			setcookie("dni","",time()-24*60*60,"/");
			setcookie("cesta","",time()-24*60*60,"/");
		}
	}
	conexionClosePdo($conn);
   ?>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page - EPATIN</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
      
<body>
    <h1>ALQUILER PATINETES ELÉCTRICOS</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Login Usuario</div>
		<div class="card-body">
		
		<form id="login" name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="card-body">
		
		<div class="form-group">
			Email <input type="text" name="email" placeholder="email" class="form-control">
        </div>
		<div class="form-group">
			Clave <input type="password" name="password" placeholder="password" class="form-control">
        </div>				
        
		<input type="submit" name="submit" value="Login" class="btn btn-warning disabled">
        </form>
		
	    </div>
    </div>
    </div>
    </div>

</body>
</html>