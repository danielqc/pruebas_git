<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_editorial_charger_dist($id_editorial='new', $retour=''){
	// poner una bandera para indicar que editamos el editorial
	// (solo si es una modificacion, no una creacion)
	if (intval($id_editorial))
	signale_edition($id_editorial, $GLOBALS['visiteur_session'], 'editorial');

	$valeurs = formulaires_editer_objet_charger('editorial', $id_editorial, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_editorial_verifier_dist($id_editorial='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('editorial', $id_editorial, array('nombre'));
	return $erreurs;
}

function formulaires_editer_editorial_traiter_dist($id_editorial='new', $retour=''){
	return formulaires_editer_objet_traiter('editorial', $id_editorial, '', '', $retour, '');
}

?>
