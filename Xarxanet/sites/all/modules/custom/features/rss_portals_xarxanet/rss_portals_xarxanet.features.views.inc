<?php

/**
 * Helper to implementation of hook_views_default_views().
 */
function _rss_portals_xarxanet_views_default_views() {
	$views = array ();
	
	// Exported view: agregadors_rss
	$view = new view ();
	$view->name = 'agregadors_rss';
	$view->description = '';
	$view->tag = '';
	$view->view_php = '';
	$view->base_table = 'node';
	$view->is_cacheable = FALSE;
	$view->api_version = 2;
	$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */
	$handler = $view->new_display ( 'default', 'Defaults', 'default' );
	$handler->override_option ( 'fields', array (
			'url' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'display_as_link' => 1,
					'exclude' => 1,
					'id' => 'url',
					'table' => 'feeds_node_item',
					'field' => 'url',
					'relationship' => 'none' 
			),
			'field_imatge_feed_fid' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'link_to_node' => 0,
					'label_type' => 'none',
					'format' => 'imatge_feed_item_default',
					'multiple' => array (
							'group' => TRUE,
							'multiple_number' => '',
							'multiple_from' => '',
							'multiple_reversed' => FALSE 
					),
					'exclude' => 0,
					'id' => 'field_imatge_feed_fid',
					'table' => 'node_data_field_imatge_feed',
					'field' => 'field_imatge_feed_fid',
					'relationship' => 'none' 
			),
			'title' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 1,
							'path' => '[url]',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'link_to_node' => 0,
					'exclude' => 0,
					'id' => 'title',
					'table' => 'node',
					'field' => 'title',
					'relationship' => 'none' 
			),
			'created' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'date_format' => 'small',
					'custom_date_format' => '',
					'exclude' => 0,
					'id' => 'created',
					'table' => 'node',
					'field' => 'created',
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'sorts', array (
			'created' => array (
					'order' => 'DESC',
					'granularity' => 'second',
					'id' => 'created',
					'table' => 'node',
					'field' => 'created',
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'access', array (
			'type' => 'none' 
	) );
	$handler->override_option ( 'cache', array (
			'type' => 'none' 
	) );
	$handler->override_option ( 'header', '<h2 class="title"><div class="titol-rss">Notícies relacionades</div><div class="imatge-rss"></div></h2>' );
	$handler->override_option ( 'header_format', '2' );
	$handler->override_option ( 'header_empty', 1 );
	$handler = $view->new_display ( 'block', 'Feeds Ambientals', 'block_1' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6850' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Comunitari', 'block_2' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6851' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Cultural', 'block_3' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6852' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Internacional', 'block_4' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6853' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Social', 'block_5' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6854' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Economic', 'block_6' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6855' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Formacio', 'block_7' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6856' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Informatic', 'block_8' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6857' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Juridic', 'block_10' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6858' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Projectes', 'block_11' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'node_feeder' => 'node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6859' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'block', 'Feeds Portada', 'block_9' );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'portada_node_feeder' => 'portada_node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none',
					'override' => array (
							'button' => 'Use default' 
					) 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6860' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'block_description', '' );
	$handler->override_option ( 'block_caching', - 1 );
	$handler = $view->new_display ( 'page', 'Pàgina Feeds Portada', 'page_1' );
	$handler->override_option ( 'fields', array (
			'url' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'display_as_link' => 1,
					'exclude' => 1,
					'id' => 'url',
					'table' => 'feeds_node_item',
					'field' => 'url',
					'relationship' => 'none' 
			),
			'field_imatge_feed_fid' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'link_to_node' => 0,
					'label_type' => 'none',
					'format' => 'imatge_feed_item_default',
					'multiple' => array (
							'group' => TRUE,
							'multiple_number' => '',
							'multiple_from' => '',
							'multiple_reversed' => FALSE 
					),
					'exclude' => 0,
					'id' => 'field_imatge_feed_fid',
					'table' => 'node_data_field_imatge_feed',
					'field' => 'field_imatge_feed_fid',
					'relationship' => 'none',
					'override' => array (
							'button' => 'Use default' 
					) 
			),
			'title' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 1,
							'path' => '[url]',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'link_to_node' => 0,
					'exclude' => 0,
					'id' => 'title',
					'table' => 'node',
					'field' => 'title',
					'relationship' => 'none' 
			),
			'created' => array (
					'label' => '',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'date_format' => 'small',
					'custom_date_format' => '',
					'exclude' => 0,
					'id' => 'created',
					'table' => 'node',
					'field' => 'created',
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'portada_node_feeder' => 'portada_node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none',
					'override' => array (
							'button' => 'Use default' 
					) 
			),
			'status' => array (
					'operator' => '=',
					'value' => '1',
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'status',
					'table' => 'node',
					'field' => 'status',
					'relationship' => 'none' 
			),
			'uid' => array (
					'operator' => 'in',
					'value' => array (
							'0' => '6860' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'uid',
					'table' => 'users',
					'field' => 'uid',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'header', '<h2 class="title"><div class="titol-rss">Notícies exteriors</div><div class="imatge-rss"></div></h2>' );
	$handler->override_option ( 'path', 'feeds_portada' );
	$handler->override_option ( 'menu', array (
			'type' => 'none',
			'title' => '',
			'description' => '',
			'weight' => 0,
			'name' => 'navigation' 
	) );
	$handler->override_option ( 'tab_options', array (
			'type' => 'none',
			'title' => '',
			'description' => '',
			'weight' => 0,
			'name' => 'navigation' 
	) );
	
	$views [$view->name] = $view;
	
	// Exported view: rss_portada_publicats
	$view = new view ();
	$view->name = 'rss_portada_publicats';
	$view->description = '';
	$view->tag = '';
	$view->view_php = '';
	$view->base_table = 'node';
	$view->is_cacheable = FALSE;
	$view->api_version = 2;
	$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */
	$handler = $view->new_display ( 'default', 'Defaults', 'default' );
	$handler->override_option ( 'fields', array (
			'title' => array (
					'label' => 'Títol',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'link_to_node' => 0,
					'exclude' => 0,
					'id' => 'title',
					'table' => 'node',
					'field' => 'title',
					'relationship' => 'none' 
			),
			'url' => array (
					'label' => 'URL',
					'alter' => array (
							'alter_text' => 1,
							'text' => '<a href="[url]">Link de l\'item</a>',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '100',
							'word_boundary' => 0,
							'ellipsis' => 1,
							'html' => 1,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'display_as_link' => 0,
					'exclude' => 0,
					'id' => 'url',
					'table' => 'feeds_node_item',
					'field' => 'url',
					'relationship' => 'none',
					'override' => array (
							'button' => 'Override' 
					) 
			),
			'publishcontent' => array (
					'label' => 'Publicar',
					'alter' => array (
							'alter_text' => 0,
							'text' => '',
							'make_link' => 0,
							'path' => '',
							'link_class' => '',
							'alt' => '',
							'prefix' => '',
							'suffix' => '',
							'target' => '',
							'help' => '',
							'trim' => 0,
							'max_length' => '',
							'word_boundary' => 1,
							'ellipsis' => 1,
							'html' => 0,
							'strip_tags' => 0 
					),
					'empty' => '',
					'hide_empty' => 0,
					'empty_zero' => 0,
					'unpublish' => '',
					'publish' => '',
					'exclude' => 0,
					'id' => 'publishcontent',
					'table' => 'node',
					'field' => 'publishcontent',
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'filters', array (
			'type' => array (
					'operator' => 'in',
					'value' => array (
							'portada_node_feeder' => 'portada_node_feeder' 
					),
					'group' => '0',
					'exposed' => FALSE,
					'expose' => array (
							'operator' => FALSE,
							'label' => '' 
					),
					'id' => 'type',
					'table' => 'node',
					'field' => 'type',
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'access', array (
			'type' => 'none' 
	) );
	$handler->override_option ( 'cache', array (
			'type' => 'none' 
	) );
	$handler->override_option ( 'use_pager', '1' );
	$handler->override_option ( 'style_plugin', 'table' );
	$handler->override_option ( 'style_options', array (
			'grouping' => '',
			'override' => 1,
			'sticky' => 0,
			'order' => 'asc',
			'columns' => array (
					'title' => 'title',
					'url' => 'url',
					'publishcontent' => 'publishcontent' 
			),
			'info' => array (
					'title' => array (
							'sortable' => 0,
							'separator' => '' 
					),
					'url' => array (
							'sortable' => 0,
							'separator' => '' 
					),
					'publishcontent' => array (
							'separator' => '' 
					) 
			),
			'default' => '-1' 
	) );
	$handler = $view->new_display ( 'page', 'Pàgina', 'page_1' );
	$handler->override_option ( 'sorts', array (
			'created' => array (
					'order' => 'DESC',
					'granularity' => 'second',
					'id' => 'created',
					'table' => 'node',
					'field' => 'created',
					'override' => array (
							'button' => 'Use default' 
					),
					'relationship' => 'none' 
			) 
	) );
	$handler->override_option ( 'path', 'publicar_rss_portada' );
	$handler->override_option ( 'menu', array (
			'type' => 'none',
			'title' => '',
			'description' => '',
			'weight' => 0,
			'name' => 'navigation' 
	) );
	$handler->override_option ( 'tab_options', array (
			'type' => 'none',
			'title' => '',
			'description' => '',
			'weight' => 0,
			'name' => 'navigation' 
	) );
	
	$views [$view->name] = $view;
	
	return $views;
}
