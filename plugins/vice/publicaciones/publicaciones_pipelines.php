<?php
function publicaciones_objets_extensibles($objets){
	return array_merge($objets, array('publicacion' => _T('publicaciones:publicaciones')));
}
// Anadimos la posibilidad de hacer busquedas sobre los campos
// OjO: hay un bug en SPIP: no utiliza los "surnoms", asi que tenemos que poner
//      publicacione, en vez de publicacion...
function publicaciones_rechercher_liste_des_champs($tables){
        $tables['publicacione']['titulo'] = 8;
        $tables['publicacione']['descripcion'] = 5;
        $tables['publicacione']['ano'] = 3;
        $tables['publicacione']['editorial'] = 3;
        return $tables;
}
/*function publicaciones_rechercher_liste_des_jointures($tables){
	$tables['publicacione']['editoriale']['nombre'] = 3;
	$tables['publicacione']['editoriale']['apellido'] = 3;
	// retourner l'ensemble
	return $tables;
}*/
?>
