<html lang="es">
	<head>
		<title>Cambio Base</title>
		<meta charset="utf-8 " />
		<meta name="author" content="Santiago Sanguino" />
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
		<div>
			<h2>Cambio Base</h2>
			<?php
				require 'fconverdeciAbase.php';
				$mensaje="";
				if(!empty($_POST["decimal"])){
					$num=$_POST["decimal"];
					$cambio=$_POST["cambioDeci"];
					$resultBin=calcularDeciABase($num,2);
					$resultOct=calcularDeciABase($num,8);
					$resultHex=calcularDeciABase($num,16);
					if($cambio=="binario"){
						$mensaje="<table><tr><td>Binario</td><td>".$resultBin."</td></tr></table>";
					}else if($cambio=="octal"){
						$mensaje="<table><tr><td>Octal</td><td>".$resultOct."</td></tr></table>";
					}else if($cambio=="hexadecimal"){
						$mensaje="<table><tr><td>Hexadecimal</td><td>".$resultHex."</td></tr></table>";
					}else if($cambio=="todos"){
					$mensaje= "<table>
								<tr><td>Binario</td><td>".$resultBin."</td></tr>
								<tr><td>Octal</td><td>".$resultOct."</td></tr>
								<tr><td>Hexadecimal</td><td>".$resultHex."</td></tr>
							</table>";
					}
				}
			?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label for="decimal">Numero decimal</label></br>
				<input type="text" name="decimal"></br>
				</br>
				<div>
					<fieldset>
						<legend>Selecciona el formato a convertir: </legend>
						<input type="radio" value="binario" name="cambioDeci" /> Binario </br>
						<input type="radio" value="octal" name="cambioDeci" /> Octal </br>
						<input type="radio" value="hexadecimal" name="cambioDeci" /> Hexadecimal </br>
						<input type="radio" value="todos" name="cambioDeci" /> Todos sistemas </br>
					</fieldset>
				</div>
				</br>
				<input type="submit" name="enviar" value="Enviar">
				<input type="reset" name="borrar" value="Borrar"></br>
			</form>
			<?php
				if(!empty($_POST["decimal"])){
					echo "<label for=\"decimal\">Numero decimal</label></br>
						<input type=\"text\" readonly value=\"".$_POST["decimal"]."\" ></br>
						</br>";
				}
				echo $mensaje;
			?>
		</div>
	</body>
</html> 
