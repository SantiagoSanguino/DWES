<?php
	$carpeta="../../files/";
	$fichero="alumnos2.txt";
	
	$file=fopen($carpeta.$fichero,"r");
	/* El numero de la linea final */
	$contFilas=0;
	//$numline=161;
	/* feof es para comprobar si esta al final del fichero el puntero */
	while(!feof($file)) {
		$nombre=trim(fgets($file,41),"#");
		$ape1=trim(fgets($file,42),"#");
		$ape2=trim(fgets($file,43),"#");
		$date=trim(fgets($file,11),"#");
		$localidad=trim(fgets($file,27),"#");
		fgets($file);
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