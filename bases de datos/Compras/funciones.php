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
	/* ID de las diferentes tablas*/
	function idCategoria($connect,$nomCategoria) {
		try {
			$sql=$connect->prepare("select id_categoria from categoria where nombre='$nomCategoria' group by id_categoria");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay categoria id</br>";
		}
		return $sql;
	}
	function idProduct($connect,$nomProduct) {
		try {
			$sql=$connect->prepare("select id_producto from producto where nombre='$nomProduct' group by id_producto");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay producto id</br>";
		}
		return $sql;
	}
	function idAlmacen($connect,$localidad) {
		try {
			$sql=$connect->prepare("select num_almacen from almacen where localidad='$localidad' group by num_almacen");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay almacen id</br>";
		}
		return $sql;
	}
	
	/* Sacar opciones de las diferentes tablas*/
	function sacarOpcionesCategPdo($connect) {
		try {
			$sql=$connect->prepare("select nombre from categoria");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay categoria</br>";
		}
		return $sql;
	}
	function sacarOpcionesProdPdo($connect) {
		try {
			$sql=$connect->prepare("select nombre from producto");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay producto</br>";
		}
		return $sql;
	}
	function sacarOpcionesAlmaPdo($connect) {
		try {
			$sql=$connect->prepare("select num_almacen,localidad from almacen");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay almacen</br>";
		}
		return $sql;
	}
	
	
	function maxCategoria($connect) {
		$cont;
			$sql=$connect->prepare("select max(id_categoria) as id_categoria from categoria");
			$sql->execute();
			$cont="";
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
				for($i=2;$i<5;$i++){
					$cont=$cont.$valor["id_categoria"][$i];
				}
			}
		if(empty($cont)){
			$cont=0;
		}
		return $cont;
	}
	/*Alta Categoria*/
	function altaCategoria($connect,$nombre) {
		$cont=maxCategoria($connect);
		if(!empty($cont)||$cont<=0){
			$cont++;
			if($cont<10){
				$idcategoria="C-00".$cont;
			}else if($cont<100){
				$idcategoria="C-0".$cont;
			}else if($cont>100){
				$idcategoria="C-".$cont;
			}else {
				$idcategoria=$cont;
			}
		}else {
			$cont="001";
			$idcategoria="C-".$cont;
		}
		try {
			$sql="INSERT INTO categoria (id_categoria,nombre) VALUES ('$idcategoria','$nombre')";
			$connect->exec($sql);
			echo "Creado la categoria con exito";
		} catch(PDOException $e){
			echo $sql."<br>".$e->getMessage();
		}
	}
	
	function maxProducto($connect) {
		$cont;
			$sql=$connect->prepare("select max(id_producto) as id_producto from producto");
			$sql->execute();
			$cont="";
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor) {
				for($i=1;$i<5;$i++){
					$cont=$cont.$valor["id_producto"][$i];
				}
			}
		if(empty($cont)){
			$cont=0;
		}
		return $cont;
	}
	/*Alta Producto*/
	function altaProducto($connect,$nombre,$precio,$nomCategoria) {
		$cont=maxProducto($connect);
		if(!empty($cont)||$cont<=0){
			$cont++;
			if($cont<10){
				$idproducto="P000".$cont;
			}else if($cont<100){
				$idproducto="P00".$cont;
			}else if($cont>100){
				$idproducto="P0".$cont;
			}else if($cont>1000){
				$idproducto="P".$cont;
			}else {
				$idproducto=$cont;
			}
		}else {
			$cont="0001";
			$idproducto="P".$cont;
		}
		/*Compruebo la id de la categoria con el nombre*/
		$categoria=idCategoria($connect,$nomCategoria);
		foreach($categoria as $valor) {
			$idCateg=$valor["id_categoria"];
		}
		
		try {
			if(empty($precio)){
				$sql="INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES ('$idproducto','$nombre',Null,'$idCateg')";
			}else {
				$sql="INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES ('$idproducto','$nombre','$precio','$idCateg')";
			}
			$connect->exec($sql);
			echo "Creado el producto con exito";
		} catch(PDOException $e){
			echo $sql."<br>".$e->getMessage();
		}
	}
	
	function maxAlmacen($connect) {
		$cont;
		$sql=$connect->prepare("select max(num_almacen) as num_almacen from almacen");
		$sql->execute();
		$cont=0;
		foreach($sql as $valor) {
			$cont=$valor["num_almacen"];
		}
		if(empty($cont)){
			$cont=0;
		}
		return $cont;
	}
	/*Alta Almacen*/
	function altaAlmacen($connect,$localidad) {
		$cont=maxAlmacen($connect);
		if(!empty($cont)||$cont!=0){
			$idalmacen=$cont+10;
		}else {
			$idalmacen=10;
		}
		try {
			$sql="INSERT INTO almacen (num_almacen,localidad) VALUES ('$idalmacen','$localidad')";
			$connect->exec($sql);
			echo "Creado el almacen con exito";
		} catch(PDOException $e){
			echo $sql."<br>".$e->getMessage();
		}
	}
	/*Alta Cliente*/
	function altaCliente($connect,$datos) {
		$nif=$datos[0];
		$countNif=strlen($nif);
		$countDatos=count($datos);
		$esnif=true;
		$mensaje="";
		if(!empty($nif)){
			if($countNif==9) {
				for($i=0;$i<$countNif-1;$i++){
					$num=$nif[$i];
					if($num<0||$num>9){
						$esnif=false;
					}
				}
				$nifletra=strtolower(substr($nif,$countNif-1));
				if($nifletra<"a"||$nifletra>"z") {
					$esnif=false;
				}
			}else {
				$mensaje=$mensaje."No es un NIF valido";
				$esnif=false;
			}
			if($esnif){
				$sql->execute();
				foreach($sql as $valor)  {
					if($valor["nif"]==0) {
						echo "No esta repetido el nif";
					}else {
						echo "Esta repetido el nif";
						$esnif=false;
					}
				}/* */
			}
		}if($esnif){
			for($i=1;$i<$countDatos;$i++) {
				if(empty($datos[$i])){
					$datos[$i]=null;
				}
			}
			$datosCliente="";
			for($i=0;$i<$countDatos;$i++) {
				if($i!=0){
					if($datos[$i]==null){
						$datosCliente=$datosCliente.",null";
					}else {
						$datosCliente=$datosCliente.",'".$datos[$i]."'";
					}
				}else {
					$datosCliente="'".$datos[$i]."'";
				}
			}
			try {
				$sql="INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad) VALUES ($datosCliente)";
				$connect->exec($sql);
				echo "Creado el cliente con exito";
			} catch(PDOException $e){
				echo $sql."<br>".$e->getMessage();
			}
		}else {
			if(empty($mensaje)) {
				echo "No es un NIF valido";
			}else {
				echo $mensaje;
			}
		}/**/
	}
	
	function aprovisionarProdAlma($connect,$nomProducto,$almacen,$cantidad) {
		$producto=idProduct($connect,$nomProducto);
		foreach($producto as $valor) {
			$idProducto=$valor["id_producto"];
		}
		try {
			$sql="INSERT INTO almacena (num_almacen,id_producto,cantidad) VALUES ('$almacen','$idProducto','$cantidad')";
			$connect->exec($sql);
			echo "Asignado el aprovisionamiento con exito";
		} catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	/* Consultar Stock*/
	function mostrarProdAlmaCantPdo($connect,$nomProduct) {
		$producto=idProduct($connect,$nomProduct);
		foreach($producto as $valor) {
			$idProducto=$valor["id_producto"];
		}
		try {
			$sql=$connect->prepare("select localidad,cantidad from almacena,almacen where almacen.num_almacen=almacena.num_almacen and id_producto='$idProducto' group by almacena.num_almacen");
			$sql->execute();
		} catch(PDOException $e){
			return $sql."<br>".$e->getMessage();
		}
		return $sql;
	}
	/* Consultar almacenes*/
	function mostrarAlmaProdPdo($connect,$localidad) {
		$almacen=idAlmacen($connect,$localidad);
		foreach($almacen as $valor) {
			$numAlma=$valor["num_almacen"];
		}
		try {
			$sql=$connect->prepare("select localidad,nombre from almacena,almacen,producto where almacen.num_almacen=almacena.num_almacen and producto.id_producto=almacena.id_producto and almacen.num_almacen='$numAlma' group by almacena.id_producto");
			$sql->execute();
		} catch(PDOException $e){
			return $sql."<br>".$e->getMessage();
		}
		return $sql;
	}
	/* Consultar Compras*/
	function mostrarComprasPdo($connect,$nifcliente) {
		try { //Falta realizar lo de la fecha
			$sql=$connect->prepare("select cliente.nombre as nombreCliente,producto.id_producto,producto.nombre as nombreProduct,(producto.precio*compra.unidades) as precio from cliente,compra,producto where compra.nif=cliente.nif and compra.id_producto=producto.id_producto and cliente.nif='$nifcliente' group by producto.id_producto");
			$sql->execute();
		} catch(PDOException $e){
			return $sql."<br>".$e->getMessage();
		}
		return $sql;
	}
	function resgistroCliente($connect,$datos) {
		$nif=$datos[0];
		$countNif=strlen($nif);
		$countDatos=count($datos);
		$esnif=true;
		$mensaje="";
		if(!empty($nif)){
			if($countNif==9) {
				for($i=0;$i<$countNif-1;$i++){
					$num=$nif[$i];
					if($num<0||$num>9){
						$esnif=false;
					}
				}
				$nifletra=strtolower(substr($nif,$countNif-1));
				if($nifletra<"a"||$nifletra>"z") {
					$esnif=false;
				}
			}else {
				$mensaje=$mensaje."No es un NIF valido";
				$esnif=false;
			}
			if($esnif){
				$sql=$connect->prepare("select count(nif) as nif from cliente where nif='$nif' group by nif");
				$sql->execute();
				foreach($sql as $valor)  {
					if($valor["nif"]==0) {
						$mensaje="No esta repetido el nif";
					}else {
						$mensaje="Esta repetido el nif";
						$esnif=false;
					}
				}/* */
			}
		}
		if($esnif){
			for($i=1;$i<$countDatos;$i++) {
				if(empty($datos[$i])){
					$datos[$i]=null;
				}
			}
			$datosCliente="";
			for($i=0;$i<$countDatos;$i++) {
				if($i!=0){
					if($datos[$i]==null){
						$datosCliente=$datosCliente.",null";
					}else {
						$datosCliente=$datosCliente.",'".$datos[$i]."'";
					}
				}else {
					$datosCliente="'".$datos[$i]."'";
				}
			}
			try {
				$sql="INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad,clave) VALUES ($datosCliente)";
				$connect->exec($sql);
				echo "Creado el cliente con exito";
			} catch(PDOException $e){
				echo $sql."<br>".$e->getMessage();
			}
		}else {
			if(empty($mensaje)) {
				$mensaje="No es un NIF valido";
			}else {
				echo $mensaje;
			}
		}
	}
	
	function createClave($apellido) {
		$clave=strrev($apellido);
		/*
		$clave="";
		for($i=strlen($apellido)-1;$i>=0;$i--) {
			$clave=$clave.substr($apellido,$i,1);
		}*/
		return $clave;
	}
	
	function comprobarInicio($connect,$usuario,$clave) {
		$sql=$connect->prepare("select count(nif) as nif from cliente where nombre='$usuario' and clave='$clave' group by nif");
		$sql->execute();
		$essesion=false;
		foreach($sql as $valor)  {
			if($valor["nif"]==0) {
				$essesion=false;
			}else {
				$essesion=true;
			}
		}
		return $essesion;
	}
	
	function getNif($connect,$usuario,$clave) {
		$sql=$connect->prepare("select nif from cliente where nombre='$usuario' and clave='$clave' group by nif");
		$sql->execute();
		$nif;
		foreach($sql as $valor)  {
			if($valor["nif"]!=null) {
				$nif=$valor["nif"];
			}
		}
		return $nif;
	}
	
?>