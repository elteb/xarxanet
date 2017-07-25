<?php
/**
 * @file
 * Theme functions
 */

// Include all files from the includes directory.
$includes_path = dirname(__FILE__) . '/includes/*.inc';
foreach (glob($includes_path) as $filename) {
  require_once dirname(__FILE__) . '/includes/' . basename($filename);
}

/**
 * Implements template_preprocess_page().
 */
function xn17_preprocess_page(&$variables) {
  // Add copyright to theme.
  if ($copyright = theme_get_setting('copyright')) {
    $variables['copyright'] = check_markup($copyright['value'], $copyright['format']);
  }

  // Add secondary menu
  $variables['secondary_menu'] = _radix_dropdown_menu_tree(variable_get('menu_secondary_links_source', 'user-menu'));

  theme_get_setting('toggle_secondary_menu') ? menu_secondary_menu() : array();
}
