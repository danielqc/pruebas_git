<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function publicaciones_declarer_tables_interfaces($interface){
	$interface['table_des_tables']['publicaciones'] = 'publicaciones';	
	$interface['table_des_traitements']['DESCRIPCION'][]= _TRAITEMENT_RACCOURCIS;

	/* Para las "JOIN" en los bucles de esqueleto */
	$interface['tables_jointures']['spip_publicaciones']['id_mot'] = 'spip_mots_publicaciones';
	$interface['tables_jointures']['spip_mots']['id_publicacion'] = 'spip_mots_publicaciones';
	$interface['tables_jointures']['spip_mots_publicaciones']['id_mot'] = 'spip_mots';
	$interface['tables_jointures']['spip_mots_publicaciones']['id_publicacion'] = 'spip_publicaciones';

	$interface['tables_jointures']['spip_publicaciones']['id_expositor'] = 'spip_expositores_publicaciones';
	$interface['tables_jointures']['spip_expositores']['id_publicacion'] = 'spip_expositores_publicaciones';
	$interface['tables_jointures']['spip_expositores_publicaciones']['id_expositor'] = 'spip_expositores';
	$interface['tables_jointures']['spip_expositores_publicaciones']['id_publicacion'] = 'spip_publicaciones';


	return $interface;
}
function publicaciones_declarer_tables_principales($tables_principales){
	//-- Tabla PUBLICACIONES ------------------------------------------
	$publicaciones = array(
			"id_publicacion"	=> "bigint(21) NOT NULL",
			"titulo"		=> "text DEFAULT '' NOT NULL",
			"descripcion"		=> "text DEFAULT ''",
			"numero"		=> "int DEFAULT 0",
			"mes"			=> "int DEFAULT 0",
			"ano"			=> "int DEFAULT 0",
			"maj"			=> "TIMESTAMP"
			);
	
	$publicaciones_key = array(
			"PRIMARY KEY"	=> "id_publicacion",
			);

	$tables_principales['spip_publicaciones'] =
		array('field' => &$publicaciones, 'key' => &$publicaciones_key);

	return $tables_principales;
}
function publicaciones_declarer_tables_auxiliaires($tables_auxiliaires){

	//-- Tabla EXPOSITORES_PUBLICACIONES -----------------------------
	$expositores_publicaciones = array(
			"id_expositor"		=> "bigint(21) NOT NULL",
			"id_publicacion" 	=> "bigint(21) NOT NULL",
			);
	
	$expositores_publicaciones_key = array(
			"PRIMARY KEY"	=> "id_expositor, id_publicacion",
			);

	$tables_auxiliaires['spip_expositores_publicaciones'] =
		array('field' => &$expositores_publicaciones, 'key' => &$expositores_publicaciones_key);


	return $tables_auxiliaires;
}
function publicaciones_declarer_tables_objets_surnoms($surnoms) {
        $surnoms['publicacion'] = 'publicaciones';
        return $surnoms;
}
function publicaciones_declarer_champs_extras($champs = array()){
        // expositores/autores en las publicaciones
        $champs[] = new ChampExtra(array(
                'table' => 'publicacion', // sur quelle table ?
                'champ' => 'expositores', // nom sql
                'label' => 'expositores:autores', // chaine de langue 'prefix:cle'
                'precisions' => '', // precisions sur le champ
                'obligatoire' => false, // 'oui' ou '' (ou false)
                'rechercher' => 3, // false, ou true ou directement la valeur de ponderation (de 1 �^�  8 generalement)
                'type' => 'expositores', // type de saisie
                'sql' => "text NOT NULL DEFAULT ''", // declaration sql
        ));
	// editorial en las publicaciones
        $champs[] = new ChampExtra(array(
                'table' => 'publicacion', // sur quelle table ?
                'champ' => 'editorial', // nom sql
                'label' => 'editoriales:editorial', // chaine de langue 'prefix:cle'
                'precisions' => '', // precisions sur le champ
                'obligatoire' => false, // 'oui' ou '' (ou false)
                'rechercher' => 3, // false, ou true ou directement la valeur de ponderation (de 1 �^�  8 generalement)
                'type' => 'editoriales', // type de saisie
                'sql' => "text NOT NULL DEFAULT ''", // declaration sql
        ));
        return $champs;
}
/* plugin mots_objets - adicion de las palabras-clave para las publicaciones */
function publicaciones_declarer_liaison_mots($liaisons){
	$liaisons['publicaciones'] = new declaration_liaison_mots('publicaciones', array(
		'exec_formulaire_liaison' => "publicacion_voir",
		'singulier' => "publicaciones:publicacion", //"mediatheque:un_document",
		'pluriel'   => "publicaciones:publicaciones", //"mediatheque:des_documents",
		'libelle_objet' => "publicaciones:objeto_publicaciones",
		'libelle_liaisons_objets' => "publicaciones:item_mots_cles_association_publicaciones",
	));
	return $liaisons;
}
?>
