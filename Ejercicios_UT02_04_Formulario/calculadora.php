<?php 
	$mensaje="";
	if(!empty($_POST["calc"])&&!empty($_POST["num1"])&&!empty($_POST["num2"])){
		$num1=$_POST["num1"];
		$num2=$_POST["num2"];
		$operador=$_POST["calc"];
		if($operador=="suma"){
			$result=$num1+$num2;
			echo "Resultado operacion ".$num1." + ".$num2." = ".$result;
		}else if($operador=="resta"){
			$result=$num1-$num2;
			echo "Resultado operacion ".$num1." - ".$num2." = ".$result;
		}else if($operador=="multi"){
			$result=$num1*$num2;
			echo "Resultado operacion ".$num1." * ".$num2." = ".$result;
		}else if($operador=="div"){
			$result=$num1/$num2;
			echo "Resultado operacion ".$num1." / ".$num2." = ".$result;
		}else {
			// No haria falta ya que esta el empty al principio
			echo "Operador no valido";
		}
	}else {
		echo "Faltan valores para calcular el resultado";
	}
?>
