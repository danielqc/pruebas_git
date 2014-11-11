<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
// funcion para el pipeline, no hay nada que hacer
function proyectos_autoriser(){}
// declaraciones de las autorizaciones
function autoriser_proyectos_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'proyectos', $id, $qui, $opt);
}
function autoriser_proyectos_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_proyecto_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'proyecto', $id, $qui, $opt);
}
function autoriser_proyecto_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}
?>
