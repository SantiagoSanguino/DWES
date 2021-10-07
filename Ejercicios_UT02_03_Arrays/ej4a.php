<?php
echo "
<html>
<head> 
	<title> EJ4 - Arrays binarios</title> 
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</head>
<BODY>
<h2> Ejercicio 4 Arrays binario invertido y octal </h2>";

	$arrayBin=array(null);
	$arrayOct=array(null);
	$i=0;
	$j=19;
	$base=2;
	while($i<20&&$j>=0){
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
		$arrayBin[$j]=$result;
		$j--;
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