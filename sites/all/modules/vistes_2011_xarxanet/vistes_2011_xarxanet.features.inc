<?php

/**
 * Implementation of hook_ctools_plugin_api().
 */
function vistes_2011_xarxanet_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "context" && $api == "context") {
    return array("version" => 3);
  }
}

/**
 * Implementation of hook_imagecache_default_presets().
 */
function vistes_2011_xarxanet_imagecache_default_presets() {
  $items = array(
    'imatge-article' => array(
      'presetname' => 'imatge-article',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale',
          'data' => array(
            'width' => '277',
            'height' => '',
            'upscale' => 1,
          ),
        ),
      ),
    ),
    'tag-gran' => array(
      'presetname' => 'tag-gran',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale_and_crop',
          'data' => array(
            'width' => '770',
            'height' => '210',
          ),
        ),
      ),
    ),
    'tag-mig' => array(
      'presetname' => 'tag-mig',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale_and_crop',
          'data' => array(
            'width' => '377',
            'height' => '140',
          ),
        ),
      ),
    ),
    'tag-petit' => array(
      'presetname' => 'tag-petit',
      'actions' => array(
        '0' => array(
          'weight' => '0',
          'module' => 'imagecache',
          'action' => 'imagecache_scale_and_crop',
          'data' => array(
            'width' => '179',
            'height' => '140',
          ),
        ),
      ),
    ),
  );
  return $items;
}

/**
 * Implementation of hook_views_api().
 */
function vistes_2011_xarxanet_views_api() {
  return array(
    'api' => '2',
  );
}
