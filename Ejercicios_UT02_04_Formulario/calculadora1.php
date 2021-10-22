<html lang="es">
	<head>
		<title>Calculadora1</title>
		<meta charset="utf-8 " />
		<meta name="author" content="Santiago Sanguino" />
	</head>
	<body>
		<div>
			<h2>Calculadora1</h2>
			<?php 
				$mensaje="";
				/*Comprobacion de que esten todos los valores*/
				if(!empty($_POST["calc"])&&!empty($_POST["num1"])&&!empty($_POST["num2"])){
					/*Variables*/
					$num1=$_POST["num1"];
					$num2=$_POST["num2"];
					$operador=$_POST["calc"];
					$signo;
					/*Busqueda del valor*/
					if($operador=="suma"){
						$result=$num1+$num2;
						$signo="+";
					}else if($operador=="resta"){
						$result=$num1-$num2;
						$signo="-";
					}else if($operador=="multi"){
						$result=$num1*$num2;
						$signo="*";
					}else if($operador=="div"){
						$result=$num1/$num2;
						$signo="/";
					}
					/*Guardo el mensaje*/
					$mensaje="Resultado operacion ".$num1." ".$signo." ".$num2." = ".$result;
				}
			?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label for="num1">Operador1</label></br>
				<input type="text" name="num1"></br>
				<label for="num2">Operador2</label></br>
				<input type="text" name="num2"></br>
				</br>
				<div>
					<fieldset>
						<legend>Selecciona una operacion aritmeticologica</legend>
						<input type="radio" value="suma" name="calc" /> Suma </br>
						<input type="radio" value="resta" name="calc" /> Resta </br>
						<input type="radio" value="multi" name="calc" /> Multiplicacion </br>
						<input type="radio" value="div" name="calc" /> Division </br>
					</fieldset>
				</div>
				</br>
				<input type="submit" name="enviar" value="Enviar">
				<input type="reset" name="borrar" value="Borrar"></br>
			</form>
			<?php
				/*Solo devuelve los valores si se habian escrito previamente*/
				if(!empty($_POST["num1"])&&!empty($_POST["num2"])){
					echo "<label for=\"num1\">Operador1</label></br>
					<input type=\"text\" name=\"num1\" value=\"".$_POST["num1"]."\" readonly></br>
					<label for=\"num2\">Operador2</label></br>
					<input type=\"text\" name=\"num2\" value=\"".$_POST["num2"]."\" readonly></br>
					</br>";
				}
				echo $mensaje;
			?>
		</div>
	</body>
</html> 
