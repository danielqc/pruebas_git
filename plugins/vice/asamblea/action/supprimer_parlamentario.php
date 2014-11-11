<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_parlamentario() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_parlamentario $arg pas compris");
	} else {
		action_supprimer_parlamentario_post($r[1]);
	}
}
function action_supprimer_parlamentario_post($id_parlamentario) {
	sql_delete("spip_parlamentarios", "id_parlamentario=" . sql_quote($id_parlamentario));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_parlamentario/$id_parlamentario'");
}
?>

