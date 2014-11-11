<?php
function proyectos_objets_extensibles($objets){
	return array_merge($objets, array('proyecto' => _T('proyectos:proyectos')));
}
// Anadimos la posibilidad de hacer busquedas sobre los campos
function proyectos_rechercher_liste_des_champs($tables){
        $tables['proyecto']['titulo'] = 8;
        $tables['proyecto']['descripcion'] = 5;
        return $tables;
}
?>
