<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('base/personal');
include_spip('inc/meta');
include_spip('base/create');
function personal_upgrade($nom_meta_base_version, $version_cible){
	$current_version = "0.0";
	if (isset($GLOBALS['meta'][$nom_meta_base_version]))
		$current_version = $GLOBALS['meta'][$nom_meta_base_version];
	
	if ($current_version=="0.0") {
		creer_base();
		ecrire_meta($nom_meta_base_version, $current_version=$version_cible);
	}
	if (version_compare($current_version,"0.1.1","<")){
		maj_tables('spip_funcionarios');
		ecrire_meta($nom_meta_base_version,$current_version="0.1.1");
	}
	if (version_compare($current_version,"0.1.2","<")){
		maj_tables('spip_funcionarios');
		ecrire_meta($nom_meta_base_version,$current_version="0.1.2");
	}
	if (version_compare($current_version,"0.1.3","<")){
		maj_tables('spip_funcionarios');
		sql_alter("TABLE spip_funcionarios DROP biografia");
		sql_alter("TABLE spip_funcionarios ADD fecha_nacimiento tinytext DEFAULT '' NOT NULL AFTER apellido");
		sql_alter("TABLE spip_funcionarios ADD domicilio tinytext DEFAULT '' NOT NULL AFTER fecha_nacimiento");
		sql_alter("TABLE spip_funcionarios ADD celular tinytext DEFAULT '' NOT NULL AFTER domicilio");
		ecrire_meta($nom_meta_base_version,$current_version="0.1.3");
	}
	if (version_compare($current_version,"0.1.4","<")){
		maj_tables('spip_funcionarios');
		sql_alter("TABLE spip_funcionarios ADD id_consultor_de_linea integer DEFAULT 0 NOT NULL AFTER id_planta");
		ecrire_meta($nom_meta_base_version,$current_version="0.1.4");
	}
}
function personal_vider_tables($nom_meta_base_version) {
	/* Borrar todas las lineas de spip_documents_liens */
	sql_delete('spip_documents_liens', 'objet='.sql_quote('funcionario'));

	/* Borrar las tablas funcionarios y comisiones, y sacar la linea sobre la version del plugin */
	sql_drop_table("spip_funcionarios");
	effacer_meta($nom_meta_base_version);
}
?>
