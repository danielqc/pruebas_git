<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function formulaires_filtro_fecha_charger_dist(){
	return(array('archives' => ''));
}
function formulaires_filtro_fecha_traiter_dist(){

	$archives = _request('archives');
	if ($archives) {
		set_request('archives', date('Y-m-d', strtotime(str_replace('/','-',$archives))));
	}
}

?>