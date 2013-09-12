<?php

/**
 * Implementation of hook_content_default_fields().
 */
function rss_portals_xarxanet_content_default_fields() {
  module_load_include('inc', 'rss_portals_xarxanet', 'rss_portals_xarxanet.defaults');
  $args = func_get_args();
  return call_user_func_array('_rss_portals_xarxanet_content_default_fields', $args);
}

/**
 * Implementation of hook_ctools_plugin_api().
 */
function rss_portals_xarxanet_ctools_plugin_api() {
  module_load_include('inc', 'rss_portals_xarxanet', 'rss_portals_xarxanet.defaults');
  $args = func_get_args();
  return call_user_func_array('_rss_portals_xarxanet_ctools_plugin_api', $args);
}

/**
 * Implementation of hook_feeds_importer_default().
 */
function rss_portals_xarxanet_feeds_importer_default() {
  module_load_include('inc', 'rss_portals_xarxanet', 'rss_portals_xarxanet.defaults');
  $args = func_get_args();
  return call_user_func_array('_rss_portals_xarxanet_feeds_importer_default', $args);
}

/**
 * Implementation of hook_imagecache_default_presets().
 */
function rss_portals_xarxanet_imagecache_default_presets() {
  module_load_include('inc', 'rss_portals_xarxanet', 'rss_portals_xarxanet.defaults');
  $args = func_get_args();
  return call_user_func_array('_rss_portals_xarxanet_imagecache_default_presets', $args);
}

/**
 * Implementation of hook_node_info().
 */
function rss_portals_xarxanet_node_info() {
  module_load_include('inc', 'rss_portals_xarxanet', 'rss_portals_xarxanet.features.node');
  $args = func_get_args();
  return call_user_func_array('_rss_portals_xarxanet_node_info', $args);
}

/**
 * Implementation of hook_user_default_permissions().
 */
function rss_portals_xarxanet_user_default_permissions() {
  module_load_include('inc', 'rss_portals_xarxanet', 'rss_portals_xarxanet.defaults');
  $args = func_get_args();
  return call_user_func_array('_rss_portals_xarxanet_user_default_permissions', $args);
}

/**
 * Implementation of hook_views_default_views().
 */
function rss_portals_xarxanet_views_default_views() {
  module_load_include('inc', 'rss_portals_xarxanet', 'rss_portals_xarxanet.features.views');
  $args = func_get_args();
  return call_user_func_array('_rss_portals_xarxanet_views_default_views', $args);
}
