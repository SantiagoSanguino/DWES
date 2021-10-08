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
			/*
			for($k=0;$k<count($jugadores[$i][$j]);$k++){
				echo $jugadores[$i][$j][$k]." | ";
			}
			echo "<br/>";
			echo $i."_".$j;
			echo "<br/>";/**/
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
	
echo "
</BODY>
</html>";
?>
