<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_proyecto_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay proyecto ? Creamos uno nuevo, pero solo si 'oui' en argumento
	if (!$id_proyecto = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_proyecto = insert_proyecto();
	}

	if ($id_proyecto) $err = revisions_proyectos($id_proyecto);
	return array($id_proyecto,$err);
}


function insert_proyecto() {
	$champs = array(
		'titulo' => _T('proyectos:item_nuevo_proyecto')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_proyectos',
		),
		'data' => $champs
	));
	
	$id_proyecto = sql_insertq("spip_proyectos", $champs);
	return $id_proyecto;
}


// Grabar algunas modificaciones de un proyecto
function revisions_proyectos($id_proyecto, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('titulo', 'descripcion', 'id_ejecucion') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}

	include_spip('inc/modifier');
	modifier_contenu('proyecto', $id_proyecto, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_proyecto/$id_proyecto'"
		),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_proyecto, 'proyecto');
}
?>
