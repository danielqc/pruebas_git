<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function personal_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['funcionarios'] = 'funcionarios';	
	return $interface;
}
function personal_declarer_tables_principales($tables_principales){
	//-- Tabla funcionarioS ------------------------------------------
	$funcionarios = array(
		"id_funcionario"	=> "bigint(21) NOT NULL",
		"nombre"			=> "tinytext DEFAULT '' NOT NULL",
		"apellido"			=> "tinytext DEFAULT '' NOT NULL",
		"tipo_funcionario"	=> "text DEFAULT '' NOT NULL",
		"cargo"				=> "text DEFAULT '' NOT NULL",
		"dependencia"		=> "text DEFAULT '' NOT NULL",
		"maj"				=> "TIMESTAMP"
		);
	
	$funcionarios_key = array(
		"PRIMARY KEY"	=> "id_funcionario",
		);
	
	$tables_principales['spip_funcionarios'] =
		array('field' => &$funcionarios, 'key' => &$funcionarios_key);

	return $tables_principales;
}
function personal_declarer_tables_objets_surnoms($surnoms) {
	$surnoms['funcionario'] = 'funcionarios';
	return $surnoms;
}
?>
