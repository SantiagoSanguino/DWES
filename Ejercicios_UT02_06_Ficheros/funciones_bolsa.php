<?php
	
	function mostrarBolsa($fichero) {
		echo "<style type=\"text/css\">
				table,td,tr {
					border: 1px gray solid;
					text-align: center;
				}
				table {
					border-collapse: collapse;
				}
			</style>";
		$mostrar="<table>";
		$file=fopen($fichero,"r");
		/*Estos son los puntos donde estan los espacios sin la hora */
		$espacios=[9,8,9,12,10,10,14,13];
		while(!feof($file)){
			$valor=fgets($file,24);
			if($valor!=""){
				$mostrar=$mostrar."<tr>";
				$mostrar=$mostrar."<td>".$valor."</td>";
				foreach($espacios as $espacio){
					$mostrar=$mostrar."<td>".fgets($file,$espacio)."</td>";
				}
				/*
				$mostrar=$mostrar."<td>".fgets($file,23)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,9)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,8)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,9)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,12)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,10)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,10)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,14)."</td>";
				$mostrar=$mostrar."<td>".fgets($file,13)."</td>";
				/* Para mostrar la fecha seria con esta linea */
				//$mostrar=$mostrar."<td>".fgets($file,8)."</td>";
				/* En el caso de que este la fecha esta linea podra omitirse*/
				fgets($file);
				$mostrar=$mostrar."</tr>";
			}
		}
		fclose($file);
		$mostrar=$mostrar."</table>";
		echo $mostrar;
	}
	
	function valorBursatil($fichero,$buscar) {
		echo "<style type=\"text/css\">
				table,td,tr {
					border: 1px gray solid;
					text-align: center;
				}
				table {
					border-collapse: collapse;
				}
			</style>
			<table>";
		$file=file($fichero);
		$buscar=strtoupper($buscar);
		/*Estos son los puntos donde estan los espacios */
		$espacios=[23,8,8,8,11,10,10,12,10,8];
		//echo $buscar."<br/>";
		$dato="";
		foreach($file as $valor => $resto) {
			if(strcasecmp($buscar,strstr($resto," ",true))==0){
				$dato=$dato.$valor;
			}else if(strcasecmp(strstr($buscar," ",true),strstr($resto," ",true))==0){
				$dato=$dato.$valor;
			}
		}
		echo $dato."</br>";
		$i=0;
		$suma=0;
		$cont=count($espacios);
		$mostrar="<table><tr>";
		while($i<$cont) {
			$mostrar=$mostrar."<td>".substr($file[0],$suma,$espacios[$i])."</td>";
			$suma=$suma+$espacios[$i];
			$i++;
		}
		$i=0;
		$suma=0;
		$mostrar=$mostrar."</tr><br/><tr>";
		while($i<$cont) {
			$mostrar=$mostrar."<td>".substr($file[$dato],$suma,$espacios[$i])."</td>";
			$suma+=$espacios[$i];
			$i++;
		}
		$mostrar=$mostrar."</tr></table>";
		echo $mostrar;
	}
?>