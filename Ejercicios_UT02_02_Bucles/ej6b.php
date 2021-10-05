<?php

echo "	
<HTML> 
<HEAD>
	<TITLE> EJ6B – Factorial</TITLE>
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</HEAD>
<BODY>";

	$num="9";
	$i=$num;
	$resultado=1;
	echo $num."!=";
	while($i>1){
		echo $i."x";
		$resultado*=$i;
		$i--;
	}
	echo $i."=".$resultado;
echo "
</BODY>
</HTML>";
?>
