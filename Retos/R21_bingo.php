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

	//Nombre de la carpeta que tiene las imagenes, por si hiciera falta cambiarla
	$carptImg="./DWES_Reto1_Bingo_ImagesBolas/";
	$formatoImg=".PNG";
	//Se que los usuarios habria una mejor forma de hacerlo mas dinamico
	//Defino las variables y los arrays que se usaran en el juego
	$cartones=3;
	$arrayJugador1=array();
	$arrayJugador2=array();
	$arrayJugador3=array();
	$arrayJugador4=array();
	$jugadores=array($arrayJugador1,$arrayJugador2,$arrayJugador3,$arrayJugador4);/**/
	$maxCarton=15;
	
	echo "<h4>Generando cartones</h4>";
	$complet=false;
	$i=0;
	$j=0;
	while(!$complet){
		$k=0;
		$arrayCarton=array();
		while(count($arrayCarton)<$maxCarton){
			//Se genera el numero de la bola
			$numero=rand(1,60);
			//Comprobacion de que no este la bola en el array
			if(!in_array($numero,$arrayCarton)){
				//Despues de comprobar que no esta repetida la bola, se añade al carton
				$arrayCarton[$k]=$numero;
				$k++;
			}
			//Antiguo codigo, esta mal dado que no hace la comprobacion
			/*if($k<count($arrayCarton)){
				$l=0;
				while($l<count($arrayCarton)&&$numValido){
					if($arrayCarton[$k]==$numero){
						$numValido=false;
					}
					$l++;
				}
			}/**/
			/*if($numValido){
				$arrayCarton[$k]=$numero;
				$k++;
			}/**/
			//Cuando termina de rellenase el array del carton
			//Se le agrega en el ultimo valor un el contador de bolas que han salido que empezara en 0
			if(count($arrayCarton)==$maxCarton){
				$arrayCarton[$maxCarton]=0;
			}/**/
		}
		// Se añade el carton al jugador
		$jugadores[$i][$j]=$arrayCarton;
		$j++;
		//En el caso de que ya tenga los cartones el jugador, paso al siguiente
		if($j==$cartones){
			$i++;
			$j=0;
		}
		//Una vez que todos los jugadores tengan sus cartones, paro el bucle
		if($i==count($jugadores)){
			$complet=true;
		}
	}
	//Muestra los arrays de los jugadores y sus cartones
	for($i=0;$i<count($jugadores);$i++){
		echo "El jugador ".($i+1)." tiene los siguientes cartones<br/>";
		for($j=0;$j<count($jugadores[$i]);$j++){
			for($k=0;$k<count($jugadores[$i][$j]);$k++){
				echo $jugadores[$i][$j][$k]." | ";
			}
			echo "<br/>";
		}
		echo "<br/>";
	}
	
	echo "<h4>Sacar bolas del bombo</h4>";
	//Inicializo el control para saber las bolas que han salido 
	$esbingo=false;
	$cont=60;
	$bombo=((bool)array());
	for($i=1;$i<($cont+1);$i++){
		$bombo[$i]=false;
	}
	$bombo[0]=true;
	$ganador="";
	//Empieza el bucle para sacar bolas del bombo
	while($cont>0&&!$esbingo){
		//Genero un numero
		$numero=rand(1,60);
		//Compruebo que no este repetido el valor en el array $bombo
		if(!$bombo[$numero]){
			//Al no estar repetido, lo defino como que ya ha aparecido
			$bombo[$numero]=true;
			//Añado la imagen de la bola que ha salido y la muestro en pantalla
			echo "<img src=\"".$carptImg.$numero.$formatoImg."\"/><br/>";
			for($i=0;$i<count($jugadores);$i++) {
				for($j=0;$j<count($jugadores[$i]);$j++) {
					$k=0;
					//Variable booleana que define si se encuentra la bola en el carton
					//En el caso de que se encuentre se cambia a true y para el bucle
					$esencontrado=false;
					while($k<(count($jugadores[$i][$j])-1)&&!$esencontrado) {
						if($jugadores[$i][$j][$k]==$numero) {
						//echo "El jugador ".($i+1)." tiene el numero ".$numero." y lleva ".$jugadores[$i][$j][$maxCarton]." numeros<br/>";
							$esencontrado=true;
							$jugadores[$i][$j][$maxCarton]++;
							//Compruebo el ultimo valor que tiene el array donde dice 
							// la cantidad de numero que tiene el usuario
							if($jugadores[$i][$j][$maxCarton]==$maxCarton){
								$esbingo=true;
								$ganador=$ganador." El jugador ".($i+1)." ha ganado con el carton ".($j+1).".";
							}
						}
						$k++;
					}
				}
			}
			$cont--;
		}
	}
	//Muestra al ganador por pantalla
	echo "<br/>";
	echo $ganador;
	echo "<br/>";
	/**/
echo "
</BODY>
</html>";
?>