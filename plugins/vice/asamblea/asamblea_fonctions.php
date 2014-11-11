<?php
// pour f_boite_infos(), pour le pipeline boite_infos :(
include_spip('inc/presentation');
include_spip('inc/drapeau_edition');
function cadena_titular($id_titular) {
	if ($id_titular==1)
		return _T('asamblea:titular');
	else
		return _T('asamblea:suplente');
}
function cadena_circunscripcion($id_circunscripcion) {
	if ($id_circunscripcion==-3)
		return _T('asamblea:senador');
	elseif ($id_circunscripcion==-2)
		return _T('asamblea:plurinominal');
	elseif ($id_circunscripcion==-1)
		return _T('asamblea:indigena');
	else
		return _T('asamblea:circunscripcion', array('id_circunscripcion'=>$id_circunscripcion));
}

?>
