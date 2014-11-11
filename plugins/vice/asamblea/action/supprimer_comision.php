<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_comision() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_comision $arg pas compris");
	} else {
		action_supprimer_comision_post($r[1]);
	}
}
function action_supprimer_comision_post($id_comision) {
	sql_delete("spip_comisiones", "id_comision=" . sql_quote($id_comision));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_comision/$id_comision'");
}
?>

