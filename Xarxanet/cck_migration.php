<?php 

define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// content_field_dpp_portal --> field_data_field_dpp_portal
/*$count = 0;
$results = db_query("SELECT * FROM {content_field_dpp_portal} WHERE `field_dpp_portal_value` = 'Destacat principal portal'");
foreach ($results as $result) {
	$res = db_query("UPDATE {field_data_field_dpp_portal} SET `field_dpp_portal_value` = 1 WHERE `entity_id` = {$result->nid}");
	$count ++;
}
print 'content_field_dpp_portal --> field_data_field_dpp_portal: '.$count.'<br/>';*/


// content_field_dsp_portal --> field_data_field_dsp_portal
/*$count = 0;
$results = db_query("SELECT * FROM {content_field_dsp_portal} WHERE `field_dsp_portal_value` = 'Destacat secundari portal'");
foreach ($results as $result) {
	$res = db_query("UPDATE {field_data_field_dsp_portal} SET `field_dsp_portal_value` = 1 WHERE `entity_id` = {$result->nid}");
	$count ++;
}
print 'content_field_dsp_portal --> field_data_field_dsp_portal: '.$count.'<br/>';
*/

/* content_type_doc_biblioteca (fields) -->
	field_data_field_doc_editorial
	field_data_field_doc_tematica
	field_data_field_doc_tipologia
	field_data_field_doc_idioma
*/ 
/*
$count = 0;
$results = db_query("SELECT * FROM {content_type_doc_biblioteca}");
foreach ($results as $result) {
	$editorial_tid = $result->field_doc_editorial_value;
	$tipologia_tid = $result->field_doc_tipologia_value;
	$idioma_tid = $result->field_doc_idioma_value;	
	$nid = $result->nid;
	$vid = $result->vid;
	
	$base_array = array(
		'entity_type' => 'node',
		'bundle' => 'doc_biblioteca',
		'deleted' => 0,
		'entity_id' => $nid,
		'revision_id' => $vid, 
		'language' => 'und',
		'delta' => 0,
		'field_doc_tematica_tid' => '');
	
	
	$tematica_res = db_query("SELECT field_doc_tematica_value, delta FROM {content_field_doc_tematica} WHERE nid={$result->nid} AND vid={$result->vid}");
	while ($tematica = $tematica_res->fetchAssoc()) {
		$tematica_tid = $tematica['field_doc_tematica_value'];
		$delta = $tematica['delta'];
		
		$base_array['field_doc_tematica_tid'] = $tematica_tid;
		$base_array['delta'] = $delta;
		
		//$res = drupal_write_record('field_data_field_doc_tematica', $base_array);
		//$nid = db_insert('field_data_field_doc_tematica')->fields($base_array)->execute();
		$query = "INSERT INTO field_data_field_doc_tematica VALUES ('node', 'doc_biblioteca', 0, {$nid}, {$vid}, 'und', {$delta}, {$tematica_tid})";
		db_query($query);
	}
		
	
	if ($editorial_tid) {
		$query = "INSERT INTO field_data_field_doc_editorial VALUES ('node', 'doc_biblioteca', 0, {$nid}, {$vid}, 'und', 0, {$editorial_tid})";
		db_query($query);
	}
	
	if ($tipologia_tid) {
		$query = "INSERT INTO field_data_field_doc_tipologia VALUES ('node', 'doc_biblioteca', 0, {$nid}, {$vid}, 'und', 0, {$tipologia_tid})";
		db_query($query);
	}
	
	if ($idioma_tid) {
		$query = "INSERT INTO field_data_field_doc_idioma VALUES ('node', 'doc_biblioteca', 0, {$nid}, {$vid}, 'und', 0, {$idioma_tid})";
		db_query($query);
	}
	$count++;
}
print 'content_type_doc_biblioteca (fields): '.$count.'<br/>';
*/
?>