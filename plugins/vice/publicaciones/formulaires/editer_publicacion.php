<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');
include_spip('inc/drapeau_edition');

function formulaires_editer_publicacion_charger_dist($id_publicacion='new', $retour=''){
        // poner una bandera para indicar que editamos la publicacion
        // (solo si es una modificacion, no una creacion)
        if (intval($id_publicacion))
        signale_edition($id_publicacion, $GLOBALS['visiteur_session'], 'publicacion');

	$valeurs = formulaires_editer_objet_charger('publicacion', $id_publicacion, '', '', $retour, '');
	return $valeurs;
}

function formulaires_editer_publicacion_verifier_dist($id_publicacion='new', $retour=''){
	$erreurs = formulaires_editer_objet_verifier('publicacion', $id_publicacion, array('titulo'));
	return $erreurs;
}

function formulaires_editer_publicacion_traiter_dist($id_publicacion='new', $retour=''){
	return formulaires_editer_objet_traiter('publicacion', $id_publicacion, '', '', $retour, '');
}

?>
