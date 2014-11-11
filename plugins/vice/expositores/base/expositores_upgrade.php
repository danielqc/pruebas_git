<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/cextras_gerer');
include_spip('base/expositores');
include_spip('inc/meta');
include_spip('base/create');
function expositores_upgrade($nom_meta_base_version, $version_cible){
	$current_version = "0.0";
	if (isset($GLOBALS['meta'][$nom_meta_base_version]))
		$current_version = $GLOBALS['meta'][$nom_meta_base_version];
	
	if ($current_version=="0.0") {
		creer_base();
		$champs = expositores_declarer_champs_extras();
		installer_champs_extras($champs, $nom_meta_base_version, $version_cible);
		ecrire_meta($nom_meta_base_version, $current_version=$version_cible);
	}
/*	if (version_compare($current_version,"0.1.1","<")){
		maj_tables('spip_expositores');
		$champs = expositores_declarer_champs_extras();
		installer_champs_extras($champs, $nom_meta_base_version, $version_cible);
		ecrire_meta($nom_meta_base_version,$current_version="0.1.1");
	}*/

}
function expositores_vider_tables($nom_meta_base_version) {
	/* Desinstalar el campo extra en los articulos y las publicaciones */
	$champs = expositores_declarer_champs_extras();
	desinstaller_champs_extras($champs, $nom_meta_base_version);

        /* Borrar todas las lineas de spip_documents_liens */
        sql_delete('spip_documents_liens', 'objet='.sql_quote('expositor'));

	/* Borrar la tabla expositores y sacar la linea sobre la version del plugin */
	sql_drop_table("spip_expositores");
	effacer_meta($nom_meta_base_version);
}
?>
