<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function asamblea_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['parlamentarios'] = 'parlamentarios';
	$interface['table_des_tables']['comisiones'] = 'comisiones';
	$interface['table_des_tables']['directivas'] = 'directivas';
	$interface['table_des_traitements']['ACTIVIDADES'][]= _TRAITEMENT_RACCOURCIS;
	return $interface;
}
function asamblea_declarer_tables_principales($tables_principales){
	//-- Tabla PARLAMENTARIOS ------------------------------------------
	$parlamentarios = array(
		"id_parlamentario"	=> "bigint(21) NOT NULL",
		"nombre"		=> "tinytext DEFAULT '' NOT NULL",
		"apellido"		=> "tinytext DEFAULT '' NOT NULL",
		"actividades"		=> "text DEFAULT '' NOT NULL",
		"fecha_nacimiento"	=> "tinytext DEFAULT '' NON NULL",
		"domicilio"		=> "tinytext DEFAULT '' NON NULL",
		"celular"		=> "tinytext DEFAULT '' NON NULL",
		"id_partido"		=> "bigint(21) NOT NULL",
		"id_departamento"	=> "bigint(21) NOT NULL",
		"id_titular"		=> "integer NOT NULL",
		"id_circunscripcion"	=> "integer NOT NULL",
		"id_suplente"		=> "integer NOT NULL",
		"id_comision"		=> "integer NOT NULL",
		"id_directiva"		=> "integer NOT NULL",
		"maj"			=> "TIMESTAMP"
		);
	
	$parlamentarios_key = array(
		"PRIMARY KEY"	=> "id_parlamentario",
		);
	
	$tables_principales['spip_parlamentarios'] =
		array('field' => &$parlamentarios, 'key' => &$parlamentarios_key);


	//-- Tabla COMISIONES ------------------------------------------
	$comisiones = array(
		"id_comision"	=> "bigint(21) NOT NULL",
		"titre"		=> "tinytext DEFAULT '' NOT NULL",
		"descripcion"		=> "text DEFAULT '' NOT NULL",
		"orden"	=>	"integer"
	);
	
	$comisiones_key = array(
		"PRIMARY KEY"	=> "id_comision",
		);
	
	$tables_principales['spip_comisiones'] =
		array('field' => &$comisiones, 'key' => &$comisiones_key);


	//-- Tabla DIRECTIVAS ------------------------------------------
	$directivas = array(
		"id_directiva"	=> "bigint(21) NOT NULL",
		"titre"		=> "tinytext DEFAULT '' NOT NULL",
		"descripcion"		=> "text DEFAULT '' NOT NULL",
		"orden"	=>	"integer"
	);
	
	$directivas_key = array(
		"PRIMARY KEY"	=> "id_directiva",
		);
	
	$tables_principales['spip_directivas'] =
		array('field' => &$directivas, 'key' => &$directivas_key);


	return $tables_principales;
}
function asamblea_declarer_tables_objets_surnoms($surnoms) {
	$surnoms['parlamentario'] = 'parlamentarios';
	$surnoms['comision'] = 'comisiones';
	$surnoms['directiva'] = 'directivas';
	return $surnoms;
}
?>
