<?php
// $Id: template.php,v 1.44.2.6 2009/02/13 19:02:49 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the xarxanet theme.
 *
 * IMPORTANT WARNING: DO NOT MODIFY THIS FILE.
 *
 * The xarxanet xarxanet theme is designed to be easily extended by its sub-themes. You
 * shouldn't modify this or any of the CSS or PHP files in the root xarxanet/ folder.
 * See the online documentation for more information:
 *   http://drupal.org/node/193318
 */

// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('xarxanet_rebuild_registry')) {
  drupal_rebuild_theme_registry();
}

/*
 * Add stylesheets only needed when xarxanet is the active theme. Don't do something
 * this dumb in your sub-theme; see how wireframes.css is handled instead.
 */
if ($GLOBALS['theme'] == 'xarxanet') { // If we're in the main theme
  if (theme_get_setting('xarxanet_layout') == 'border-politics-fixed') {
    drupal_add_css(drupal_get_path('theme', 'xarxanet') . '/layout-fixed.css', 'theme', 'all');
  }
  else {
    drupal_add_css(drupal_get_path('theme', 'xarxanet') . '/layout-liquid.css', 'theme', 'all');
  }
}

/**
 * Implements HOOK_theme().
 */
function xarxanet_theme(&$existing, $type, $theme, $path) {
  if (!db_is_active()) {
    return array();
  }
  include_once './' . drupal_get_path('theme', 'xarxanet') . '/template.theme-registry.inc';
  return _xarxanet_theme($existing, $type, $theme, $path);
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function xarxanet_breadcrumb($breadcrumb) {
  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('xarxanet_breadcrumb');
  if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {

    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('xarxanet_breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }

    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $breadcrumb_separator = theme_get_setting('xarxanet_breadcrumb_separator');
      $trailing_separator = $title = '';
      if (theme_get_setting('xarxanet_breadcrumb_title')) {
        $trailing_separator = $breadcrumb_separator;
        $title = menu_get_active_title();
      }
      elseif (theme_get_setting('xarxanet_breadcrumb_trailing')) {
        $trailing_separator = $breadcrumb_separator;
      }
      return '<div class="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb) . "$trailing_separator$title</div>";
    }
  }
  // Otherwise, return an empty string.
  return '';
}

/**
 * Implements theme_menu_item_link()
 */
function xarxanet_menu_item_link($link) {
  if (empty($link['localized_options'])) {
    $link['localized_options'] = array();
  }

  // If an item is a LOCAL TASK, render it as a tab
  if ($link['type'] & MENU_IS_LOCAL_TASK) {
    $link['title'] = '<span class="tab">' . check_plain($link['title']) . '</span>';
    $link['localized_options']['html'] = TRUE;
  }

  return l($link['title'], $link['href'], $link['localized_options']);
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clear-block to tabs.
 */
function xarxanet_menu_local_tasks() {
  $output = '';

  if ($primary = menu_primary_local_tasks()) {
    $output .= '<ul class="tabs primary clear-block">' . $primary . '</ul>';
  }
  if ($secondary = menu_secondary_local_tasks()) {
    $output .= '<ul class="tabs secondary clear-block">' . $secondary . '</ul>';
  }

  return $output;
}


/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function xarxanet_preprocess_page(&$vars, $hook) {
  // Add conditional stylesheets.
  if (!module_exists('conditional_styles')) {
    $vars['styles'] .= $vars['conditional_styles'] = variable_get('conditional_styles_' . $GLOBALS['theme'], '');
  }

  // Classes for body element. Allows advanced theming xarxanetd on context
  // (home page, node of certain type, etc.)
  $classes = split(' ', $vars['body_classes']);
  // Remove the mostly useless page-ARG0 class.
  if ($index = array_search(preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-_]+!s', '', 'page-'. drupal_strtolower(arg(0))), $classes)) {
    unset($classes[$index]);
  }
  if (!$vars['is_front']) {
    // Add unique class for each page.
    $path = drupal_get_path_alias($_GET['q']);
    $classes[] = xarxanet_id_safe('page-' . $path);
    // Add unique class for each website section.
    list($section, ) = explode('/', $path, 2);
    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        $section = 'node-add';
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        $section = 'node-' . arg(2);
      }
    }
    $classes[] = xarxanet_id_safe('section-' . $section);
  }
  if (theme_get_setting('xarxanet_wireframes')) {
    $classes[] = 'with-wireframes'; // Optionally add the wireframes style.
  }
  $vars['body_classes_array'] = $classes;
  $vars['body_classes'] = implode(' ', $classes); // Concatenate with spaces.
  
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function xarxanet_preprocess_node(&$vars, $hook) {
  // Special classes for nodes
  $classes = array('node');
  if ($vars['sticky']) {
    $classes[] = 'sticky';
  }
  if (!$vars['status']) {
    $classes[] = 'node-unpublished';
    $vars['unpublished'] = TRUE;
  }
  else {
    $vars['unpublished'] = FALSE;
  }
  if ($vars['uid'] && $vars['uid'] == $GLOBALS['user']->uid) {
    $classes[] = 'node-mine'; // Node is authored by current user.
  }
  if ($vars['teaser']) {
    $classes[] = 'node-teaser'; // Node is displayed as teaser.
  }
  // Class for node type: "node-type-page", "node-type-story", "node-type-my-custom-type", etc.
  $classes[] = xarxanet_id_safe('node-type-' . $vars['type']);
  $vars['classes'] = implode(' ', $classes); // Concatenate with spaces
}

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
function xarxanet_preprocess_comment(&$vars, $hook) {
  include_once './' . drupal_get_path('theme', 'xarxanet') . '/template.comment.inc';
  _xarxanet_preprocess_comment($vars, $hook);
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function xarxanet_preprocess_block(&$vars, $hook) {
  $block = $vars['block'];

  // Special classes for blocks.
  $classes = array('block');
  $classes[] = 'block-' . $block->module;
  $classes[] = 'region-' . $vars['block_zebra'];
  $classes[] = $vars['zebra'];
  $classes[] = 'region-count-' . $vars['block_id'];
  $classes[] = 'count-' . $vars['id'];

  $vars['edit_links_array'] = array();
  $vars['edit_links'] = '';
  if (theme_get_setting('xarxanet_block_editing') && user_access('administer blocks')) {
    include_once './' . drupal_get_path('theme', 'xarxanet') . '/template.block-editing.inc';
    xarxanet_preprocess_block_editing($vars, $hook);
    $classes[] = 'with-block-editing';
  }

  // Render block classes.
  $vars['classes'] = implode(' ', $classes);
}

/**
 * Converts a string to a suitable html ID attribute.
 *
 * http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 * valid ID attribute in HTML. This function:
 *
 * - Ensure an ID starts with an alpha character by optionally adding an 'id'.
 * - Replaces any character except alphanumeric characters with dashes.
 * - Converts entire string to lowercase.
 *
 * @param $string
 *   The string
 * @return
 *   The converted string
 */
function xarxanet_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $string));
  // If the first character is not a-z, add 'id' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id' . $string;
  }
  return $string;
}

