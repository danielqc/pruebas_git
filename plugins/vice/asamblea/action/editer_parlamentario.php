<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_parlamentario_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay parlamentario ? Creamos uno nuevo, pero solo si 'oui' en argumento
	if (!$id_parlamentario = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_parlamentario = insert_parlamentario();
	}

	if ($id_parlamentario) $err = revisions_parlamentarios($id_parlamentario);
	return array($id_parlamentario,$err);
}


function insert_parlamentario() {
	$champs = array(
		'nombre' => _T('asamblea:item_nueva_parlamentario')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_parlamentarios',
		),
		'data' => $champs
	));
	
	$id_parlamentario = sql_insertq("spip_parlamentarios", $champs);
	return $id_parlamentario;
}


// Grabar algunas modificaciones de un parlamentario
function revisions_parlamentarios($id_parlamentario, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('apellido', 'nombre', 'actividades', 'fecha_nacimiento', 'domicilio', 'celular', 'id_partido', 'id_departamento', 'id_titular', 'id_suplente', 'id_circunscripcion', 'id_comision', 'id_directiva') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}

	include_spip('inc/modifier');
	modifier_contenu('parlamentario', $id_parlamentario, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_parlamentario/$id_parlamentario'"
			),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_parlamentario, 'parlamentario');
}
?>
