<HTML>
<HEAD><TITLE> EJ1 – Aplicar conocimientos</TITLE></HEAD>
<BODY>
<?php
	$indice=array("Nombre de empresa","Importe precio","Variacion %","Variacion en dinero del %","Importe del mes","Importe total");
	/*$empres1=array("Inditex",31730,"-0.28%","-0.09€",482599,15253653.75);
	$empres2=array("Repsol",20450,"3.28%","2.59€",20304,4231477.43);
	$empres3=array("Iberdrola",31730,"10.28%","6.09€",482599,15253653.75);*/
	$empresas=array($indice);
	/*
	Nombre 						Inditex
	Importe precio accion 		31730
	Variacion % 				-0.28%
	Variacion en dinero del %	-0.09€
	Importe del mes				482.599
	Importe total				15.253.653,75*/
	/* Primer codigo del programa
	for($i=0;$i<count($indice);$i++){
		echo $indice[$i]." | ";
	}
	echo "<br/>";
	for($i=0;$i<count($empresa1);$i++){
		echo $empresa1[$i]." | ";
	}*/
	$i=0;
	while($i<50){
		$empresAux=array(chr(rand(65,90)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)),rand(2000,40000),rand(-120.00,200.00)."%",rand(-120.00,200.00)."€",rand(540120,2004300),rand(12000000,20000000));
		$empresas[$i+1]=$empresAux;
		$i++;
	}
	$cont=0;
	while($cont<count($empresas)){
		$empresAux=$empresas[$cont];
		$cont++;
		echo "<p>";
		for($i=0;$i<count($empresAux);$i++){
			echo $empresAux[$i]." | ";
		}
		echo "</p>";
	}
	
	
?>
</BODY>
</HTML>
