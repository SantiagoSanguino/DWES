<?php

	function contarColumns($connect) {
		$cont;
			$sql=$connect->prepare("select cod_dpto from departamento");
			$sql->execute();
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor){
				$cont="";
				for($i=1;$i<4;$i++){
					$cont=$cont.$valor["cod_dpto"][$i];
				}
				//echo $cont."<br/>";
			}
		//echo "<br/>".$cont."<br/>";
		return $cont;
	}
	function altaDpto($connect,$datos) {
		$codDepcont=contarColumns($connect);
		if(!empty($codDepcont)||$codDepcont==0){
			$codDepcont++;
			if($codDepcont<10){
				$codDpto="D00".$codDepcont;
			}else if($codDepcont<100){
				$codDpto="D0".$codDepcont;
			}else if($codDepcont>100){
				$codDpto="D".$codDepcont;
			}else {
				$codDpto=$codDepcont;
			}
		}else {
			$codDepcont="001";
			$codDpto="D".$codDepcont;
		}
		try {
			$sql="INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES ('$codDpto','$datos')";
			// use exec() because no results are returned
			$connect->exec($sql);
			echo "Creado el departamento ".$datos." con codigo ".$codDpto;
		} catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	function altaEmple($connect,$datos) {
		$mensaje;
		//var_dump($datos);
		$datosize=count($datos);
		for($i=0;$i<$datosize;$i++) {
			if($i==0) {
				$mensaje="'".$datos[$i]."'";
			}else {
				$mensaje=$mensaje.",'".$datos[$i]."'";
			}
		}
		//echo $mensaje;
		try {
			$sql="INSERT INTO empleado (dni,nombre,apellidos,fecha_nac,salario) VALUES ($mensaje)";
			$connect->exec($sql);
			//echo "Creado el nuevo en la base de datos ".$base." y la tabla ".$tabla.", el dato: ".$mensaje;
		} catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	
	/*Muestra los departamentos en una select con option */
	function sacarOpcionesDeprtPdo($connect) {
		$table="departamento";
		$nombre="cod_dpto";
		try {
			$sql=$connect->prepare("select cod_dpto from departamento");
			$sql->execute();
			$mensaje="";
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
				$mensaje=$mensaje."<option value=\"".$valor["$nombre"]."\">".$valor["$nombre"]."</option>";
			} 
			$mensaje="<select name=\"".$table."\" id=\"".$table."\">".$mensaje."</select>";/**/
		}catch(PDOException $e) {
			$mensaje="No hay departamento </br>";
		}
		echo $mensaje;
	}
	/*Muestra los dni de los empleados en una select con option */
	function sacarOpcionesEmpDniPdo($connect) {
		$table="empleado";
		$nombre="dni";
		try {
			$sql=$connect->prepare("select dni from empleado");
			$sql->execute();
			$mensaje="";
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
				$mensaje=$mensaje."<option value=\"".$valor["$nombre"]."\">".$valor["$nombre"]."</option>";
			} 
			$mensaje="<select name=\"".$table."\" id=\"".$table."\">".$mensaje."</select>";/**/
		}catch(PDOException $e) {
			$mensaje="No hay empleado </br>";
		}
		echo $mensaje;
	}
?>