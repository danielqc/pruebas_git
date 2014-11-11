<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_fuente_charger_dist($id_fuente='new', $retour=''){
	// poner una bandera para indicar que editamos la fuente
	// (solo si es una modificacion, no una creacion)
	if (intval($id_fuente))
	signale_edition($id_fuente, $GLOBALS['visiteur_session'], 'fuente');

	$valeurs = formulaires_editer_objet_charger('fuente', $id_fuente, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_fuente_verifier_dist($id_fuente='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('fuente', $id_fuente, array('nombre'));
	return $erreurs;
}

function formulaires_editer_fuente_traiter_dist($id_fuente='new', $retour=''){
	return formulaires_editer_objet_traiter('fuente', $id_fuente, '', '', $retour, '');
}

?>
