<?php

/**
 * Helper to implementation of hook_node_info().
 */
function _rss_portals_xarxanet_node_info() {
	$items = array (
			'feed_ambiental' => array (
					'name' => t ( 'Feed Ambiental' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_comunitari' => array (
					'name' => t ( 'Feed Comunitari' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_cultural' => array (
					'name' => t ( 'Feed Cultural' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_economic' => array (
					'name' => t ( 'Feed Econòmic' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_formacio' => array (
					'name' => t ( 'Feed Formacio' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_informatic' => array (
					'name' => t ( 'Feed Informàtic' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_internacional' => array (
					'name' => t ( 'Feed Internacional' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_juridic' => array (
					'name' => t ( 'Feed Juridic' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_portada' => array (
					'name' => t ( 'Feed Portada' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_projectes' => array (
					'name' => t ( 'Feed Projectes' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'feed_social' => array (
					'name' => t ( 'Feed Social' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '0',
					'body_label' => '',
					'min_word_count' => '0',
					'help' => '' 
			),
			'node_feeder' => array (
					'name' => t ( 'Node feeder' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '1',
					'body_label' => t ( 'Cos' ),
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			),
			'portada_node_feeder' => array (
					'name' => t ( 'Portada Node Feeder' ),
					'module' => 'features',
					'description' => '',
					'has_title' => '1',
					'title_label' => t ( 'Títol' ),
					'has_body' => '1',
					'body_label' => t ( 'Cos' ),
					'min_word_count' => '0',
					'help' => t ( '<br />
' ) 
			) 
	);
	return $items;
}
