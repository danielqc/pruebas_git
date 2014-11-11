<?php
// pour f_boite_infos(), pour le pipeline boite_infos :(
include_spip('inc/presentation');
include_spip('inc/drapeau_edition');

function cadena_ejecucion($id_ejecucion) {
	return _T('proyectos:nivel_ejecucion_' . $id_ejecucion);
}
?>
