<html>
<head> <title> EJ1-Conversion IP Decimal a Binario</title> </head>

<BODY>
	<h3>Ejercicio 1 Strings y sus funciones </h3>
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
	printf ("La Ip ".$ip." en decimal seria ".convertirABinario($ip1,$ip2,$ip3,$ip4)."<br/>");
?>
</BODY>
</html>
