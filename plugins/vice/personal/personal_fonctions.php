<?php
// pour f_boite_infos(), pour le pipeline boite_infos :(
include_spip('inc/presentation');
include_spip('inc/drapeau_edition');
function cadena_planta($id_planta) {
	if ($id_planta==1)
		return _T('personal:planta');
	else
		return _T('personal:consultor_de_linea');
}
?>
