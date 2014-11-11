<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_contratacion_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay contratacion ? Creamos uno nuevo, pero solo si 'oui' en argumento
	if (!$id_contratacion = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_contratacion = insert_contratacion();
	}

	if ($id_contratacion) $err = revisions_contrataciones($id_contratacion);
	return array($id_contratacion,$err);
}


function insert_contratacion() {
	$champs = array(
		'num_convocatoria' => _T('licitacion:item_nueva_contratacion')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_contrataciones',
		),
		'data' => $champs
	));
	
	$id_contratacion = sql_insertq("spip_contrataciones", $champs);
	return $id_contratacion;
}


// Grabar algunas modificaciones de una contratacion
function revisions_contrataciones($id_contratacion, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('num_convocatoria', 'concepto_convocatoria', 'fecha_pub_sicoes', 'fecha_pres_prop', 'hora_pres_prop') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}

	include_spip('inc/modifier');
	modifier_contenu('contratacion', $id_contratacion, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_contratacion/$id_contratacion'"
			),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_contratacion, 'contratacion');
}
?>
