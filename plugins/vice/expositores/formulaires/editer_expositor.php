<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_expositor_charger_dist($id_expositor='new', $retour=''){
	// poner una bandera para indicar que editamos el expositor
	// (solo si es una modificacion, no una creacion)
	if (intval($id_expositor))
	signale_edition($id_expositor, $GLOBALS['visiteur_session'], 'expositor');

	$valeurs = formulaires_editer_objet_charger('expositor', $id_expositor, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_expositor_verifier_dist($id_expositor='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('expositor', $id_expositor, array('apellido'));
	return $erreurs;
}

function formulaires_editer_expositor_traiter_dist($id_expositor='new', $retour=''){
	return formulaires_editer_objet_traiter('expositor', $id_expositor, '', '', $retour, '');
}

?>
