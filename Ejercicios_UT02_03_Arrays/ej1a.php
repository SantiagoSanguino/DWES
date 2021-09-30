<html>
<head> <title> EJs - Arrays </title> </head>

<BODY>
<h2> Ejercicio 1 Arrays Unidimensionales </h2>
<?php
	$numImpares=array(null);
	$contImp=0;$i=1;$suma=0;
	while($contImp<20){
		if($i%2!=0){
			$numImpares[$contImp]=$i;
			$contImp++;
		}
		$i++;
	}
	/**/
	echo "<h3> Indice | Valor | Suma </h3>";
	for($i=0;$i<count($numImpares);$i++) {
		$suma+=$numImpares[$i];
		echo  "<pre>   ".$i."   |   ".$numImpares[$i]."   |   ".$suma."  </pre>";
	}
?>
</BODY>
</html>