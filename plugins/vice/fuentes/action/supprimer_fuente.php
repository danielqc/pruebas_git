<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_fuente() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_fuente $arg pas compris");
	} else {
		action_supprimer_fuente_post($r[1]);
	}
}
function action_supprimer_fuente_post($id_fuente) {
	sql_delete("spip_fuentes", "id_fuente=" . sql_quote($id_fuente));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_fuente/$id_fuente'");
}
?>

