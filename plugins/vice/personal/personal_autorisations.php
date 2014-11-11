<?php
if (!defined("_ECRIRE_INC_VERSION")) return;

// funcion para el pipeline, no hay nada que hacer
function funcionarios_autoriser(){}

// declaraciones de las autorizaciones para funcionarios
function autoriser_funcionarios_bouton_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('voir', 'funcionarios', $id, $qui, $opt);
}
function autoriser_funcionarios_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}
function autoriser_funcionario_voir_dist($faire, $type, $id, $qui, $opt) {
	return autoriser('modifier', 'funcionario', $id, $qui, $opt);
}
function autoriser_funcionario_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

?>