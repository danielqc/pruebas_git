<?php
function expositores_objets_extensibles($objets){
	return array_merge($objets, array('expositor' => _T('expositores:expositores')));
}
// Anadimos la posibilidad de hacer busquedas sobre los campos
// OjO: hay un bug en SPIP: no utiliza los "surnoms", asi que tenemos que poner
//      expositore, en vez de expositor...
function expositores_rechercher_liste_des_champs($tables){
        $tables['expositore']['nombre'] = 8;
        $tables['expositore']['apellido'] = 8;
        $tables['expositore']['biografia'] = 5;
        return $tables;
}
?>
