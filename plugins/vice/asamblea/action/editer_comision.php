<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_comision_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay comision ? Creamos una nueva, pero solo si 'oui' en argumento
	if (!$id_comision = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_comision = insert_comision();
	}

	if ($id_comision) $err = revisions_comisiones($id_comision);
	return array($id_comision,$err);
}


function insert_comision() {
	$champs = array(
		'titre' => _T('asamblea:item_nueva_comision')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_comisiones',
		),
		'data' => $champs
	));
	
	$id_comision = sql_insertq("spip_comisiones", $champs);
	return $id_comision;
}


// Grabar algunas modificaciones de una comision
function revisions_comisiones($id_comision, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('titre', 'descripcion', 'orden') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}

	include_spip('inc/modifier');
	modifier_contenu('comision', $id_comision, array(
			'nonvide' => array('titre' => _T('info_sans_titre')),
			'invalideur' => "id='id_comision/$id_comision'"
			),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_comision, 'comision');
}
?>
