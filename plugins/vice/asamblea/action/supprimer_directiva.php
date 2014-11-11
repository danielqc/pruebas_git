<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_directiva() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_directiva $arg pas compris");
	} else {
		action_supprimer_directiva_post($r[1]);
	}
}
function action_supprimer_directiva_post($id_directiva) {
	sql_delete("spip_directivas", "id_directiva=" . sql_quote($id_directiva));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_directiva/$id_directiva'");
}
?>

