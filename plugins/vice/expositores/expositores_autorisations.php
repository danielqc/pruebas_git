<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
// funcion para el pipeline, no hay nada que hacer
function expositores_autoriser(){}
// declaraciones de las autorizaciones
function autoriser_expositores_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'expositores', $id, $qui, $opt);
}
function autoriser_expositores_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_expositor_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'expositor', $id, $qui, $opt);
}
function autoriser_expositor_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
//	return true;
}
?>
