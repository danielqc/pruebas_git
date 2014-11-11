<?php
function editoriales_objets_extensibles($objets){
	return array_merge($objets, array('editorial' => _T('editoriales:editoriales')));
}
// Anadimos la posibilidad de hacer busquedas sobre los campos
// OjO: hay un bug en SPIP: no utiliza los "surnoms", asi que tenemos que poner
//      editoriale, en vez de editorial...
function editoriales_rechercher_liste_des_champs($tables){
        $tables['editoriale']['nombre'] = 8;
        $tables['editoriale']['lugar'] = 5;
        return $tables;
}
?>
