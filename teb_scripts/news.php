<?php 

/*
 * Actualitza la taula file_managed amb alguns fitxers que no s'han migrat correctament
 * Falta actualitzar la taula file_usage que recull en quins nodes s'ha utilitzat cada fitxer 
 */

define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$transform = array(
	'noticia_ambiental' => 25373,
	'noticia_comunitari' => 25374,
	'noticia_cultural' => 25375,
	'noticia_economic' => 25382,
	'noticia_formacio' => 25381,
	'noticia_general' => 25372,
	'noticia_informatic' => 25380,
	'noticia_juridic' => 25379,
	'noticia_projectes' => 25378,
	'noticia_social' => 25376,
	'noticia_internacional_cat' => 25377
);

$results = db_query("SELECT * FROM {webform_custom_simplenews__}");
foreach ($results as $result) {
	$tids = '';
	$types = unserialize($result->custom_content);
	foreach ($types as $type) {
		$tids[] = $transform[$type];
	}
	$ser_tids = implode(',', $tids);
	/*if (!empty($tids)) {
		print_r($types);
		print_r($tids);
		print_r($ser_tids);
		die(); 
	}*/
	db_query("UPDATE {webform_custom_simplenews} SET custom_content='".$ser_tids."' WHERE snid={$result->snid} AND tid={$result->tid}");
	echo $result->snid.' UPDATED <br/>';
}

?>