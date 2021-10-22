<html lang="es">
	<head>
		<title>Cambio de Base</title>
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
			<h2>Cambio de Base</h2>
			<?php
				require 'fconverdeciAbase.php';
				$mensaje="";
				if(!empty($_POST["num"])&&!empty($_POST["newbase"])){
					$num=$_POST["num"];
					$newbase=$_POST["newbase"];
					if($cambio=="binario"){
						$mensaje="<table><tr><td>Binario</td><td>".$resultBin."</td></tr></table>";
					}else if($cambio=="octal"){
						$mensaje="<table><tr><td>Octal</td><td>".$resultOct."</td></tr></table>";
					}else if($cambio=="hexadecimal"){
						$mensaje="<table><tr><td>Hexdecimal</td><td>".$resultHex."</td></tr></table>";
					}else if($cambio=="todos"){
						$mensaje="<table>
								<tr><td>Binario</td><td>".$resultBin."</td></tr>
								<tr><td>Octal</td><td>".$resultOct."</td></tr>
								<tr><td>Hexdecimal</td><td>".$resultHex."</td></tr>
							</table>";
					}else {
						$mensaje="Base no valida";
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
				<input type="submit" name="enviar" value="Enviar">
				<input type="reset" name="borrar" value="Borrar"></br>
			</form>
			<?php
				echo $mensaje;
			?>
		</div>
	</body>
</html> 
