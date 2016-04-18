<?php
// $Id: template.php,v 1.2.2.6 2009/05/22 20:25:24 jmburnz Exp $

/**
 * @file template.php
 */

/**
 * USAGE
 * 1. Rename each function to match your subthemes name, 
 *    e.g. if you name your theme genesis_foo then the function 
 *    name will be "genesis_foo_preprocess".
 * 2. Uncomment the required fucntion to use. You can delete the
 *    "sample_variable".
 */

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered.
 */
/*
function genesis_SUBTHEME_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
*/

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered.
 */
/*
function genesis_SUBTHEME_preprocess_page(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
*/

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered.
 */
/*
function genesis_SUBTHEME_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
*/

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered.
 */
/*
function genesis_SUBTHEME_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
*/

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered.
 */
/*
function genesis_SUBTHEME_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
*/


function xarxanet_get_class($tipus)
{
  $tipusCss = $tipus;

  if($tipus == "Notícia Ambiental") $tipusCss = "ambiental";
  if($tipus == "Notícia Comunitari") $tipusCss = "comunitari";
  if($tipus == "Notícia Cultural") $tipusCss = "cultural";
  if($tipus == "Notícia Econòmic") $tipusCss = "economic";
  if($tipus == "Notícia Formació") $tipusCss = "formacio";
  if($tipus == "Notícia General") $tipusCss = "general";
  if($tipus == "Notícia Informàtic") $tipusCss = "informatic";
  if($tipus == "Notícia Internacional ANG") $tipusCss = "internacional";
  if($tipus == "Notícia Internacional CAT") $tipusCss = "internacional";
  if($tipus == "Notícia Internacional ESP") $tipusCss = "internacional";
  if($tipus == "Notícia Jurídic") $tipusCss = "juridic";
  if($tipus == "Notícia Projectes") $tipusCss = "projectes";
  if($tipus == "Notícia Social") $tipusCss = "social";

  if($tipus == "Recurs Econòmic") $tipusCss = "economic";
  if($tipus == "Recurs Formació") $tipusCss = "formacio";
  if($tipus == "Recurs General") $tipusCss = "general";
  if($tipus == "Recurs Informàtic") $tipusCss = "informatic";
  if($tipus == "Recurs Jurídic") $tipusCss = "juridic";
  if($tipus == "Recurs Projectes") $tipusCss = "projectes";

  if($tipus == "Esdeveniment") $tipusCss = "esdeveniment";

  if($tipus == "Premi") $tipusCss = "premis";
  if($tipus == "Subvenció") $tipusCss = "subvencio";
  if($tipus == "Beques") $tipusCss = "beques";
  if($tipus == "Altres") $tipusCss = "altres";



  if($tipus == "Acte") $tipusCss = "acte";
  if($tipus == "Curs") $tipusCss = "curs";

  if($tipus == "Finançament (NOU)") $tipusCss = "financament";

return $tipusCss;
}


function xarxanet_get_label($tipus,$path)
{

  $text = $tipus;

  if($tipus == "Notícia Internacional ANG") $text = "Notícia > internacional";
  if($tipus == "Notícia Internacional CAT") $text = "Notícia > internacional";
  if($tipus == "Notícia Internacional ESP") $text = "Notícia > internacional";
  
  if($tipus == "Curs") $text = "Esdeveniment > Curs";
  if($tipus == "Acte") $text = "Esdeveniment > Acte";
  if($tipus == "Esdeveniment") $text = "Agenda";

  if($tipus == "Finançament (NOU)") $text = "Finançament";
  if($tipus == "Premi") $text = "Finançament > Premi";
  if($tipus == "Subvenció") $text = "Finançament > Subvenció";
  if($tipus == "Beques") $text = "Finançament > Beques";
  if($tipus == "Altres") $text = "Finançament > Altres";
  if($tipus == "Recurs Jurídic") $text = "Recurs > Jurídic";


  if($tipus == "Notícia Ambiental") $text = "Notícia > Ambiental";
  if($tipus == "Notícia Jurídic") $text = "Notícia > Jurídic";
  if($tipus == "Notícia Ambiental") $text = "Notícia > Ambiental";
  if($tipus == "Notícia Comunitari") $text = "Notícia > Comunitari";
  if($tipus == "Notícia Cultural") $text = "Notícia > Cultural";
  if($tipus == "Notícia Econòmic") $text = "Notícia > Econòmic";
  if($tipus == "Notícia Formació") $text = "Notícia > Formació";
  if($tipus == "Notícia General") $text = "Notícia > General";
  if($tipus == "Notícia Informàtic") $text = "Notícia > Informàtic";
  if($tipus == "Notícia Projectes") $text = "Notícia > Projectes";
  if($tipus == "Notícia Social") $text = "Notícia > Social";

  if($tipus == "Recurs Econòmic") $text = "Recurs > Econòmic";
  if($tipus == "Recurs Formació") $text = "Recurs > Formació";
  if($tipus == "Recurs General") $text = "Recurs > General";
  if($tipus == "Recurs Informàtic") $text = "Recurs > Informàtic";
  if($tipus == "Recurs Jurídic") $text = "Recurs > Jurídic";
  if($tipus == "Recurs Projectes") $text = "Recurs > Projectes";
  

  $news_type_icon_filename = str_replace(' ','-',strtolower($tipus));
  $news_type_icon_path = base_path().path_to_theme()."/images/news-icons/".$news_type_icon_filename.".gif";

  

  return '<span class="label node-type-detail" ><a href="'.$path.'"><img alt="news-icon" src="'.$news_type_icon_path.'" />'. $text .'</a> </span>';
  //return '<a class="label" href="'.$path.'">'. $text .'</a>';
}

