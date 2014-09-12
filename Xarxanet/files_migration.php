<?php 

/*
 * Actualitza la taula file_managed amb alguns fitxers que no s'han migrat correctament
 * Falta actualitzar la taula file_usage que recull en quins nodes s'ha utilitzat cada fitxer 
 */

define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$results = db_query("SELECT * FROM {files} WHERE fid NOT IN (SELECT fid FROM {file_managed})");
$i = 0;
foreach ($results as $result) {
	$uri = explode('/', $result->filepath);
	$uri = "public://".end($uri);
	$check = db_query("SELECT * FROM {file_managed} WHERE uri = '{$uri}'");
	if ($check->rowCount() == 0) {
		$query = "INSERT INTO {file_managed} VALUES ({$result->fid}, {$result->uid}, '{$result->filename}', '{$uri}', '{$result->filemime}', {$result->filesize}, {$result->status}, {$result->timestamp})";
		db_query($query); 
		$i++;
	}
	echo $query.'<br/>';
}
echo 'files --> file_managed: '.$i;

?>