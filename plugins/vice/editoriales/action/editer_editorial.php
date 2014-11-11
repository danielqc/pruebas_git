<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_editorial_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay editorial ? Creamos uno nuevo, pero solo si 'oui' en argumento
	if (!$id_editorial = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_editorial = insert_editorial();
	}

	if ($id_editorial) $err = revisions_editoriales($id_editorial);
	return array($id_editorial,$err);
}


function insert_editorial() {
	$champs = array(
		'nombre' => _T('editoriales:item_nuevo_editorial')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_editoriales',
		),
		'data' => $champs
	));
	
	$id_editorial = sql_insertq("spip_editoriales", $champs);
	return $id_editorial;
}


// Grabar algunas modificaciones de un editorial
function revisions_editoriales($id_editorial, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('nombre', 'lugar') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}

	include_spip('inc/modifier');
	modifier_contenu('editorial', $id_editorial, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_editorial/$id_editorial'"
		),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_editorial, 'editorial');
}
?>
