<html lang="es">
	<head>
		<title>Cambio de Base</title>
		<meta charset="utf-8 " />
		<meta name="author" content="Santiago Sanguino" />
		<style type="text/css">
		
		</style>
	</head>
	<body>
		<div>
			<h2>Cambio de Base</h2>
			<?php
				require 'fconverdeciAbase.php';
				include 'fbasen.php';
				$mensaje="";
				if(!empty($_POST["num"])&&!empty($_POST["newbase"])){
					$num=$_POST["num"];
					$newbase=$_POST["newbase"];
					$numval=strchr($num,"/");
					if($numval!=null&&$newbase>0){
						$base=base($num);
						$num=numAct($num);
						if($base>0&&$base!=null){
							$mensaje="El numero ".$num." en base ".$base;
							$num=base_convert($num,$base,10);
							// Una vez esta en decimal el valor $num se calcula
							$result=calcularDeciABase($num,$newbase);
							$mensaje=$mensaje." = ".$result." en base ".$newbase;
						}else{
							$mensaje="Sin base";
						}
					}else {
						$mensaje="No es valido";
					}
				}
			?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label for="num">Numero</label></br>
				<input type="text" name="num"></br>
				</br>
				<label for="newbase">Nueva base</label></br>
				<input type="text" name="newbase"></br>
				</br>
				</br>
				<input type="submit" name="cambioBase" value="Cambio Base">
				<input type="reset" name="borrar" value="Borrar"></br>
			</form>
			<?php
				echo $mensaje;
			?>
		</div>
	</body>
</html> 
