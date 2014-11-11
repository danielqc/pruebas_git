<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function proyectos_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['proyectos'] = 'proyectos';	
	return $interface;
}
function proyectos_declarer_tables_principales($tables_principales){
	//-- Tabla PROYECTOS ------------------------------------------
	$proyectos = array(
			"id_proyecto"	=> "bigint(21) NOT NULL",
			"titulo"	=> "tinytext DEFAULT '' NOT NULL",
			"descripcion"	=> "text DEFAULT '' NOT NULL",
			"id_ejecucion"	=> "integer NOT NULL",
			"maj"		=> "TIMESTAMP"
			);
	
	$proyectos_key = array(
			"PRIMARY KEY"	=> "id_proyecto",
			);
	
	$tables_principales['spip_proyectos'] =
		array('field' => &$proyectos, 'key' => &$proyectos_key);
	return $tables_principales;
}
function proyectos_declarer_tables_objets_surnoms($surnoms) {
        $surnoms['proyecto'] = 'proyectos';
        return $surnoms;
}
?>
