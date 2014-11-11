<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function fuentes_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['fuentes'] = 'fuentes';	
	return $interface;
}
function fuentes_declarer_tables_principales($tables_principales){
	//-- Tabla FUENTES ------------------------------------------
	$fuentes = array(
			"id_fuente"	=> "bigint(21) NOT NULL",
			"nombre"	=> "tinytext DEFAULT '' NOT NULL",
			"descripcion"	=> "text DEFAULT '' NOT NULL",
			"maj"		=> "TIMESTAMP"
			);
	
	$fuentes_key = array(
			"PRIMARY KEY"	=> "id_fuente",
			);
	
	$tables_principales['spip_fuentes'] =
		array('field' => &$fuentes, 'key' => &$fuentes_key);
	return $tables_principales;
}
function fuentes_declarer_tables_objets_surnoms($surnoms) {
        $surnoms['fuente'] = 'fuentes';
        return $surnoms;
}
function fuentes_declarer_champs_extras($champs = array()){
        // fuentes en las noticias (articulos)
        $champs[] = new ChampExtra(array(
                'table' => 'article', // sur quelle table ?
                'champ' => 'fuente', // nom sql
                'label' => 'fuentes:fuente', // chaine de langue 'prefix:cle'
                'precisions' => '', // precisions sur le champ
                'obligatoire' => false, // 'oui' ou '' (ou false)
                'rechercher' => false, // false, ou true ou directement la valeur de ponderation (de 1 �^�  8 generalement)
                'type' => 'fuente', // type de saisie
                'sql' => "integer", // declaration sql
        ));
        return $champs;
}
?>
