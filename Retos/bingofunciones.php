<?php
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
?>