<?php
function personal_objets_extensibles($objets){
	return array_merge($objets, array('funcionario' => _T('personal:funcionarios')));
}
// Anadimos la posibilidad de hacer busquedas sobre los campos de los objets del plugin
function personal_rechercher_liste_des_champs($tables){
	$tables['funcionario']['nombre'] = 8;
	$tables['funcionario']['apellido'] = 8;
	$tables['funcionario']['tipo_funcionario'] = 5;
	$tables['funcionario']['cargo'] = 5;
	$tables['funcionario']['dependencia'] = 5;
	return $tables;
}
?>