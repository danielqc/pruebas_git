<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('base/editoriales');
include_spip('inc/meta');
include_spip('base/create');
function editoriales_upgrade($nom_meta_base_version, $version_cible){
	$current_version = "0.0";
	if (isset($GLOBALS['meta'][$nom_meta_base_version]))
		$current_version = $GLOBALS['meta'][$nom_meta_base_version];
	
	if ($current_version=="0.0") {
		creer_base();
		ecrire_meta($nom_meta_base_version, $current_version=$version_cible);
	}
/*        if (version_compare($current_version,"0.1.1","<")){
                maj_tables('spip_editoriales');
                ecrire_meta($nom_meta_base_version,$current_version="0.1.1");
        }*/

}
function editoriales_vider_tables($nom_meta_base_version) {
        /* Borrar todas las lineas de spip_documents_liens */
        sql_delete('spip_documents_liens', 'objet='.sql_quote('editorial'));

	/* Borrar la tabla editoriales y sacar la linea sobre la version del plugin */
	sql_drop_table("spip_editoriales");
	effacer_meta($nom_meta_base_version);
}
?>
