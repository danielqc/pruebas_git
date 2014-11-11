<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function licitacion_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['contrataciones'] = 'contrataciones';	
	return $interface;
}
function licitacion_declarer_tables_principales($tables_principales){
	//-- Tabla contrataciones -----
	$contrataciones = array(
		"id_contratacion"		=> "bigint(21) NOT NULL",
		"num_convocatoria"		=> "tinytext DEFAULT '' NOT NULL",
		"concepto_convocatoria"	=> "tinytext DEFAULT '' NOT NULL",
		"fecha_pub_sicoes"		=> "text DEFAULT '' NOT NULL",
		"fecha_pres_prop"		=> "text DEFAULT '' NOT NULL",
		"hora_pres_prop"		=> "text DEFAULT '' NOT NULL",		
		"maj"					=> "TIMESTAMP"
		);
	
	$contrataciones_key = array(
		"PRIMARY KEY"	=> "id_contratacion",
		);
	
	$tables_principales['spip_contrataciones'] =
		array('field' => &$contrataciones, 'key' => &$contrataciones_key);

	return $tables_principales;
}
function licitacion_declarer_tables_objets_surnoms($surnoms) {
	$surnoms['contratacion'] = 'contrataciones';
	return $surnoms;
}
?>