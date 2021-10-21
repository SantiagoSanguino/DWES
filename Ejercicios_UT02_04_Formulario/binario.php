<html lang="es">
	<head>
		<title>Binario</title>
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
		 echo "</br>
		 <label for=\"binario\">Numero binario</label></br>
		 <input type=\"text\" readonly value=\"".$bin."\" ></br>
		</br>";
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
