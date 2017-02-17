<?php 

define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$action_id = 18819;
$nid = 113658;
$node = node_load($nid);
$context = array(
				'tid' => 13529,
				'ftp_server' => '85.31.129.171',
				'ftp_user' => 'voluntariat',
				'ftp_pass' => 'w5gpCcL3'		
			);
			
$result = actions_do($action_id, $node, $context);
print_r($result);

?>