<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_directiva_charger_dist($id_directiva='new', $retour=''){
	// poner una bandera para indicar que editamos la directiva
	// (solo si es una modificacion, no una creacion)
	if (intval($id_directiva))
	signale_edition($id_directiva, $GLOBALS['visiteur_session'], 'directiva');

	$valeurs = formulaires_editer_objet_charger('directiva', $id_directiva, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_directiva_verifier_dist($id_directiva='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('directiva', $id_directiva, array('titre'));
	return $erreurs;
}

function formulaires_editer_directiva_traiter_dist($id_directiva='new', $retour=''){
	return formulaires_editer_objet_traiter('directiva', $id_directiva, '', '', $retour, '');
}

?>
