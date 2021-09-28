<html>
<head> <title> EJ2-Direccion Red – Broadcast y Rango</title> </head>

<BODY>
<h2> Ejercicio 3 Strings y sus funciones </h2>
<?php
	$ipmasc="192.168.206.214/16";
	$masc=((int)masc($ipmasc));
	$ip=strstr($ipmasc,"/",true);
	$ipAux=$ip;
	$ip1=directionPoints($ipAux);
	$ipAux=directionIp($ipAux);
	$ip2=directionPoints($ipAux);
	$ipAux=directionIp($ipAux);
	$ip3=directionPoints($ipAux);
	$ipAux=directionIp($ipAux);
	$ip4=$ipAux;
	function masc($ipmasc) {
		//La mascara de red la definimos asi para quitar la barra
		$masc=str_replace("/","",strstr($ipmasc,"/"));
		return $masc;
	}
	function directionIp($ip) {
		$ip=strchr($ip,".",false);
		return substr($ip,1);
	}
	function directionPoints($ip) {
		return strchr($ip,".",true);
	}
	
	
	function direccionRed($masc,$ip1,$ip2,$ip3,$ip4){
		$cont;
		$masc0=00000000;
		if($masc%8==0){
			$cont=$masc/8;
		}else if($masc/8>=1){
			$cont=$masc/8;
		}else {
			$cont=0;
		}
		if($cont<=1||$cont>4){
				echo "$ip1.$masc0.$masc0.$masc0";
		} else{
			for($i=1;$i<5;$i++){
				if($cont>=1&&$cont<5){
					if($i==1&&$cont>=1){
						echo "$ip1.";
					}else if($i==2&&$cont>=2){
						echo "$ip2.";
					}else if($i==3&&$cont>=3){
						echo "$ip3.";
					}else if($i==4&&$cont>=4){
						echo "$ip4 <br/>";
					}else if($i==4){
						echo "$masc0 <br/>";
					}else{
						echo "$masc0.";
					}
				}
			}
		}
	}
	function direccionMasc($masc){
		$cont;
		$mascs=array("00000000","10000000","11000000","11100000","11110000","11111000","11111100","11111110","11111111");
		
		for($i=1;$i<5;$i++){
			if($masc>0&&$masc%8==0){
				echo base_convert($mascs[8],2,10).".";
				$masc=$masc-8;
			}else if($masc/8>=1){
				echo base_convert($mascs[8],2,10).".";
				$masc=$masc-8;
			}else{
				echo base_convert($mascs[$masc],2,10).".";
				$masc=0;
			}
		}
		echo "<br/>";
	}
	echo "La Ip ".$ip1.".".$ip2.".".$ip3.".".$ip4."<br/>";
	echo "Direccion de red ";
	echo direccionRed($masc,$ip1,$ip2,$ip3,$ip4)."<br/>";
	echo "Mascara de red ";
	echo direccionMasc($masc)."<br/>";
	echo "La Ip $ip<br/>";
	echo "La mascara es $masc <br/>";
	echo "La direccion de red <br/>";
	echo "La Ip $ip en decimal seria ".base_convert($ip1,10,2).".".base_convert($ip2,10,2).
	".".base_convert($ip3,10,2).".".base_convert($ip4,10,2)."<br/>";
	
	/*
	//$mascaras=array("0","128","192","224","240","248","252","254","255");
	function mascReal($masc,$mascaras){
		$mascReal=" ";
		for($i=4 ; $i > 1 ; $i--){
			if($masc==0){
				echo $mascaras[$masc];
				echo ".";
			}else{
				if($masc>=8){
					echo $mascaras[8];
					echo ".";
					$masc-=8;
				}else{
					echo $mascaras[$masc];
					echo ".";
					$masc-=$masc;
				}
			}
		}
		if($masc==0){
			echo $mascaras[$masc]."<br/>";
		}elseif($masc<=8){
			echo $mascaras[$masc]."<br/>";
		}else{
			echo "<br/>Número de mascara no valido<br/>";
		}
	}*/
	//mascReal($masc,$mascaras);
	//$ipv4+=1000;
?>
</BODY>
</html>
