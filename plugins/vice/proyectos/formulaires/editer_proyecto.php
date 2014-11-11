<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_proyecto_charger_dist($id_proyecto='new', $retour=''){
	// poner una bandera para indicar que editamos la proyecto
	// (solo si es una modificacion, no una creacion)
	if (intval($id_proyecto))
	signale_edition($id_proyecto, $GLOBALS['visiteur_session'], 'proyecto');

	$valeurs = formulaires_editer_objet_charger('proyecto', $id_proyecto, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_proyecto_verifier_dist($id_proyecto='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('proyecto', $id_proyecto, array('titulo'));
	return $erreurs;
}

function formulaires_editer_proyecto_traiter_dist($id_proyecto='new', $retour=''){
	return formulaires_editer_objet_traiter('proyecto', $id_proyecto, '', '', $retour, '');
}

?>
