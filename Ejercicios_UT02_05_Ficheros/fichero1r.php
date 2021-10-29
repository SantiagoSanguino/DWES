<?php
	$carpeta="../../files/";
	$fichero="alumnos1.txt";
	
	$file=fopen($carpeta.$fichero,"r");
	$i=0;
	/* El numero de la linea final */
	$numline=161;
	while($i<=2){
		$nombre=fgets($file,40);
		$ape1=fgets($file,41);
		$ape2=fgets($file,42);
		$date=fgets($file,10);
		$localidad=fgets($file,26);
		//fgets($file);
		fseek($file,($numline*($i+1)));
		echo $nombre." ".$ape1." ".$ape2." ".$date." ".$localidad."<br/>";
		$i++;
	}
	fclose($file);
?>