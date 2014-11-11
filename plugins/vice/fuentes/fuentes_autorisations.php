<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
// funcion para el pipeline, no hay nada que hacer
function fuentes_autoriser(){}
// declaraciones de las autorizaciones
function autoriser_fuentes_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'fuentes', $id, $qui, $opt);
}
function autoriser_fuentes_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_fuente_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'fuente', $id, $qui, $opt);
}
function autoriser_fuente_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}
?>
