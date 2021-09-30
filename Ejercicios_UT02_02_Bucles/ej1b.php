<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php

	$num=168;
	$numAux=$num;
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
	echo $bin;

?>
</BODY>
</HTML>
