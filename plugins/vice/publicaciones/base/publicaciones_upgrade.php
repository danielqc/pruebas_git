<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
include_spip('inc/cextras_gerer');
include_spip('base/publicaciones');
include_spip('inc/meta');
include_spip('base/create');
function publicaciones_upgrade($nom_meta_base_version, $version_cible){
	$current_version = "0.0";
	if (isset($GLOBALS['meta'][$nom_meta_base_version]))
		$current_version = $GLOBALS['meta'][$nom_meta_base_version];
	
	if ($current_version=="0.0") {
		creer_base();
                $champs = publicaciones_declarer_champs_extras();
                installer_champs_extras($champs, $nom_meta_base_version, $version_cible);
		ecrire_meta($nom_meta_base_version, $current_version=$version_cible);
	}
        if (version_compare($current_version,"0.1.2","<")){
		creer_base();
                $champs = publicaciones_declarer_champs_extras();
                installer_champs_extras($champs, $nom_meta_base_version, $version_cible);
                ecrire_meta($nom_meta_base_version,$current_version="0.1.2");
        }
        if (version_compare($current_version,"0.1.4","<")){
		creer_base();		
                $champs = publicaciones_declarer_champs_extras();
                installer_champs_extras($champs, $nom_meta_base_version, $version_cible);
                ecrire_meta($nom_meta_base_version,$current_version="0.1.4");
        }
}
function publicaciones_vider_tables($nom_meta_base_version) {
        /* Desinstalar los campos extras en las publicaciones (expositores) */
        $champs = publicaciones_declarer_champs_extras();
        desinstaller_champs_extras($champs, $nom_meta_base_version);

	/* Borrar todas las lineas de spip_documents_liens */
        sql_delete('spip_documents_liens', 'objet='.sql_quote('publicacion'));

	/* Borrar la tabla mots_publicaciones */
	sql_drop_table("spip_mots_publicaciones");

	/* Borrar la tabla mots_publicaciones */
	sql_drop_table("spip_expositores_publicaciones");

	/* Borrar la tabla publicaciones y sacar la linea sobre la version del plugin */
	sql_drop_table("spip_publicaciones");
	effacer_meta($nom_meta_base_version);
}
?>
