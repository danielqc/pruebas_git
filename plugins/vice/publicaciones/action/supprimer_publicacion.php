<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_publicacion() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_publicacion $arg pas compris");
	} else {
		action_supprimer_publicacion_post($r[1]);
	}
}
function action_supprimer_publicacion_post($id_publicacion) {
	sql_delete("spip_publicaciones", "id_publicacion=" . sql_quote($id_publicacion));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_publicacion/$id_publicacion'");
}
?>

