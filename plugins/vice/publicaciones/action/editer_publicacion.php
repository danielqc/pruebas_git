<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_publicacion_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay publicacion ? Creamos una nueva, pero solo si 'oui' en argumento
	if (!$id_publicacion = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_publicacion = insert_publicacion();
	}

	if ($id_publicacion) $err = revisions_publicaciones($id_publicacion);
	return array($id_publicacion,$err);
}


function insert_publicacion() {
	$champs = array(
		'titulo' => _T('publicaciones:item_nueva_publicacion')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_publicaciones',
		),
		'data' => $champs
	));
	
	$id_publicacion = sql_insertq("spip_publicaciones", $champs);
	return $id_publicacion;
}


// Grabar algunas modificaciones de una publicacion
function revisions_publicaciones($id_publicacion, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('titulo', 'descripcion', 'numero', 'mes', 'ano') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}
	
	include_spip('inc/modifier');
	modifier_contenu('publicacion', $id_publicacion, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_publicacion/$id_publicacion'"
		),
		$c);
        // liberamos la bandera para este objeto
        debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_publicacion, 'publicacion');
}
?>
