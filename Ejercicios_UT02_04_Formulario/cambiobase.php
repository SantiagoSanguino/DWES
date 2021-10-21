<html lang="es">
	<head>
		<title>Binario</title>
		<style type="text/css">
			table,td,tr {
				border: 1px gray solid;
				text-align: center;
			}
			table {
				border-collapse: collapse;
			}
		</style>
	</head>
	<body>
		<header>
				<h2>Binario</h2>
		</header>
		<nav>

		</nav>
		<main>
			<section>
				<article>
					<div>
						<form >
							<label for="decimal">Numero decimal</label></br>
							<input type="text" readonly value=" <?php echo ($_POST["decimal"]); ?> " ></br>
							</br>
<?php 
	$mensaje="";
	function calcularDeciABase($num,$base){
		$numAux=$num;
		$result=" ";
		while($numAux>=1) {
			if($numAux%$base==0){
				$result=$numAux%$base.$result;
				$numAux/=$base;
			}else {
				if($numAux%$base==10){
					$result="A".$result;
				}else if($numAux%$base==11){
					$result="B".$result;
				}else if($numAux%$base==12){
					$result="C".$result;
				}else if($numAux%$base==13){
					$result="D".$result;
				}else if($numAux%$base==14){
					$result="E".$result;
				}else if($numAux%$base==15){
					$result="F".$result;
				}else {
					$result=$numAux%$base.$result;
				}
				$numAux/=$base;
			}
		}
		return $result;
	}
	if(!empty($_POST["decimal"])){
		$num=$_POST["decimal"];
		$cambio=$_POST["cambioDeci"];
		if($cambio=="binario"){
			$result=calcularDeciABase($num,2);
			echo "<table><tr><td>Binario</td><td>".$result."</td></tr></table>";
		}else if($cambio=="octal"){
			$result=calcularDeciABase($num,8);
			echo "<table><tr><td>Octal</td><td>".$result."</td></tr></table>";
		}else if($cambio=="hexadecimal"){
			$result=calcularDeciABase($num,16);
			echo "<table><tr><td>Hexdecimal</td><td>".$result."</td></tr></table>";
		}else if($cambio=="todos"){
			$result=calcularDeciABase($num,2);
			echo "<table>
					<tr><td>Binario</td><td>".$result."</td></tr>";
			$result=calcularDeciABase($num,8);
			echo "	<tr><td>Octal</td><td>".$result."</td></tr>";
			$result=calcularDeciABase($num,16);
			echo "	<tr><td>Hexdecimal</td><td>".$result."</td></tr>
				</table>";
		}else {
			echo "Base no valida";
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
