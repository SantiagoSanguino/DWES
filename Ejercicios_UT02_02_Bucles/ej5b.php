<?php

echo "	
<HTML> 
<HEAD>
	<TITLE> EJ5B – Tabla Multiplicar con TD</TITLE>
	<meta charset=\"utf-8\" />
	<meta name=\"author\" content=\"Santiago Sanguino\" />
</HEAD>
<BODY>";

	$num="8";
	echo "<table style=\"border-color:gray;border-width:5px;border-style:solid\">";
	for($j=0;$j<=10;$j++){
		echo 	"<tr >
					<td style=\"border-bottom:gray 5px solid;border-right:gray 5px solid\">".$num."x".$j."</td>
					<td style=\"border-bottom:gray 5px solid\">".($num*$j)."</td>
				</tr>";
	}
	echo "</table>";
echo "
</BODY>
</HTML>";
?>
