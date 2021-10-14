<?php
echo "
<html>
<head> 
	<title> EJ6 - Arrays modulos y funciones de arrays</title> 
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</head>
<BODY>
<h2> Ejercicio 6 Arrays Unidimensionales </h2>";
	
	$arrayProg=array("Bases Datos","Entornos Desarrollo","Programación");
	$arrayOrie=array("Sistemas Informáticos","FOL","Mecanizado");
	$arrayTecn=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces","Inglés");
	
	$arrayAsignaturas1=array($arrayProg,$arrayOrie,$arrayTecn);
	$arrayAsignaturas2=array_merge($arrayProg,$arrayOrie,$arrayTecn);
	
	$asignaturaBorrar="Mecanizado";
	
	echo "<h4>Array de arrays</h4>";
	//Quito la asignatura no valida
	for($i=(count($arrayAsignaturas1)-1);$i>=0;$i--){
		for($j=(count($arrayAsignaturas1[$i])-1);$j>=0;$j--){
			if($arrayAsignaturas1[$i][$j]==$asignaturaBorrar){
				unset($arrayAsignaturas1[$i][$j]);
			}
		}
	}
	//Muestra el array invertido
	for($i=(count($arrayAsignaturas1)-1);$i>=0;$i--){
		for($j=(count($arrayAsignaturas1[$i])-1);$j>=0;$j--){
			echo $arrayAsignaturas1[$i][$j]." | ";
		}
	}
	echo "<h4>Array merge</h4>";
	//Quito la asignatura no valida
	for($i=(count($arrayAsignaturas2)-1);$i>=0;$i--){
		if($arrayAsignaturas2[$i]==$asignaturaBorrar){
			unset($arrayAsignaturas2[$i]);
		}
	}
	//Muestra el array invertido
	for($i=count($arrayAsignaturas2);$i>=0;$i--){
		if($arrayAsignaturas2[$i]!=null)
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
	//Quito la asignatura no valida
	for($i=(count($arrayAsignaturas3)-1);$i>=0;$i--){
		if($arrayAsignaturas3[$i]==$asignaturaBorrar){
			unset($arrayAsignaturas3[$i]);
		}
	}
	//Muestra el array invertido
	for($i=count($arrayAsignaturas3);$i>=0;$i--){
		if($arrayAsignaturas3[$i]!=null){
			echo $arrayAsignaturas3[$i]." | ";
		}
	}
	
echo "
</BODY>
</html>";
?>