<?php

echo "	
<HTML> 
<HEAD>
	<TITLE> EJ4B – Tabla Multiplicar</TITLE>
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</HEAD>
<BODY>";

	$num="8";
	for($j=0;$j<=10;$j++){
		echo $num."x".$j."=".($num*$j)."<br/>";
	}

echo "
</BODY>
</HTML>";
?>
