<?php

	function conexionOpenPdo($user,$pass,$base) { // Abrir conexion mysql PDO
		$servername="localhost";
		$connect=new PDO("mysql:host=$servername;dbname=$base",$user,$pass);
		$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $connect;
	}
	function conexionClosePdo($connect) {  // Cerrar conexion mysql PDO
		$connect=null;
	}
	function sacarOpcionesDeprtPdo($connect) {
		try {
			$sql=$connect->prepare("select nombre_dpto from departamento");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay departamento </br>";
		}
		return $sql;
	}
	function empinfosal($connect,$departamento) {
		try {
			$sql=$connect->prepare("select sum(salario) as salario,departamento.nombre_dpto as nombre_dpto from empleado,departamento,emple_depart where departamento.cod_dpto=emple_depart.cod_dpto and empleado.dni=emple_depart.dni group by departamento.nombre_dpto");
			$sql->execute();
			$mensaje="";
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
				$mensaje=$mensaje.$valor["nombre_dpto"]." ".$valor["salario"]."€<br />";
			}
		}catch(PDOException $e) {
			return "No hay departamento </br>";
		}
		return $mensaje;
		
	}
?>