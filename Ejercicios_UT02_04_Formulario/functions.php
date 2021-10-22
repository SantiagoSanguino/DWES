<?php
	function calcularDeciABase($num,$base){
		$numAux=$num;
		$result=" ";
		while($numAux>=1) {
			if($numAux%$base==0){
				$result=$numAux%$base.$result;
				$numAux/=$base;
			}else {
				if($numAux%$base==10){
					$result="A".$result;
				}else if($numAux%$base==11){
					$result="B".$result;
				}else if($numAux%$base==12){
					$result="C".$result;
				}else if($numAux%$base==13){
					$result="D".$result;
				}else if($numAux%$base==14){
					$result="E".$result;
				}else if($numAux%$base==15){
					$result="F".$result;
				}else {
					$result=$numAux%$base.$result;
				}
				$numAux/=$base;
			}
		}
		return $result;
	}
?>