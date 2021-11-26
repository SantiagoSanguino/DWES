<?php
	function altaDeprt($user,$pass,$base,$tabla,$dato) {
		$connect=conexionOpenProce($user,$pass,$base);
		
		$sql="INSERT INTO $tabla (nombre_d) VALUES ('$dato')";
		if(mysqli_query($connect,$sql)) {
			echo "Creado el nuevo en la base de datos ".$base." y la tabla ".$tabla.", el dato: ".$dato;
		}else {
			echo "Error al crear ".$base.": ".$sql."</br>".mysqli_error($connect);
		}
		conexionCloseProce($connect);
	}
	function altaEmple($user,$pass,$base,$tabla,$datos) {
		$connect=conexionOpenProce($user,$pass,$base);
		
		$mensaje="";
		//var_dump($datos);
		$datosize=count($datos);
		for($i=0;$i<$datosize;$i++) {
			if($i==0) {
				$mensaje=$mensaje."'".$datos[$i]."'";
			}else {
				$mensaje=$mensaje.",'".$datos[$i]."'";
			}
		}
		//echo $mensaje;
		$sql="INSERT INTO $tabla (dni,nombre_e,fecha_nac,nombre_d) VALUES ($mensaje)";
		if(mysqli_query($connect,$sql)) {
			echo "Creado el nuevo en la base de datos ".$base." y la tabla ".$tabla.", el dato: ".$mensaje;
		}else {
			echo "Error al crear ".$base.": ".$sql."</br>".mysqli_error($connect);
		}
		conexionCloseProce($connect);/**/
	}
	function sacarOpcionesDeprt($user,$pass,$base) {
		$table="departamento";
		$connect=conexionOpenProce($user,$pass,$base);
		$sql="select nombre_d from departamento";
		$result= mysqli_query($connect,$sql);
		if(mysqli_num_rows($result)>0) {
			echo "<select name=\"".$table."\" id=\"".$table."\">";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<option value=\"".$row["nombre_d"]."\">".$row["nombre_d"]."</option>";
			}
			echo "</select>";
		}else {
			echo "No hay departamentos </br>";
		}
		conexionCloseProce($connect);/**/
	}
	function sacarOpcionesDeprtPdo($user,$pass,$base) {
		class claseExtendida extends RecursiveIteratorIterator {}
		$table="departamento";
		try {
			$connect=conexionOpenPdo($user,$pass,$base);
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql=$connect->prepare("select nombre_d from departamento");
			$sql->execute();
			$result= $sql->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name=\"".$table."\" id=\"".$table."\">";
			foreach(new claseExtendida(new RecursiveArrayIterator($sql->fetchAll())) as $k=>$valor) {
				echo "<option value=\"".$valor."\">".$valor."</option>";
			} 
			echo "</select>";
		}catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo "No hay departamentos </br>";
		}
		conexionClosePdo($connect);/**/
	}
?>