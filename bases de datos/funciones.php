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
	function sacarOpcionesEmpDni($user,$pass,$base) {
		
		$table="empleado";
		$connect=conexionOpenProce($user,$pass,$base);
		$sql="select dni from $table";
		$result= mysqli_query($connect,$sql);
		if(mysqli_num_rows($result)>0) {
			echo "<select name=\"".$table."\" id=\"".$table."\">";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<option value=\"".$row["dni"]."\">".$row["dni"]."</option>";
			}
			echo "</select>";
		}else {
			echo "No hay $table </br>";
		}
		conexionCloseProce($connect);/**/
	}
	
	function sacarOpcionesDeprtPdo($user,$pass,$base) {
		$table="departamento";
		$nombre="nombre_d";
		$connect=conexionOpenPdo($user,$pass,$base);
		try {
			$sql=$connect->prepare("select $nombre from $table");
			$sql->execute();
			echo "<select name=\"".$table."\" id=\"".$table."\">";
			
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
				echo "<option value=\"".$valor["$nombre"]."\">".$valor["$nombre"]."</option>";
			} 
			echo "</select>";/**/
		}catch(PDOException $e) {
			echo "No hay $table </br>";
		}
		conexionClosePdo($connect);/**/
	}
	function sacarOpcionesEmpDniPdo($user,$pass,$base) {
		$table="empleado";
		$nombre="dni";
		$connect=conexionOpenPdo($user,$pass,$base);
		try {
			$sql=$connect->prepare("select $nombre from $table");
			$sql->execute();
			echo "<select name=\"".$table."\" id=\"".$table."\">";
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
				echo "<option value=\"".$valor["$nombre"]."\">".$valor["$nombre"]."</option>";
			} 
			echo "</select>";/**/
		}catch(PDOException $e) {
			echo "No hay $table </br>";
		}
		conexionClosePdo($connect);/**/
	}
	
?>
