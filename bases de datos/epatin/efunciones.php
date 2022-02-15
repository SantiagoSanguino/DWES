<?php
include "econfig.php";

function conexionOpenPdo() { // Abrir conexion mysql PDO
	//Creo las constantes de la base de datos
	$servername=constant("DB_SERVER");
	$base=constant("DB_DATABASE");
	$user=constant("DB_USERNAME");
	$pass=constant("DB_PASSWORD");
	
	$connect=new PDO("mysql:host=$servername;dbname=$base",$user,$pass);
	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $connect;
}

function conexionClosePdo($connect) {  // Cerrar conexion mysql PDO
	$connect=null;
}

function checkpass($conn,$email,$pass) { //Comprobar si la contrasañe ingresada es correcta
	$esvalida=true;
	try {
		$sql=$conn->prepare("select dni from eclientes where email='$email' and dni='$pass' group by dni");
		$sql->execute();
		$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
		if(empty($resultado)) {
			$esvalida = false;
		}
	}catch(PDOException $e) {
		$esvalida=false;
	}
	return $esvalida;
}

function mostrarUsuario($conn,$dni) { //Muestra el nombre y apellido del usuario
	try {
		$sql=$conn->prepare("select nombre,apellido from eclientes where dni='$dni' group by dni");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		foreach($sql -> fetchAll() as $valor) {
			echo " ".$valor["nombre"]." ".$valor["apellido"];
		}
		//var_dump($sql);
	}catch(PDOException $e) {
		echo "error en conexion: <br/> " . $e->getMessage();
	}
}
function saldoCuenta($conn,$dni) {
	$saldo="";
	try {
		$sql=$conn->prepare("select saldo from eclientes where dni='$dni' group by dni");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		foreach($sql -> fetchAll() as $valor) {
			$saldo=" ".$valor["saldo"];
			
		}
		//var_dump($sql);
	}catch(PDOException $e) {
		$saldo="error en conexion: <br/> " . $e->getMessage();
	}
	return $saldo;
}

function mostrarPatines($conn) {
	try {
		$sql=$conn->prepare("select matricula from epatines where disponible='S' group by matricula");
		$sql -> execute();
		$sql -> setFetchMode(PDO::FETCH_ASSOC);
		foreach($sql -> fetchAll() as $valor) {
			echo "<option value=\"".$valor["matricula"]."\">".$valor["matricula"]."</option>";
		}
	}catch(PDOException $e) {
		echo "No hay patines disponibles</br>";
	}
}
function fecha() {
	return date("d/m/Y h:i");
}
function mostrarPatinesUser($conn,$user) {
	try {
		$sql=$conn->prepare("select matricula from ealquileres where dni='$user' and fecha_devolucion is null group by matricula");
		$sql -> execute();
		$sql -> setFetchMode(PDO::FETCH_ASSOC);
		foreach($sql -> fetchAll() as $valor) {
			echo "<option value=\"".$valor["matricula"]."\">".$valor["matricula"]."</option>";
		}
	}catch(PDOException $e) {
		echo "No hay patines disponibles</br>";
	}
}

function alquilarPatin($conn,$user,$cesta) {
	$cont=count($cesta);
	$saldo=saldoCuenta($conn,$user);
	if($saldo>=0) {
		$fecha=date("Y-m-d h:i:s");
		foreach($cesta as $matricula) {
			try {
				
				$sql = "INSERT INTO ealquileres (dni,matricula,fecha_alquiler,fecha_devolucion,preciototal) VALUES ('$user','$matricula','$fecha',null,null)";
				$conn->exec($sql);
				noDisponible($conn,$matricula);
				echo "Patin alquilado con exito<br>";
			} catch(PDOException $e){
				echo "No se puede alquilar patin<br>";
			}
			
		}
	}else {
		echo "No hay saldo en la cuenta";
	}
}

function noDisponible($conn,$matricula) {
	try {
		$sql =$conn -> prepare( "UPDATE epatines set disponible='N' where matricula='$matricula'");
		$sql->execute();
	} catch(PDOException $e){
		echo "No se puede cambiar la disponibilidad<br>";
	}
}

function devolverPatin($conn,$user,$matricula) {
	
	$date=date("Y-m-d h:i:s");
	try {
		$sql=$conn->prepare("select timestampdiff(minute,'$alquiladoDate','$date') as preciototal,fecha_alquiler,preciobase from ealquileres,epatines where ealquileres.matricula=epatines.matricula and ealquileres.matricula='$matricula' and dni='$user' and fecha_devolucion is null");
		$sql -> execute();
		$sql -> setFetchMode(PDO::FETCH_ASSOC);
		foreach($sql -> fetchAll() as $valor) {
			$alquiladoDate=$valor["fecha_alquiler"];
			$precioBase=$valor["preciobase"];
			$preciototal=$valor['preciototal']*$precioBase;
		}
	}catch(PDOException $e) {
		echo "No hay patines alquilados</br>";
	}
	
	try {
		
		$sql =$conn -> prepare( "UPDATE ealquileres set fecha_devolucion='$date',preciototal='$preciototal' where matricula='$matricula' and dni='$user' and fecha_devolucion is null ");
		$sql->execute();
		siDisponible($conn,$matricula);
		echo "Patin devuelto con exito<br>";
		
	} catch(PDOException $e){
		echo "No se puede devolver el patin<br>";
	}
	/* */
}

function siDisponible($conn,$matricula) {
	try {
		$sql =$conn -> prepare( "UPDATE epatines set disponible='S' where matricula='$matricula'");
		$sql->execute();
	} catch(PDOException $e){
		echo "No se puede cambiar la disponibilidad<br>";
	}
}

function consultarPatines($conn,$dni,$fechaIni,$fechaFin) {
	try {
		$sql=$conn->prepare("select ealquileres.matricula,bateria,fecha_alquiler,fecha_devolucion,preciototal from epatines,ealquileres where epatines.matricula=ealquileres.matricula and dni='$dni' and fecha_alquiler>='$fechaIni' and fecha_alquiler<=('$fechaFin' + INTERVAL 1 DAY)order by ealquileres.matricula and fecha_alquiler");
		$sql -> execute();
		$sql -> setFetchMode(PDO::FETCH_ASSOC);
		foreach($sql as $datos) {
			echo $datos['matricula']." | ".$datos['bateria']." | ".$datos['fecha_alquiler']." | ".$datos['fecha_devolucion']." | ".$datos['preciototal']."<br/>";
		}
	}catch(PDOException $e) {
		echo "No hay precio para el patin</br>";
	}
}

?>
