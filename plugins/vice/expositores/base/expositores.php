<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function expositores_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['expositores'] = 'expositores';	
	$interface['table_des_traitements']['BIOGRAFIA'][]= _TRAITEMENT_RACCOURCIS;
	return $interface;
}
function expositores_declarer_tables_principales($tables_principales){
	//-- Tabla EXPOSITORES ------------------------------------------
	$expositores = array(
			"id_expositor"	=> "bigint(21) NOT NULL",
			"nombre"	=> "tinytext DEFAULT ''",
			"apellido"	=> "tinytext DEFAULT '' NOT NULL",
			"biografia"	=> "text DEFAULT ''",
			"maj"	=> "TIMESTAMP"
			);
	
	$expositores_key = array(
			"PRIMARY KEY"	=> "id_expositor",
			);
	
	$tables_principales['spip_expositores'] =
		array('field' => &$expositores, 'key' => &$expositores_key);
	return $tables_principales;
}
function expositores_declarer_tables_objets_surnoms($surnoms) {
        $surnoms['expositor'] = 'expositores';
        return $surnoms;
}
function expositores_declarer_champs_extras($champs = array()){
	// expositores en los seminarios
        $champs[] = new ChampExtra(array(
                'table' => 'article', // sur quelle table ?
                'champ' => 'expositores', // nom sql
                'label' => 'expositores:expositores', // chaine de langue 'prefix:cle'
                'precisions' => '', // precisions sur le champ
                'obligatoire' => false, // 'oui' ou '' (ou false)
                'rechercher' => 3, // false, ou true ou directement la valeur de ponderation (de 1 �^�  8 generalement)
                'type' => 'expositores', // type de saisie
                'sql' => "text NOT NULL DEFAULT ''", // declaration sql
        ));
        return $champs;
}
?>
