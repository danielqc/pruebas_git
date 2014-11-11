<?php
if (!defined("_ECRIRE_INC_VERSION")) return;

// funcion para el pipeline, no hay nada que hacer
function contrataciones_autoriser(){}

// declaraciones de las autorizaciones para contrataciones
function autoriser_contrataciones_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'contrataciones', $id, $qui, $opt);
}
function autoriser_contrataciones_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_contratacion_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'contratacion', $id, $qui, $opt);
}
function autoriser_contratacion_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

?>