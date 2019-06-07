<?php

/**
 * @file
 * Views integration for the addtoany_counter custom module
 * 
 * @see   https://www.sitepoint.com/exposing-tables-views-drupal-7/
 */

/**
 * Implements hook_views_data()
 */
function addtoany_counter_views_data() {

  $data = array();

  $data = array();
  
  // Putting the table into its own groups so that we can recognize in the UI
  // where it comes from

  $data['addtoany_counter']['table']['group'] = t('AddToAny');
  
  // Making the 'addtoany_counter' table a base table so a View can created based on it

  $data['addtoany_counter']['table']['base'] = array(
    'title' => t('AddToAny Counter custom table'),
    'help' => t('Contains AddToAny sharing count of nodes'),
  );  
  
  $data['addtoany_counter']['table']['join'] = array(
    'node' => array(
      'left_field' => 'nid',
      'field' => 'node_id',
    ),
  );
  
  // The ID field

  $data['addtoany_counter']['id'] = array(
    'title' => t('AddToAny sharing ID'),
    'help' => t('The record ID.'),
    'field' => array(
      'handler' => 'views_handler_field_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
  );
  
  // The Count field

  $data['addtoany_counter']['count'] = array(
    'title' => t('AddToAny sharing counter'),
    'help' => t('The times the node has been shared with AddToAny.'),
    'field' => array(
      'handler' => 'views_handler_field',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
  );
  
  // The Node ID field

  $data['addtoany_counter']['node_id'] = array(
    'title' => t('AddToAny sharing Node ID'),
    'help' => t('The nid of the node that has been shared with AddToAny.'),
    'field' => array(
      'handler' => 'views_handler_field_node',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'relationship' => array(
      'base' => 'node',
      'field' => 'node_id',
      'handler' => 'views_handler_relationship',
      'label' => t('Node'),
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_node_nid',
      'numeric' => TRUE,
      'validate type' => 'nid',
    ),
  );
  
  return $data;
}
