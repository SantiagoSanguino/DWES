<?php
	//$numline=161;
	$carpeta="../../files/";
	$fichero="alumnos1.txt";
	
	$file=fopen($carpeta.$fichero,"r");
	
	$contFilas=0;
	
	/* feof es para comprobar si esta al final del fichero el puntero */
	while(!feof($file)) {
		$nombre=fgets($file,41);
		$ape1=fgets($file,42);
		$ape2=fgets($file,43);
		$date=fgets($file,11);
		$localidad=fgets($file,28);
		//En el caso de que la linea no termine en la linea exacta o superior se debera usar la funcion de debajo
		//fgets($file);
		//fseek($file,($numline*($contFilas+1)));
		//Hago la comprobacion de que este vacio porque al usar \n se genera un espacio en blanco en la siguiente linea
		if(!empty($nombre)) {
			echo $nombre." ".$ape1." ".$ape2." ".$date." ".$localidad."<br/>";
			$contFilas++;
		}
	}
	echo "Se han leido ".$contFilas." filas";
	fclose($file);
?>
