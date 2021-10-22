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
	require './functions.php';
	$mensaje="";
	if(!empty($_POST["decimal"])){
		$num=$_POST["decimal"];
		$cambio=$_POST["cambioDeci"];
		$resultBin=calcularDeciABase($num,2);
		$resultOct=calcularDeciABase($num,8);
		$resultHex=calcularDeciABase($num,16);
		if($cambio=="binario"){
			echo "<table><tr><td>Binario</td><td>".$resultBin."</td></tr></table>";
		}else if($cambio=="octal"){
			echo "<table><tr><td>Octal</td><td>".$resultOct."</td></tr></table>";
		}else if($cambio=="hexadecimal"){
			echo "<table><tr><td>Hexdecimal</td><td>".$resultHex."</td></tr></table>";
		}else if($cambio=="todos"){
			echo "<table>
					<tr><td>Binario</td><td>".$resultBin."</td></tr>";
			echo "	<tr><td>Octal</td><td>".$resultOct."</td></tr>";
			echo "	<tr><td>Hexdecimal</td><td>".$resultHex."</td></tr>
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
