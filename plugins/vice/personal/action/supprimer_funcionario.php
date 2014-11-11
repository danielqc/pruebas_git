<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_funcionario() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_funcionario $arg pas compris");
	} else {
		action_supprimer_funcionario_post($r[1]);
	}
}
function action_supprimer_funcionario_post($id_funcionario) {
	sql_delete("spip_funcionarios", "id_funcionario=" . sql_quote($id_funcionario));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_funcionario/$id_funcionario'");
}
?>

