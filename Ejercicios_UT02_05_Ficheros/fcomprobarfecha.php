<?php
	function transformarFecha(&$fecha) {
		$fecha=strchr($fecha,"/",false);
		$fecha=substr($fecha,1);
	}
	function buscar($array,$dato){
		$arraylength=count($array);
		for($i=0;$i<$arraylength;$i++){
			if($array[$i]==$dato){
				return true;
			}
		}
		return false;
	}
	function comprobarFecha($fecha) {
		$dia=strchr($fecha,"/",true);
		transformarFecha($fecha);
		$mes=strchr($fecha,"/",true);
		transformarFecha($fecha);
		$year=$fecha;
		
		$mes31=["1","3","5","7","8","10","12"];
		$mes30=["4","6","9","11"];
		
		if(($mes>0&&$mes<=12)&&$year>0) {
			if($mes==2) {
				if($year%4==0&&!($year%400==0)) {
					if($dia>0&&$dia<=29) {
						return true;
					}
				}else {
					if($dia>0&&$dia<=28) {
						return true;
					}
				}
			}else if(buscarDato($mes31,$mes)) {
				if($dia>0&&$dia<=31) {
					return true;
				}
			}else if(buscarDato($mes30,$mes)) {
				if($dia>0&&$dia<=30) {
					return true;
				}
			}
		}
		return false;
		/* */
	}
?>