<?php

/**
 * @file
 * Views integration for Most Shared AddThis Item tables.
 *
 * @see http://drupal.org/project/views
 */

/**
 * Implements hook_views_data()
 */
function mostshared_AddThis_views_data() {
  $data = array();

  $data['mostshared_AddThis_item'] = array(
    'table' => array(
      'base' => array(
        'field' => 'entity_id',
        'title' => t('Most Shared AddThis'),
        'help' => t('Most Shared AddThis module table holding shared counts.'),
      ),
      'group' => 'Most Shared AddThis',
    ),
    'entity_id' => array(
      'title' => 'Node ID',
      'help' => t('Node IDs'),
      'field' => array(
        'handler' => 'views_handler_field_numeric',
        'click sortable' => FALSE,
      ),
    ),
    'title' => array(
      'title' => 'Title',
      'help' => t('Titol del Node'),
      'field' => array(
        'handler' => 'views_handler_field',
        'click sortable' => FALSE,
      ),
    ),
    'count' => array(
      'title' => 'Total Share',
      'help' => t('Total pageview counts'),
      'field' => array(
        'handler' => 'views_handler_field_numeric',
        'click sortable' => FALSE,
      ),
      'filter' => array(
        'handler' => 'views_handler_filter_numeric',
      ),
      'sort' => array(
        'handler' => 'views_handler_sort',
      ),
    ),
  );

  $data['mostshared_AddThis_item']['table']['join'] = array(
    'node' => array(
      'left_field' => 'entity_id',
      'field' => 'nid',
    ),
  );
  
  return $data;
}