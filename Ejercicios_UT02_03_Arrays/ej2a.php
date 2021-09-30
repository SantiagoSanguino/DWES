<html>
<head> <title> EJs - Arrays </title> </head>

<BODY>
<h2> Ejercicio 1 Arrays Unidimensionales </h2>
<?php
	$numImpares=array(null);$numPares=array(null);
	$contImp=0;$contPar=0;$i=1;$sumaImp=0;$sumaPar=0;
	
	while($contImp<20){
		if($i%2!=0){
			$numImpares[$contImp]=$i;
			$contImp++;
		}
		$i++;
	}
	$i=1;
	while($contPar<20){
		if($i%2==0){
			$numPares[$contPar]=$i;
			$contPar++;
		}
		$i++;
	}
	echo "<h3> Indice | Valor | Suma </h3>";
	for($i=0;$i<count($numImpares);$i++) {
		$sumaImp+=$numImpares[$i];
		echo  "<pre>   ".$i."   |   ".$numImpares[$i]."   |   ".$sumaImp."  </pre>";
	}
	echo "<p>La media de las posiciones impares ".($sumaImp/$contImp)." </p>";
	echo "<h3> Indice | Valor | Suma </h3>";
	for($i=0;$i<count($numPares);$i++) {
		$sumaPar+=$numPares[$i];
		echo  "<pre>   ".$i."   |   ".$numPares[$i]."   |   ".$sumaPar."  </pre>";
	}
	echo "<p>La media de las posiciones pares ".($sumaPar/$contPar)." </p>";
?>
</BODY>
</html>