<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
// funcion para el pipeline, no hay nada que hacer
function editoriales_autoriser(){}
// declaraciones de las autorizaciones
function autoriser_editoriales_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'editoriales', $id, $qui, $opt);
}
function autoriser_editoriales_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_editorial_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'editorial', $id, $qui, $opt);
}
function autoriser_editorial_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}
?>