function phptemplate_preprocess_page(&$vars) {
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $suggestions = array();
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
        $suggestions[] = $template_filename;
      }
      $vars['template_files'] = array_merge((array) $suggestions, $vars['template_files']);
    }
  }
  if ($vars['node']->type != "") {
    $vars['template_files'][] = "page-node-" . $vars['node']->type;
  }
  
}

function phptemplate_preprocess_node(&$vars) {
  if (arg(0) == 'taxonomy') {
	$aux = 'node-taxonomy-'.$vars['type'];
    $suggestions = array(
      'node-taxonomy',$aux
    );
    $vars['template_files'] = array_merge($vars['template_files'], $suggestions);
  }elseif (arg(0) == 'rss') {
  dasdasdsad();
  }
  if($vars['type'] == 'portada_butlleti'){
  
    $node_aux = node_load($vars['field_butlleti_noticia_destacada'][0]['nid'],NULL,TRUE);
    
    $vars['page'] = TRUE;
    
    /*** CAMPS DE NOTICIA DESTACADA***/
    $vars['titol_noticia_destacada'] = xarxanet_clean_text_butlleti($node_aux->title);
    $vars['link_noticia_destacada'] = url($node_aux->path,array('absolute'=>TRUE));
    $vars['foto_noticia_destacada'] = url($vars['field_butlleti_imatge_noticia'][0]['filepath'],array('absolute'=>TRUE));
    $vars['resum_noticia_destacada'] =  xarxanet_clean_text_butlleti(str_replace("<a","<a style=\"text-decoration: none; color: #0D75EB;\"",strip_tags(str_replace("<p>&nbsp;</p>","",$node_aux->field_resum[0]['value']),"<a>")));
    
    /*** INICI DE CAMPS DE RECULL DE NOTICIES ***/
    $node_aux = node_load($vars['field_recull_noticies1'][0]['nid'],NULL,TRUE);
    $vars['titol_recull_noticia1'] = xarxanet_clean_text_butlleti($node_aux->title);
    $vars['link_recull_noticia1'] = url($node_aux->path,array('absolute'=>TRUE));
    $vars['foto_recull_noticia1'] = url($node_aux->field_imatge_petita[0]['filepath'],array('absolute'=>TRUE));
    $vars['resum_recull_noticia1'] = xarxanet_clean_text_butlleti(str_replace("<a","<a style=\"text-decoration: none; color: #0D75EB;\"",strip_tags(str_replace("<p>&nbsp;</p>","",$node_aux->field_resum[0]['value']),"<a>")));
    
    $node_aux = node_load($vars['field_recull_noticies2'][0]['nid'],NULL,TRUE);
    $vars['titol_recull_noticia2'] = xarxanet_clean_text_butlleti($node_aux->title);
    $vars['link_recull_noticia2'] = url($node_aux->path,array('absolute'=>TRUE));
    $vars['foto_recull_noticia2'] = url($node_aux->field_imatge_petita[0]['filepath'],array('absolute'=>TRUE));
    $vars['resum_recull_noticia2'] = xarxanet_clean_text_butlleti(str_replace("<a","<a style=\"text-decoration: none; color: #0D75EB;\"",strip_tags(str_replace("<p>&nbsp;</p>","",$node_aux->field_resum[0]['value']),"<a>")));
    
    $node_aux = node_load($vars['field_recull_noticies3'][0]['nid'],NULL,TRUE);
    $vars['titol_recull_noticia3'] = xarxanet_clean_text_butlleti($node_aux->title);
    $vars['link_recull_noticia3'] = url($node_aux->path,array('absolute'=>TRUE));
    $vars['foto_recull_noticia3'] = url($node_aux->field_imatge_petita[0]['filepath'],array('absolute'=>TRUE));
    $vars['resum_recull_noticia3'] = xarxanet_clean_text_butlleti(str_replace("<a","<a style=\"text-decoration: none; color: #0D75EB;\"",strip_tags(str_replace("<p>&nbsp;</p>","",$node_aux->field_resum[0]['value']),"<a>")));
    
    
    $node_aux = node_load($vars['field_recull_noticies4'][0]['nid'],NULL,TRUE);
    $vars['titol_recull_noticia4'] = xarxanet_clean_text_butlleti($node_aux->title);
    $vars['link_recull_noticia4'] = url($node_aux->path,array('absolute'=>TRUE));
    $vars['foto_recull_noticia4'] = url($node_aux->field_imatge_petita[0]['filepath'],array('absolute'=>TRUE));
    $vars['resum_recull_noticia4'] = xarxanet_clean_text_butlleti(str_replace("<a","<a style=\"text-decoration: none; color: #0D75EB;\"",strip_tags(str_replace("<p>&nbsp;</p>","",$node_aux->field_resum[0]['value']),"<a>")));
    /*** FINAL DE CAMPS DE RECULL DE NOTICIES ***/
    
    /*** CAMPS DE RECURS DESTACAT ***/
    $node_aux = node_load($vars['field_recurs_destacat'][0]['nid'],NULL,TRUE);
    $vars['titol_recurs_destacat'] = xarxanet_clean_text_butlleti($node_aux->title);
    $vars['link_recurs_destacat'] = url($node_aux->path,array('absolute'=>TRUE));
    $vars['foto_recurs_destacat'] = url($vars['field_butlleti_imatge_recurs'][0]['filepath'],array('absolute'=>TRUE));
    $vars['resum_recurs_destacat'] = xarxanet_clean_text_butlleti(str_replace("<a","<a style=\"text-decoration: none; color: #0D75EB;\"",strip_tags(str_replace("<p>&nbsp;</p>","",$node_aux->field_resum[0]['value']),"<a>")));
    
    $node_aux = node_load($vars['field_recurs_destacat2'][0]['nid'],NULL,TRUE);
    $vars['titol_recurs_destacat2'] = xarxanet_clean_text_butlleti($node_aux->title);
    $vars['link_recurs_destacat2'] = url($node_aux->path,array('absolute'=>TRUE));
    $vars['foto_recurs_destacat2'] = url($node_aux->field_imatge_petita[0]['filepath'],array('absolute'=>TRUE));
    $vars['resum_recurs_destacat2'] = xarxanet_clean_text_butlleti(str_replace("<a","<a style=\"text-decoration: none; color: #0D75EB;\"",strip_tags(str_replace("<p>&nbsp;</p>","",$node_aux->field_resum[0]['value']),"<a>")));
    
    /*** LINKS DEl BLOC DE XARXANET ***/
    
    if(empty($vars['node']->field_enllac_bloc[0]['title']))
      $vars['links_bloc'] = NULL;
    else
      $vars['links_bloc'] = $vars['node']->field_enllac_bloc;
    
    /*** DATA I NUMERO DE BUTLLETI ***/
    $vars['data_butlleti'] = xarxanet_format_data_butlleti($vars['node']->field_data_butlleti[0]['value']);
    $vars['num_butlleti'] = $vars['node']->field_num_butlleti[0]['view'];

  }
}

