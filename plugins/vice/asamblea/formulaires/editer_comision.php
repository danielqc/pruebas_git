<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_comision_charger_dist($id_comision='new', $retour=''){
	// poner una bandera para indicar que editamos la comision
	// (solo si es una modificacion, no una creacion)
	if (intval($id_comision))
	signale_edition($id_comision, $GLOBALS['visiteur_session'], 'comision');

	$valeurs = formulaires_editer_objet_charger('comision', $id_comision, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_comision_verifier_dist($id_comision='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('comision', $id_comision, array('titre'));
	return $erreurs;
}

function formulaires_editer_comision_traiter_dist($id_comision='new', $retour=''){
	return formulaires_editer_objet_traiter('comision', $id_comision, '', '', $retour, '');
}

?>
