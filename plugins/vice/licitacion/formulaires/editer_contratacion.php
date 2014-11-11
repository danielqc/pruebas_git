<?php

if(!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_contratacion_charger_dist($id_contratacion='new', $retour=''){
	// poner una bandera para indicar que editamos el contratacion
	// (solo si es una modificacion, no una creacion)
	if (intval($id_contratacion))
	signale_edition($id_contratacion, $GLOBALS['visiteur_session'], 'contratacion');

	$valeurs = formulaires_editer_objet_charger('contratacion', $id_contratacion, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_contratacion_verifier_dist($id_contratacion='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('contratacion', $id_contratacion, array('concepto_convocatoria'));
	return $erreurs;
}

function formulaires_editer_contratacion_traiter_dist($id_contratacion='new', $retour=''){
	return formulaires_editer_objet_traiter('contratacion', $id_contratacion, '', '', $retour, '');
}

?>
