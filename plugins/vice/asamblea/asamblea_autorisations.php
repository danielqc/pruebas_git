<?php
if (!defined("_ECRIRE_INC_VERSION")) return;

// funcion para el pipeline, no hay nada que hacer
function parlamentarios_autoriser(){}

// declaraciones de las autorizaciones para parlamentarios
function autoriser_parlamentarios_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'parlamentarios', $id, $qui, $opt);
}
function autoriser_parlamentarios_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_parlamentario_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'parlamentario', $id, $qui, $opt);
}
function autoriser_parlamentario_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}
// declaraciones de las autorizaciones para comisiones
function autoriser_comisiones_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'comisiones', $id, $qui, $opt);
}
function autoriser_comisiones_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_comision_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'comision', $id, $qui, $opt);
}
function autoriser_comision_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}
// declaraciones de las autorizaciones para directivas
function autoriser_directivas_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'directivas', $id, $qui, $opt);
}
function autoriser_directivas_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_directiva_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'directiva', $id, $qui, $opt);
}
function autoriser_directiva_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}
?>
