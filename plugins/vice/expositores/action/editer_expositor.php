<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_expositor_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay expositor ? Creamos uno nuevo, pero solo si 'oui' en argumento
	if (!$id_expositor = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_expositor = insert_expositor();
	}

	if ($id_expositor) $err = revisions_expositores($id_expositor);
	return array($id_expositor,$err);
}


function insert_expositor() {
	$champs = array(
		'apellido' => _T('expositores:item_nuevo_expositor')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_expositores',
		),
		'data' => $champs
	));
	
	$id_expositor = sql_insertq("spip_expositores", $champs);
	return $id_expositor;
}


// Grabar algunas modificaciones de un expositor
function revisions_expositores($id_expositor, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('nombre', 'apellido', 'biografia') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}
	
	include_spip('inc/modifier');
	modifier_contenu('expositor', $id_expositor, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_expositor/$id_expositor'"
		),
		$c);
	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_expositor, 'expositor');
}
?>
