<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('base/proyectos');
include_spip('inc/meta');
include_spip('base/create');
function proyectos_upgrade($nom_meta_base_version, $version_cible){
	$current_version = "0.0";
	if (isset($GLOBALS['meta'][$nom_meta_base_version]))
		$current_version = $GLOBALS['meta'][$nom_meta_base_version];
	
	if ($current_version=="0.0") {
		creer_base();
		ecrire_meta($nom_meta_base_version, $current_version=$version_cible);
	}
/*        if (version_compare($current_version,"0.1.1","<")){
                maj_tables('spip_proyectos');
                $champs = expositores_declarer_champs_extras();
                installer_champs_extras($champs, $nom_meta_base_version, $version_cible);
                ecrire_meta($nom_meta_base_version,$current_version="0.1.1");
        }*/

}
function proyectos_vider_tables($nom_meta_base_version) {
        /* Borrar todas las lineas de spip_documents_liens */
        sql_delete('spip_documents_liens', 'objet='.sql_quote('proyecto'));

	/* Borrar la tabla proyectos y sacar la linea sobre la version del plugin */
	sql_drop_table("spip_proyectos");
	effacer_meta($nom_meta_base_version);
}
?>
