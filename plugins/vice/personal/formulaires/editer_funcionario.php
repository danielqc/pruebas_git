<?php

if(!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_funcionario_charger_dist($id_funcionario='new', $retour=''){
	// poner una bandera para indicar que editamos el funcionario
	// (solo si es una modificacion, no una creacion)
	if (intval($id_funcionario))
	signale_edition($id_funcionario, $GLOBALS['visiteur_session'], 'funcionario');

	$valeurs = formulaires_editer_objet_charger('funcionario', $id_funcionario, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_funcionario_verifier_dist($id_funcionario='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('funcionario', $id_funcionario, array('apellido'));
	return $erreurs;
}

function formulaires_editer_funcionario_traiter_dist($id_funcionario='new', $retour=''){
	return formulaires_editer_objet_traiter('funcionario', $id_funcionario, '', '', $retour, '');
}

?>
