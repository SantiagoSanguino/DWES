<html lang="es">
	<head>
		<title>Binario</title>
		<meta charset="utf-8 " />
		<meta name="author" content="Santiago Sanguino" />
	</head>
	<body>
		<div>
			<h2>Binario</h2>
			<?php 
				$mensaje="";
				if(!empty($_POST["decimal"])){
					$decimal=$_POST["decimal"];
					$numAux=$decimal;
					$bin=" ";
					while($numAux>0) {
						if($numAux%2==0){
							$numAux/=2;
							$bin="0".$bin;
						}else {
							$numAux/=2;
							$numAux-=0.5;
							$bin="1".$bin;
						}
					}
					 $mensaje="</br>
					 <label for=\"binario\">Numero binario</label></br>
					 <input type=\"text\" readonly value=\"".$bin."\" ></br>
					</br>";
				}
			?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label for="decimal">Numero decimal</label></br>
				<input type="text" name="decimal"></br>
				</br>
				<input type="submit" name="enviar" value="Enviar">
				<input type="reset" name="borrar" value="Borrar"></br>
			</form>
			<?php
			if(!empty($_POST["decimal"])){
				echo "<input type=\"text\" readonly value=\"".$_POST["decimal"]."\"></br>";
			}
			echo $mensaje;
			?>
		</div>
	</body>
</html> 
