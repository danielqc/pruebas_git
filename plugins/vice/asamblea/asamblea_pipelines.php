<?php
function asamblea_objets_extensibles($objets){
	return array_merge($objets, array('parlamentario' => _T('asamblea:parlamentarios')));
}
// Anadimos la posibilidad de hacer busquedas sobre los campos de los objets del plugin
function asamblea_rechercher_liste_des_champs($tables){
	$tables['parlamentario']['nombre'] = 8;
	$tables['parlamentario']['apellido'] = 8;
	$tables['parlamentario']['actividades'] = 5;
	$tables['parlamentario']['fecha_nacimiento'] = 3;
	$tables['parlamentario']['domicilio'] = 3;
	return $tables;
}
?>
