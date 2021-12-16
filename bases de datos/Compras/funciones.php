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
	
	function contarCategorias($connect) {
		$cont;
			$sql=$connect->prepare("select id_categoria from categoria");
			$sql->execute();
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor){
				$cont="";
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
		$cont=contarCategorias($connect);
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
			// use exec() because no results are returned
			$connect->exec($sql);
			echo "Creado la categoria con exito";
		} catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	
	function contarProducto($connect) {
		$cont;
			$sql=$connect->prepare("select id_producto from producto");
			$sql->execute();
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor){
				$cont="";
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
		$cont=contarProducto($connect);
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
			// use exec() because no results are returned
			$connect->exec($sql);
			echo "Creado el producto con exito";
		} catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	function sacarOpcionesCategPdo($connect) {
		try {
			$sql=$connect->prepare("select nombre from categoria");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay categoria</br>";
		}
		return $sql;
	}
	function idCategoria($connect,$nomCategoria) {
		try {
			$sql=$connect->prepare("select id_categoria from categoria where nombre='$nomCategoria' group by id_categoria");
			$sql->execute();
		}catch(PDOException $e) {
			return "No hay categoria id</br>";
		}
		return $sql;
	}
	
	function contarAlmacen($connect) {
		$cont;
			$sql=$connect->prepare("select count(num_almacen) as num_almacen from almacen");
			$sql->execute();
			foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $valor){
				$cont=$valor["num_almacen"];
			}
		if(empty($cont)){
			$cont=0;
		}
		return $cont;
	}
	/*Alta Almacen*/
	function altaAlmacen($connect,$localidad) {
		$cont=contarAlmacen($connect);
		if(!empty($cont)||$cont!=0){
			$idalmacen=0;
			for($i=0;$i<=$cont;$i++){
				$idalmacen+=10;
			}
			var_dump($idalmacen);
		}else {
			$idalmacen=10;
			var_dump($idalmacen);
		}
		var_dump($idalmacen);
		try {
			$sql="INSERT INTO almacen (num_almacen,localidad) VALUES ('$idalmacen','$localidad')";
			// use exec() because no results are returned
			$connect->exec($sql);
			echo "Creado el almacen con exito";
		} catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}
	}
?>