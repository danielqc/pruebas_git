<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_contratacion() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_contratacion $arg pas compris");
	} else {
		action_supprimer_contratacion_post($r[1]);
	}
}
function action_supprimer_contratacion_post($id_contratacion) {
	sql_delete("spip_contrataciones", "id_contratacion=" . sql_quote($id_contratacion));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_contratacion/$id_contratacion'");
}
?>

