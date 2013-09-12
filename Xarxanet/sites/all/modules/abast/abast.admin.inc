<?php
// $Id$
/**
* @file
* Administration page callbacks for the abast module.
*/
/**
* Form builder. Configure annotations.
*
* @ingroup forms
* @see system_settings_form().
*/
function abast_conf_form() {
	
	$form['abast_server'] = array(
		'#type' => 'textfield',
		'#title' => t(utf8_encode('Servidor de connexió')),		
		'#default_value' => variable_get('abast_server', ''),
	);
	$form['abast_server_user'] = array(
		'#type' => 'textfield',
		'#title' => t('Usuari de la BD'),		
		'#default_value' => variable_get('abast_server_user', ''),
	);
	$form['abast_server_password'] = array(
		'#type' => 'password',
		'#title' => t('Password de la BD'),		
		'#default_value' => variable_get('abast_server_password', ''),
	);
	$form['abast_server_db'] = array(
		'#type' => 'textfield',
		'#title' => t('Nom de la DB'),		
		'#default_value' => variable_get('abast_server_db', ''),
	);

	return system_settings_form($form);
}