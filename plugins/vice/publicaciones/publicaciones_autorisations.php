<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
// funcion para el pipeline, no hay nada que hacer
function publicaciones_autoriser(){}
// declaraciones de las autorizaciones
function autoriser_publicaciones_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'publicaciones', $id, $qui, $opt);
}
function autoriser_publicaciones_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_publicacion_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'publicacion', $id, $qui, $opt);
}
function autoriser_publicacion_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}
?>
