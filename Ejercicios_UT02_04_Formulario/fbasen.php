<?php
	function base($num) {
		$num=strchr($num,"/",false);
		return substr($num,1);
	}
	function numAct($num) {
		return strchr($num,"/",true);
	}
?>