<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_proyecto() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_proyecto $arg pas compris");
	} else {
		action_supprimer_proyecto_post($r[1]);
	}
}
function action_supprimer_proyecto_post($id_proyecto) {
	sql_delete("spip_proyectos", "id_proyecto=" . sql_quote($id_proyecto));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_proyecto/$id_proyecto'");
}
?>

