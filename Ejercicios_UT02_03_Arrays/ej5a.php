<?php
echo "
<html>
<head> 
	<title> EJ5 - Arrays modulos y funciones de arrays</title> 
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</head>
<BODY>
<h2> Ejercicio 5 Arrays Unidimensionales </h2>";

	$arrayProg=array("Bases Datos","Entornos Desarrollo","Programación");
	$arrayOrie=array("Sistemas Informáticos","FOL","Mecanizado");
	$arrayTecn=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces","Inglés");
	
	$arrayAsignaturas1=array($arrayProg,$arrayOrie,$arrayTecn);
	$arrayAsignaturas2=array_merge($arrayProg,$arrayOrie,$arrayTecn);
	
	echo "<h4>Array de arrays</h4>";
	for($i=0;$i<count($arrayAsignaturas1);$i++){
		for($j=0;$j<count($arrayAsignaturas1[$i]);$j++){
			echo $arrayAsignaturas1[$i][$j]." | ";
		}
	}
	echo "<h4>Array merge</h4>";
	for($i=0;$i<count($arrayAsignaturas2);$i++){
		echo $arrayAsignaturas2[$i]." | ";
	}
	echo "<h4>Array push</h4>";
	$arrayAsignaturas3=array();
	// se han de añadir primero el array al que le quieres meter datos y luego el dato
	for($i=0;$i<count($arrayProg);$i++){
		array_push($arrayAsignaturas3,$arrayProg[$i]);
	}
	for($i=0;$i<count($arrayOrie);$i++){
		array_push($arrayAsignaturas3,$arrayOrie[$i]);
	}
	for($i=0;$i<count($arrayTecn);$i++){
		array_push($arrayAsignaturas3,$arrayTecn[$i]);
	}
	for($i=0;$i<count($arrayAsignaturas3);$i++){
		echo $arrayAsignaturas3[$i]." | ";
	}
	
echo "
</BODY>
</html>";
?>