/*
* Override filter.module's theme_filter_tips() function to disable tips display.
*/
function xarxanet_filter_tips($tips, $long = FALSE, $extra = '') {
  return '';
}
function xarxanet_filter_tips_more_info () {
  return '';
}

function xarxanet_format_data_butlleti($data_butlleti){
  $data_aux = strtotime($data_butlleti);
  $num_mes = date('n',$data_aux);
  $months = date_month_names(TRUE);
  $mes = $months[$num_mes];
  $data_display = NULL;
  if($mes == 'Abril' || $mes == 'Octubre')
  {
    $data_display = date('j',$data_aux)." d'".$mes." de ".date('Y',$data_aux);
  }else{
    $data_display = date('j',$data_aux)." de ".$mes." de ".date('Y',$data_aux);
  }
  return $data_display;
}

function xarxanet_clean_text_butlleti($text){
  $text = str_replace("’","'",$text);
  $text = str_replace("&rsquo;","'",$text);
  $text = str_replace("“",'"',$text);
  $text = str_replace("”",'"',$text);
  $text = str_replace("&ldquo;",'"',$text);
  $text = str_replace("&rdquo;",'"',$text);
  return $text;
}

function xarxanet_preprocess_views_view_row_rss(&$vars) {
  $view     = &$vars['view'];
  $options  = &$vars['options'];
  $item     = &$vars['row'];
  
  if($view->name = "rss_recursos")
  {

    $result = &$vars['view']->result;
    $id = &$vars['id'];
    $node = node_load( $result[$id-1]->nid );

    for($i=0; $i < count($item->elements); $i++){

      if ($item->elements[$i]['key'] == 'dc:creator'){
          $item->elements[$i]['value'] = $node->field_autor[0]['value'];
          //$item->elements[$i]['value'] = "Test Xarxanet";
        }
      }

    $vars['item_elements'] = empty($item->elements) ? '' : format_xml_elements($item->elements);
  }
}

