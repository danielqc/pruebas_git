<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function editoriales_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['editoriales'] = 'editoriales';	
	return $interface;
}
function editoriales_declarer_tables_principales($tables_principales){
	//-- Tabla EDITORIALES ------------------------------------------
	$editoriales = array(
			"id_editorial"	=> "bigint(21) NOT NULL",
			"nombre"	=> "tinytext DEFAULT '' NOT NULL",
			"lugar"		=> "text DEFAULT '' NOT NULL",
			"maj"		=> "TIMESTAMP"
			);
	
	$editoriales_key = array(
			"PRIMARY KEY"	=> "id_editorial",
			);
	
	$tables_principales['spip_editoriales'] =
		array('field' => &$editoriales, 'key' => &$editoriales_key);
	return $tables_principales;
}
function editoriales_declarer_tables_objets_surnoms($surnoms) {
        $surnoms['editorial'] = 'editoriales';
        return $surnoms;
}
?>
