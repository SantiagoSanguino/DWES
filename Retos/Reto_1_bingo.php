<?php
echo "
<html>
<head> 
	<title> Reto 1 Bingo</title> 
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</head>
<BODY>
<h2> Reto 1 Bingo </h2>";
	$cartones=3;
	$arrayJugador1=array();
	$arrayJugador2=array();
	$arrayJugador3=array();
	$arrayJugador4=array();
	$jugadores=array($arrayJugador1,$arrayJugador2,$arrayJugador3,$arrayJugador4);/**/
	$maxCarton=15;
	//$arrayCarton=array();
	//Para la opcion seria con este array y siendo por decenas
	//$arrayCarton2=array(3)(7);
	//$huecos=2;
	// Esta variable sera solo para la segunda opcion
	
	echo "<h4>Generando cartones</h4>";
		$complet=false;
		$i=0;
		$j=0;
		while(!$complet){
			$k=0;
			$arrayCarton=array();
			while(count($arrayCarton)<$maxCarton){
				$numero=rand(1,60);
				$numValido=true;
				if($k<count($arrayCarton)){
					while($k<count($arrayCarton)&&$numValido){
						if($arrayCarton[$k]==$numero){
							$numValido=false;
						}
						$k++;
					}
				}
				if($numValido){
					$arrayCarton[$k]=$numero;
					$k++;
				}
			}
			$jugadores[$i][$j]=$arrayCarton;
			
			$j++;
			
			if($j==$cartones){
				$i++;
				$j=0;
			}
			
			if($i==count($jugadores)){
				$complet=true;
			}
		}
		for($i=0;$i<count($jugadores);$i++){
			echo "El jugador ".($i+1)." tiene los siguientes cartones<br/>";
			for($j=0;$j<count($jugadores[$i]);$j++){
				for($k=0;$k<count($jugadores[$i][$j]);$k++){
					echo $jugadores[$i][$j][$k]." | ";
				}
				echo "<br/>";
			}
		}
	echo "<h4>Sacar bolas del bombo</h4>";
	$esbingo=false;
	$cont=60;
	$bombo=((bool)array());
	for($i=1;$i<($cont+1);$i++){
		$bombo[$i]=false;
	}
	$bombo[0]=true;
	$ganador="";
	while($cont>0&&!$esbingo){
		$numero=rand(1,60);
		if(!$bombo[$numero]){
			$bombo[$numero]=true;
			echo "<img src=\"./DWES_Reto1_Bingo_ImagesBolas/".$numero.".PNG\"/><br/>";
			echo "<br/>";
			for($i=0;$i<count($jugadores);$i++) {
				for($j=0;$j<count($jugadores[$i]);$j++) {
					$k=0;
					$esencontrado=false;
					while($k<(count($jugadores[$i][$j])-1)&&!$esencontrado) {
						if($jugadores[$i][$j][$k]==$numero) {
							//echo "El jugador ".($i+1)." tiene el numero ".$numero." y lleva ".$jugadores[$i][$j][$maxCarton]." numeros<br/>";
							$esencontrado=true;
							$jugadores[$i][$j][$maxCarton]++;
							if($jugadores[$i][$j][$maxCarton]==15){
								$esbingo=true;
								$ganador="El jugador ".($i+1)." ha ganado con el carton ".($j+1).".";
							}
						}
						$k++;
					}
				}
			}
			$cont--;
		}
	}
	
	echo "<br/>";
	echo $ganador;
	echo "<br/>";
echo "
</BODY>
</html>";
?>
