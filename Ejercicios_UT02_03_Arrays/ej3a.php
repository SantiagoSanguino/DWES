<?php
echo "
<html>
<head> 
	<title> EJ3 - Arrays binario y octal</title> 
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</head>
<BODY>
<h2> Ejercicio 3 Arrays Unidimensionales </h2>";

	$arrayBin=array(null);
	$arrayOct=array(null);
	$i=0;
	$base=2;
	while($i<20){
		$numAux=$i;
		$result=" ";
		if($numAux==0)
			$result=0;
		while($numAux>=1) {
			if($numAux%$base==0){
				$result=$numAux%$base.$result;
				$numAux/=$base;
			}else {
				$result=$numAux%$base.$result;
				$numAux/=$base;
			}
		}
		$arrayBin[$i]=$result;
		$i++;
	}
	$i=0;
	$base=8;
	while($i<20){
		$numAux=$i;
		$result=" ";
		if($numAux==0)
			$result=0;
		while($numAux>=1) {
			if($numAux%$base==0){
				$result=$numAux%$base.$result;
				$numAux/=$base;
			}else {
				$result=$numAux%$base.$result;
				$numAux/=$base;
			}
		}
		$arrayOct[$i]=$result;
		$i++;
	}
	
	echo "
	<table style=\"text-align:center\">
		<tr>
			<td> Indice</td><td>Binario</td><td>Octal</td>
		</tr>";
			for($i=0;$i<20;$i++) {
				echo  	"<tr>
							<td>".$i."</td>
							<td>".$arrayBin[$i]."</td>
							<td>".$arrayOct[$i]."</td>
						</tr>";
			}
	echo "</table>";
echo "
</BODY>
</html>";
?>