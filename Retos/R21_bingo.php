<?php
echo "
<html>
<head> 
	<title> Reto 1 Bingo</title> 
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
	<style type=\"text/css\">
		table,td,tr {
			border: 1px gray solid;
			text-align: center;
		}
		table {
			border-collapse: collapse;
		}
	</style>
</head>
<BODY>
<h2> Reto 1 Bingo </h2>";
	//Actualizo el bingo para contener funciones
	function genNumAle(){
		return rand(1,60);
	}
	function genCarton(&$arrayCarton,&$maxCarton){
		$i=0;
		//Codigo actual sin boolean
		while(count($arrayCarton)<$maxCarton){
			//Se genera el numero de la bola
			$numero=genNumAle();
			//Comprobacion de que no este la bola en el array
			if(!in_array($numero,$arrayCarton)){
				//Despues de comprobar que no esta repetida la bola, se añade al carton
				$arrayCarton[$i]=$numero;
				$i++;
			}
			//Cuando termina de rellenase el array del carton
			//Se le agrega en el ultimo valor un el contador de bolas que han salido que empezara en 0
			//Cambiable a un array boolean
			if(count($arrayCarton)==$maxCarton){
				$arrayCarton[$maxCarton]=0;
			}
			
		}/**/
		
		//Posible codigo con ArrayBoolean
		/*
		//Indica el array numerico del carton
		$num=0;
		//Indica el array boolean del carton
		$boolean=1;
		$arrayCarton[$boolean]=genArrayBoolean($maximo);
		while(count($arrayCarton[$num])<$maximo){
			//Se genera el numero de la bola
			$numero=genNumAle();
			//Comprobacion de que no este la bola en el array
			if(!in_array($numero,$arrayCarton[$num])){
				//Despues de comprobar que no esta repetida la bola, se añade al carton
				$arrayCarton[$num][$i]=$numero;
				$i++;
			}
		}
		/**/
		return $arrayCarton;
	}
	function genArrayBoolean($maxCarton){
		$esarray=array();
		for($i=0;$i<$maxCarton;$i++){
			$esarray[$i]=false;
		}
		return $esarray;
	}
	function mostrarCartones($array,&$maxCarton){
		//Creo una tabla por cada jugador
		echo "<table>";
		foreach($array as $carton){
			mostrarCarton($carton,$maxCarton);
		}
		echo "</table><br/>";
	}
	function mostrarCarton($carton,&$maxCarton){
		echo "<tr>";
		foreach($carton as $valor){
			if($valor!=$carton[$maxCarton])
				echo "<td>".$valor."</td>";
		}
		echo "</tr>";
	}
	//Esta funcion era por si creaba un array boolean
	function contarBoolean($array){
		$cont=0;
		$contArray=count($array);
		for($i=0;$i<$contArray;$i++){
			if($array[$i])
				$cont++;
		}
		return $cont;
	}
	
	//Nombre de la carpeta que tiene las imagenes, por si hiciera falta cambiarla
	$carptImg="./DWES_Reto1_Bingo_ImagesBolas/";
	$formatoImg=".PNG";
	//Se que los usuarios habria una mejor forma de hacerlo mas dinamico
	//Defino las variables y los arrays que se usaran en el juego
	$cartones=3;
	$jugadores=array();/**/
	$maxJuga=4;
	$maxCarton=15;
	
	echo "<h4>Generando cartones</h4>";
	$complet=false;
	$i=0;
	$j=0;
	while(!$complet) {
		$k=0;
		// Se añade el carton al jugador
		$arrayCarton=array();
		$arrayCarton=genCarton($arrayCarton,$maxCarton);
		$jugadores[$i][$j]=$arrayCarton;
		$j++;
		//En el caso de que ya tenga los cartones el jugador, paso al siguiente
		if($j==$cartones){
			$i++;
			$j=0;
		}
		//Una vez que todos los jugadores tengan sus cartones, paro el bucle
		if($i==$maxJuga){
			$complet=true;
		}
	}
	//Muestra los arrays de los jugadores y sus cartones
	for($i=0;$i<count($jugadores);$i++){
		echo "El jugador ".($i+1)." tiene los siguientes cartones<br/>";
		echo mostrarCartones($jugadores[$i],$maxCarton);
	}

	echo "<h4>Sacar bolas del bombo</h4>";
	//Inicializo el control para saber las bolas que han salido 
	$esbingo=false;
	$cont=60;
	$bombo=((bool)array());
	$bombo=genArrayBoolean($cont+1);
	$bombo[0]=true;
	$ganador="";
	//Empieza el bucle para sacar bolas del bombo
	while($cont>0&&!$esbingo){
		//Genero un numero
		$numero=genNumAle();
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
					}/**/
					//Comprobacion para array boolean
					/*
					//Indica el array numerico del carton
					$num=0;
					//Indica el array boolean del carton
					$boolean=1;
					$esencontrado=false;
					while($k<(count($jugadores[$i][$j][$num]))&&!$esencontrado) {
						if($jugadores[$i][$j][$num][$k]==$numero) {
						//echo "El jugador ".($i+1)." tiene el numero ".$numero." y lleva ".contarBoolean($jugadores[$i][$j][$boolean][$k])." numeros<br/>";
							$esencontrado=true;
							$jugadores[$i][$j][$boolean][$k]=true;
							//Compruebo el ultimo valor que tiene el array donde dice 
							// la cantidad de numero que tiene el usuario
							if(contarBoolean($jugadores[$i][$j][$boolean][$k])==$maxCarton){
								$esbingo=true;
								$ganador=$ganador." El jugador ".($i+1)." ha ganado con el carton ".($j+1).".";
							}
						}
						
						$k++;
					}
					/**/
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