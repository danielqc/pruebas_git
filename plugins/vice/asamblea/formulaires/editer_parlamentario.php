<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_parlamentario_charger_dist($id_parlamentario='new', $retour=''){
	// poner una bandera para indicar que editamos el parlamentario
	// (solo si es una modificacion, no una creacion)
	if (intval($id_parlamentario))
	signale_edition($id_parlamentario, $GLOBALS['visiteur_session'], 'parlamentario');

	$valeurs = formulaires_editer_objet_charger('parlamentario', $id_parlamentario, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_parlamentario_verifier_dist($id_parlamentario='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('parlamentario', $id_parlamentario, array('apellido'));
	return $erreurs;
}

function formulaires_editer_parlamentario_traiter_dist($id_parlamentario='new', $retour=''){
	return formulaires_editer_objet_traiter('parlamentario', $id_parlamentario, '', '', $retour, '');
}

?>
