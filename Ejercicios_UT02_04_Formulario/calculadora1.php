<html lang="es">
	<head>
		<title>Calculadora1 </title>
		<meta charset="utf-8 " />
		<meta name="author" content="Santiago Sanguino" />
		<script  type="text/javascript">
			
		</script>
		<style type="text/css">
		
		</style>
	</head>
	<body>
		<header>
				<h2>Calculadora1</h2>
		</header>
		<nav>

		</nav>
		<main>
			<section>
				<article>
					<div>
						<form>
							<label for="num1">Operador1</label></br>
							<input type="text" name="num1" readonly value=" <?php echo ($_POST["num1"]); ?> "></br>
							<label for="num2">Operador2</label></br>
							<input type="text" name="num2" readonly value=" <?php echo ($_POST["num2"]); ?> " ></br>
							</br>
<?php 
	$mensaje="";
	if(!empty($_POST["calc"])&&!empty($_POST["num1"])&&!empty($_POST["num2"])){
		$num1=$_POST["num1"];
		$num2=$_POST["num2"];
		$operador=$_POST["calc"];
		if($operador=="suma"){
			$result=$num1+$num2;
			echo "Resultado operacion ".$num1." + ".$num2." = ".$result;
		}else if($operador=="resta"){
			$result=$num1-$num2;
			echo "Resultado operacion ".$num1." - ".$num2." = ".$result;
		}else if($operador=="multi"){
			$result=$num1*$num2;
			echo "Resultado operacion ".$num1." * ".$num2." = ".$result;
		}else if($operador=="div"){
			$result=$num1/$num2;
			echo "Resultado operacion ".$num1." / ".$num2." = ".$result;
		}else {
			// No haria falta ya que esta el empty al principio
			echo "Operador no valido";
		}
	}else {
		echo "Faltan valores para calcular el resultado";
	}
?>
						</form>
					</div>
				</article>
			</section>
		</main>
		<footer>

		</footer>
		<aside>
		</aside>
	</body>
</html> 
