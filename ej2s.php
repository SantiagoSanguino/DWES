<html>
<head> <title> EJ1-Conversion IP Decimal a Binario</title> </head>

<BODY>
<h2>Ejercicio 2 Strings y sus funciones</h2>
<?php
	$ip="192.168.206.214";
	echo "La Ip ".$ip." en decimal seria ".base_convert($ip,10,2)."<br/>";
	# Antiguo codigo
	//$ip="192168206214";
	//$ipbin=decbin($ip);
	//echo "La Ip ".number_format($ip,0,".",".")." en decimal seria ".decbin($ip)."<br/>";
	//echo " Ip ".gettype($ip)." ip ".gettype($ipbin);
	// Es el tipo de formato, no funciona con esos tipos de datos
?>
</BODY>
</html>