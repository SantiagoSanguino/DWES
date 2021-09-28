<html>
<head> <title> EJ1-Conversion IP Decimal a Binario</title> </head>

<BODY>
<h2>Ejercicio 2 Strings y sus funciones</h2>
<?php
	$ip="192.168.206.214";
	$ipAux=$ip;
	$ip1=directionPoints($ipAux);
	$ipAux=directionIp($ipAux);
	$ip2=directionPoints($ipAux);
	$ipAux=directionIp($ipAux);
	$ip3=directionPoints($ipAux);
	$ipAux=directionIp($ipAux);
	$ip4=$ipAux;
	function directionIp($ip) {
		$ip=strchr($ip,".",false);
		return substr($ip,1);
	}
	function directionPoints($ip) {
		return strchr($ip,".",true);
	}
	function convertirABinario($ip1,$ip2,$ip3,$ip4){
		return base_convert($ip1,10,2).".".base_convert($ip2,10,2).".".base_convert($ip3,10,2).".".base_convert($ip4,10,2);
	}
	echo "La Ip ".$ip." en decimal seria ".convertirABinario($ip1,$ip2,$ip3,$ip4)."<br/>";
	# Antiguo codigo
	//$ip="192168206214";
	//$ipbin=decbin($ip);
	//echo "La Ip ".number_format($ip,0,".",".")." en decimal seria ".decbin($ip)."<br/>";
	//echo " Ip ".gettype($ip)." ip ".gettype($ipbin);
	// Es el tipo de formato, no funciona con esos tipos de datos
?>
</BODY>
</html>
