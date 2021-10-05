<?php

echo "	
<HTML> 
	<HEAD><TITLE> EJ2B – Conversor decimal a cualquier base</TITLE></HEAD>
<BODY>";


	$num=168;
	$numAux=$num;
	$base=8;
	$result=" ";
	while($numAux>=1) {
		if($numAux%$base==0){
			$result=$numAux%$base.$result;
			$numAux/=$base;
			//echo "El ".$result." o el ".$numAux."<br/>";
		}else {
			$result=$numAux%$base.$result;
			$numAux/=$base;
			//echo "El ".$result." o el ".$numAux."<br/>";
		}
	}
	echo "<br/> El resultado es ".$result."<br/>";

echo "
</BODY>
</HTML>";
?>
