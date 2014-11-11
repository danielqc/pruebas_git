<?php
function licitacion_objets_extensibles($objets){
	return array_merge($objets, array('contratacion' => _T('licitacion:contrataciones')));
}
// Anadimos la posibilidad de hacer busquedas sobre los campos de los objets del plugin
function licitacion_rechercher_liste_des_champs($tables){
	$tables['contratacion']['num_convocatoria'] = 8;
	$tables['contratacion']['concepto_convocatoria'] = 8;
	$tables['contratacion']['fecha_pub_sicoes'] = 5;
	$tables['contratacion']['fecha_pres_prop'] = 5;
	$tables['contratacion']['hora_pres_prop'] = 5;
	return $tables;
}
?>