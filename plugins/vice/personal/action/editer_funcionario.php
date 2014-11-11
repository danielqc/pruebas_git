<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/drapeau_edition');

function action_editer_funcionario_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	// No hay funcionario ? Creamos uno nuevo, pero solo si 'oui' en argumento
	if (!$id_funcionario = intval($arg)) {
		if ($arg != 'oui') {
			include_spip('inc/headers');
			redirige_url_ecrire();
		}
		$id_funcionario = insert_funcionario();
	}

	if ($id_funcionario) $err = revisions_funcionarios($id_funcionario);
	return array($id_funcionario,$err);
}


function insert_funcionario() {
	$champs = array(
		'nombre' => _T('personal:item_nueva_funcionario')
	);
	
	// Enviar a los plugins
	$champs = pipeline('pre_insertion', array(
		'args' => array(
			'table' => 'spip_funcionarios',
		),
		'data' => $champs
	));
	
	$id_funcionario = sql_insertq("spip_funcionarios", $champs);
	return $id_funcionario;
}


// Grabar algunas modificaciones de un funcionario
function revisions_funcionarios($id_funcionario, $c=false) {

	// recuperar los campos en POST si no estan transmitidos
	if ($c === false) {
		$c = array();
		foreach (array('apellido', 'nombre', 'tipo_funcionario', 'cargo', 'dependencia') as $champ) {
			if (($a = _request($champ)) !== null) {
				$c[$champ] = $a;
			}
		}
	}

	include_spip('inc/modifier');
	modifier_contenu('funcionario', $id_funcionario, array(
			'nonvide' => array('nom' => _T('info_sans_titre')),
			'invalideur' => "id='id_funcionario/$id_funcionario'"
			),
		$c);

	// liberamos la bandera para este objeto
	debloquer_edition($GLOBALS['visiteur_session']['id_auteur'], $id_funcionario, 'funcionario');
}
?>
