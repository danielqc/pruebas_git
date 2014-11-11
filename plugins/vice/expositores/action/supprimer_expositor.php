<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_expositor() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_expositor $arg pas compris");
	} else {
		action_supprimer_expositor_post($r[1]);
	}
}
function action_supprimer_expositor_post($id_expositor) {
	sql_delete("spip_expositores", "id_expositor=" . sql_quote($id_expositor));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_expositor/$id_expositor'");
}
?>

