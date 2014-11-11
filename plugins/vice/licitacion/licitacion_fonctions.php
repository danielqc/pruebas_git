<?php
// pour f_boite_infos(), pour le pipeline boite_infos :(
include_spip('inc/presentation');
include_spip('inc/drapeau_edition');
function cadena_planta2($id_planta) {
	if ($id_planta==1)
		return _T('licitacion:planta');
	else
		return _T('licitacion:consultor_de_linea');
}
?>