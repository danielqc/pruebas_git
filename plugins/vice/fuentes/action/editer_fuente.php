<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_fuente_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay fuente ? Creamos uno nuevo, pero solo si 'oui' en argumento
	if (!$id_fuente = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_fuente = insert_fuente();
	}

	if ($id_fuente) $err = revisions_fuentes($id_fuente);
	return array($id_fuente,$err);
}


function insert_fuente() {
	$champs = array(
		'nombre' => _T('fuentes:item_nueva_fuente')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_fuentes',
		),
		'data' => $champs
	));
	
	$id_fuente = sql_insertq("spip_fuentes", $champs);
	return $id_fuente;
}


// Grabar algunas modificaciones de un fuente
function revisions_fuentes($id_fuente, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('nombre', 'descripcion') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}

	include_spip('inc/modifier');
	modifier_contenu('fuente', $id_fuente, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_fuente/$id_fuente'"
		),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_fuente, 'fuente');
}
?>
