<?php

// codigo solo en caso de que el plugin "ChampsExtras" sea instalado
if (include_spip('inc/cextras_autoriser')) {
    // restringimos el uso del campo extra "expositores", para los articulos, al sector (seccion de primer nivel) numero 2,
    // i.e. los seminarios. 
    // para la ayuda, ver http://www.spip-contrib.net/Champs-Extras-2
    restreindre_extras('article', 'expositores', 2, 'secteur');
    // restringimos el uso del campo extra "fuente", para los articulos, al sector (seccion de primer nivel) numero 1,
    // i.e. las noticias. 
    restreindre_extras('article', 'fuente', 1, 'secteur');
    // restringimos el uso del campo extra "lugar", para los articulos, al sector (seccion de primer nivel) numero 1,
    // i.e. las noticias. 
    restreindre_extras('article', 'lugar', 1, 'secteur');
}

// dar la fecha del dia n de la semana que contiene $date, con n entre 1 y 7
function dia_de_la_semana($fecha, $n) {
   // poner n entre 1 y 7
   $n = fmod($n - 1, 7) + 1;
   // calculo de la fecha del dia n
   $fecha = strtotime($fecha);
   return date('Y-m-d',$fecha + (24*3600*($n-date('N',$fecha))));
}
// primer dia de la semana (el lunes)
function inicio_semana($fecha) {
   return dia_de_la_semana($fecha, 1);
}
// ultimo dia de la semana (el domingo)
function fin_semana($fecha) {
   return dia_de_la_semana($fecha, 7);
}
// todos los dias de la semana en una array, desde el lunes hasta el domingo
function lista_dias_semana($fecha) {
   $lista = array();
   for ($idx = 1; $idx <= 7; $idx++) {
      $lista[] = dia_de_la_semana($fecha, $idx);
   }
   return $lista;
}
// dar el dia siguiente de la fecha
function dia_siguiente($fecha) {
   $fecha = strtotime($fecha);
   return date('Y-m-d',$fecha + 24*3600);
}
// dar la semana anterior de la fecha (dia - 7)
function semana_anterior($fecha) {
   $fecha = strtotime($fecha);
   return date('Y-m-d',$fecha - 7*24*3600);
}
// dar la semana siguiente de la fecha (dia + 7)
function semana_siguiente($fecha) {
   $fecha = strtotime($fecha);
   return date('Y-m-d',$fecha + 7*24*3600);
}
// dar la fecha de hoy
function balise_HOYDIA($params) {
   $params->code = "date('Y-m-d')";
   $params->type = 'php';  
   return $params;
}
// dar el numero del dia al formato 01, 02, ... 31
function numero_dia($fecha) {
   $fecha = strtotime($fecha);
   return date('d',$fecha);
}
// dar la hora al formato hh:mm
function hora_minuto($fecha) {
   $fecha = strtotime($fecha);
   return date('H:i',$fecha);
}

function balise_LOGO_dist($p) {
	$_id_article = champ_sql('id_article', $p);
	$_id_rubrique= champ_sql('id_rubrique', $p);

	$p->code = "recuperer_fond('logo',array('id_article'=>$_id_article,'id_rubrique'=>$_id_rubrique))";
	$p->interdire_scripts = false;
	return $p;
}

function youtube($id, $width=560, $height=315, $fullscreen=true)
{
	$youtube= '<iframe allowtransparency="true" scrolling="no" width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen="'.($fullscreen?'allowfullscreen':NULL).'"></iframe>';
	return $youtube;
}

function format_duration($t)
{
	$interval = new DateInterval($t);
	if ($interval->h > 0) {
		$str=$interval->format('%h:%I:%S');
	} else {
		$str=$interval->format('%I:%S');
	}
	return $str;
}

function prueba(){
	echo"mensaje de prueba";
}

?>
