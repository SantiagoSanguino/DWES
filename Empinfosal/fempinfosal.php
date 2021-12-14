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
	/*Muestra los dni de los empleados en una select con option */
	function sacarOpcionesEmpDniPdo($connect) {
		try {
			$sql=$connect->prepare("select dni from empleado");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay empleado </br>";
		}
		return $sql;
	}
	
	function empinfosal($connect,$dni) {
		$sql=$connect->prepare("select sum(salario) as salario,empleado.nombre from empleado where empleado.dni=$dni group by empleado.salario");
		$sql->execute();
		$mensaje="";
		foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
			$mensaje=$valor["nombre"]." ".$valor["salario"]."€<br />";
		}
		return $mensaje;
	}
?>