<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_directiva_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay directiva ? Creamos una nueva, pero solo si 'oui' en argumento
	if (!$id_directiva = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_directiva = insert_directiva();
	}

	if ($id_directiva) $err = revisions_directivas($id_directiva);
	return array($id_directiva,$err);
}


function insert_directiva() {
	$champs = array(
		'titre' => _T('asamblea:item_nueva_directiva')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_directivas',
		),
		'data' => $champs
	));
	
	$id_directiva = sql_insertq("spip_directivas", $champs);
	return $id_directiva;
}


// Grabar algunas modificaciones de una directiva
function revisions_directivas($id_directiva, $c=false) {

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
	modifier_contenu('directiva', $id_directiva, array(
			'nonvide' => array('titre' => _T('info_sans_titre')),
			'invalideur' => "id='id_directiva/$id_directiva'"
			),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_directiva, 'directiva');
}
?>