/************Butlleti************/
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
    $suggestions = array();
    $template_filename = 'page';
    foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
	$suggestions[] = $template_filename;
    }
    if ($alias != $_GET['q']) {
      $vars['template_files'] = array_merge((array) $suggestions, $vars['template_files']);
    }
    array_pop($suggestions);
    $vars['body_classes'] = $vars['body_classes'].' '.implode(' ', (array) $suggestions);
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
function genesis_xarxanet3_filter_tips($tips, $long = FALSE, $extra = '') {
  return '';
}
function genesis_xarxanet3_filter_tips_more_info () {
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

function genesis_xarxanet3_preprocess_views_view_row_rss(&$vars) {
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
        }elseif($divaux->getAttribute('class') == 'node-terms'){
          $divaux->parentNode->RemoveChild($divaux);
        }elseif($divaux->getAttribute('class') == 'node-image'){
          $divaux->parentNode->RemoveChild($divaux);
        }elseif($divaux->getAttribute('class') == 'node-social-links'){
          $divaux->parentNode->RemoveChild($divaux);
        }elseif($divaux->getAttribute('id') == 'new_map'){
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
//drupal_rebuild_theme_registry();


function get_time_offset($date_timezone, $date)
{
    $tz = new DateTimeZone($date_timezone);
    $temps = new DateTime($date,$tz);
    $offset = $tz->getOffset($temps);

    return $offset ;
}


/* Overriding links from print module: print icon */


function genesis_xarxanet3_print_format_link() {

  $print_html_link_class = variable_get('print_html_link_class', 'print-page');
  $print_html_new_window = variable_get('print_html_new_window', 0);
  $print_html_show_link = variable_get('print_html_show_link', 1);
  $print_html_link_text = filter_xss(variable_get('print_html_link_text', t('Printer-friendly version')));

  $img = drupal_get_path('theme', 'genesis_xarxanet3') .'/images/pictos/print.png';
  $title = t('Display a printer-friendly version of this page.');
  $class = strip_tags($print_html_link_class);
  $new_window = $print_html_new_window;
  $format = _print_format_link_aux($print_html_show_link, $print_html_link_text, $img);

  return array('text' => $format['text'],
               'html' => $format['html'],
               'attributes' => print_fill_attributes($title, $class, $new_window),
              );
}



/* Overriding links from print module: send to a friend icon */


function genesis_xarxanet3_print_mail_format_link() {
  $print_mail_link_class  = variable_get('print_mail_link_class', PRINT_MAIL_LINK_CLASS_DEFAULT);
  $print_mail_show_link = variable_get('print_mail_show_link', PRINT_MAIL_SHOW_LINK_DEFAULT);
  $print_mail_link_text = filter_xss(variable_get('print_mail_link_text', t('Send to friend')));

  $img = drupal_get_path('theme', 'genesis_xarxanet3') . '/images/pictos/mail.png';
  $title = t('Send this page by e-mail.');
  $class = strip_tags($print_mail_link_class);
  $new_window = FALSE;
  $format = _print_format_link_aux($print_mail_show_link, $print_mail_link_text, $img);

  return array(
    'text' => $format['text'], 
    'html' => $format['html'], 
    'attributes' => print_fill_attributes($title, $class, $new_window),
  );
}


/* Overriding links from print module: send to a pdf icon */

function genesis_xarxanet3_print_pdf_format_link() {
  $print_pdf_link_class  = variable_get('print_pdf_link_class', PRINT_PDF_LINK_CLASS_DEFAULT);
  $print_pdf_content_disposition = variable_get('print_pdf_content_disposition', PRINT_PDF_CONTENT_DISPOSITION_DEFAULT);
  $print_pdf_show_link = variable_get('print_pdf_show_link', PRINT_PDF_SHOW_LINK_DEFAULT);
  $print_pdf_link_text = filter_xss(variable_get('print_pdf_link_text', t('PDF version')));

  $img = drupal_get_path('theme', 'genesis_xarxanet3') . '/images/pictos/pdf-version.png';
  $title = t('Display a PDF version of this page.');
  $class = strip_tags($print_pdf_link_class);
  $new_window = ($print_pdf_content_disposition == 1);
  $format = _print_format_link_aux($print_pdf_show_link, $print_pdf_link_text, $img);

  return array(
    'text' => $format['text'], 
    'html' => $format['html'], 
    'attributes' => print_fill_attributes($title, $class, $new_window),
  );
}