function strip_selected_tags_by_id_or_class($array_of_id_or_class, $text)
{
  $doc = new DOMDocument();
  $doc->validateOnParse = true;
  $isload = $doc->loadHTML(utf8_decode($text));
  if(!$isload){
    print "¡Oh Snap!";
  }

  //Get your p element
  $p = $doc->getElementsByTagName ('div');
  $nodeListLength = $p->length; // this value will also change
   for ($i = 0; $i < $nodeListLength; $i ++)
   {
      $divaux = $p->item($i);
      
      if(!empty($divaux) && $divaux->hasAttributes()){
       if($divaux->getAttribute('id') == 'social-links'){
          $divaux->parentNode->RemoveChild($divaux);
        }elseif($divaux->getAttribute('class') == 'e_share'){
          $divaux->parentNode->RemoveChild($divaux);
        }elseif($divaux->getAttribute('class') == 'e_tags'){
          $divaux->parentNode->RemoveChild($divaux);
        }
      }
      // some code to change the tag name from "oldtag" to something else
      // e.g. encrypting a tag element
   }
   
   $q = $doc->getElementsByTagName('iframe');
   $nodeListLength2 = $q->length;
   for ($j = 0; $j < $nodeListLength2; $j ++){
      $iframeaux = $q->item($j);
      $iframeaux->parentNode->RemoveChild($iframeaux);
   }
  //Remove the p tag from the DOM
  //$p->parentNode->removeChild($p);
  
  //Save you new DOM tree
  $doc->formatOutput = true;
  $html = str_replace("?","'",utf8_encode($doc->saveHTML()));
  $html = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">','',$html);
  $html = str_replace('<html>','',$html);
  $html = str_replace('</html>','',$html);
  $html = str_replace('<body>','',$html);
  $html = str_replace('</body>','',$html);
  
  //Delete all messages till this point.
  drupal_get_messages();

  // Restore any prior messages.
  if (isset($saved_messages)) {
    foreach ($saved_messages as $type => $types_messages) {
      foreach ($types_messages as $message) {
        drupal_set_message($message, $type);
      }
    }
  }
  
  return $html;
}