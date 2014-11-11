<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('base/asamblea');
include_spip('inc/meta');
include_spip('base/create');
function asamblea_upgrade($nom_meta_base_version, $version_cible){
	$current_version = "0.0";
	if (isset($GLOBALS['meta'][$nom_meta_base_version]))
		$current_version = $GLOBALS['meta'][$nom_meta_base_version];
	
	if ($current_version=="0.0") {
		creer_base();
		ecrire_meta($nom_meta_base_version, $current_version=$version_cible);
	}
	if (version_compare($current_version,"0.1.1","<")){
		maj_tables('spip_parlamentarios');
		ecrire_meta($nom_meta_base_version,$current_version="0.1.1");
	}
	if (version_compare($current_version,"0.1.2","<")){
		maj_tables('spip_parlamentarios');
		ecrire_meta($nom_meta_base_version,$current_version="0.1.2");
	}
	if (version_compare($current_version,"0.1.3","<")){
		maj_tables('spip_parlamentarios');
		sql_alter("TABLE spip_parlamentarios DROP biografia");
		sql_alter("TABLE spip_parlamentarios ADD fecha_nacimiento tinytext DEFAULT '' NOT NULL AFTER apellido");
		sql_alter("TABLE spip_parlamentarios ADD domicilio tinytext DEFAULT '' NOT NULL AFTER fecha_nacimiento");
		sql_alter("TABLE spip_parlamentarios ADD celular tinytext DEFAULT '' NOT NULL AFTER domicilio");
		ecrire_meta($nom_meta_base_version,$current_version="0.1.3");
	}
	if (version_compare($current_version,"0.1.4","<")){
		maj_tables('spip_parlamentarios');
		sql_alter("TABLE spip_parlamentarios ADD id_suplente integer DEFAULT 0 NOT NULL AFTER id_titular");
		ecrire_meta($nom_meta_base_version,$current_version="0.1.4");
	}
	if (version_compare($current_version,"0.2.0","<")){
		maj_tables('spip_comisiones');
		ecrire_meta($nom_meta_base_version,$current_version="0.2.0");
	}
	if (version_compare($current_version,"0.2.1","<")){
		maj_tables('spip_parlamentarios');
		sql_alter("TABLE spip_parlamentarios ADD id_comision integer NULL AFTER id_suplente");
		ecrire_meta($nom_meta_base_version,$current_version="0.2.1");
	}
	if (version_compare($current_version,"0.2.2","<")){
		maj_tables('spip_directivas');
		ecrire_meta($nom_meta_base_version,$current_version="0.2.2");
	}
	if (version_compare($current_version,"0.2.3","<")){
		maj_tables('spip_parlamentarios');
		sql_alter("TABLE spip_parlamentarios ADD id_directiva integer NULL AFTER id_comision");
		ecrire_meta($nom_meta_base_version,$current_version="0.2.3");
	}
	if (version_compare($current_version,"0.2.4","<")){
		maj_tables('spip_comisiones');
		sql_alter("TABLE spip_comisiones ADD orden integer");
		maj_tables('spip_directivas');
		sql_alter("TABLE spip_directivas ADD orden integer");
		ecrire_meta($nom_meta_base_version,$current_version="0.2.4");
	}
}
function asamblea_vider_tables($nom_meta_base_version) {
	/* Borrar todas las lineas de spip_documents_liens */
	sql_delete('spip_documents_liens', 'objet='.sql_quote('parlamentario'));

	/* Borrar las tablas parlamentarios y comisiones, y sacar la linea sobre la version del plugin */
	sql_drop_table("spip_parlamentarios");
	sql_drop_table("spip_comisiones");
	sql_drop_table("spip_directivas");
	effacer_meta($nom_meta_base_version);
}
?>
