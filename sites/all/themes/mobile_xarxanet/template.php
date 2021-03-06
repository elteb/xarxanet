<?php 

/**
 * Implementation of preprocess_page().
 */
function mobile_xarxanet_preprocess_page(&$vars) {	 
	// Load custom links menu into a variable, the name is always prefixed with 'menu-'
	$vars['mobile_menu'] = menu_navigation_links('menu-mobile-menu');	 
}

/**
 * Implementation of preprocess_html().
 */
function mobile_xarxanet_preprocess_html(&$vars) {
	// Add unique classes for each page and website section
    $path = drupal_get_path_alias($_GET['q']);
    $temp = explode('/', $path, 2);
    $section = array_shift($temp);
    $page_name = array_shift($temp);

    if (isset($page_name)) {
      $vars['classes_array'][] = drupal_html_id('page-' . $page_name);
    }

    $vars['classes_array'][] = drupal_html_id('section-' . $section);
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function mobile_xarxanet_preprocess_comment_wrapper(&$vars) {
	if ($vars['content']) {
		$vars['content']['node'] = $vars['node']->type;
	}
}

function get_time_offset($date_timezone, $date)
{
	$tz = new DateTimeZone($date_timezone);
	$temps = new DateTime($date,$tz);
	$offset = $tz->getOffset($temps);

	return $offset ;
}

function strip_html_tags($str){
	$str = preg_replace('/(<|>)\1{2}/is', '', $str);
	$str = preg_replace(
		array( // Remove invisible content
			'@<head[^>]*?>.*?</head>@siu',
			'@<style[^>]*?>.*?</style>@siu',
			'@<script[^>]*?.*?</script>@siu',
			'@<noscript[^>]*?.*?</noscript>@siu',
		),
		"", //replace above with nothing
		$str );
	$str = replaceWhitespace($str);
	$str = strip_tags($str);
	return $str;
}

//To replace all types of whitespace with a single space
function replaceWhitespace($str) {
	$result = $str;
	foreach (array(
		"  ", " \t",  " \r",  " \n",
		"\t\t", "\t ", "\t\r", "\t\n",
		"\r\r", "\r ", "\r\t", "\r\n",
		"\n\n", "\n ", "\n\t", "\n\r",
	) as $replacement) {
		$result = str_replace($replacement, $replacement[0], $result);
	}
	return $str !== $result ? replaceWhitespace($result) : $result;
}


/**
 * Preprocess node
 */
function mobile_xarxanet_preprocess_node(&$variables) {
	$node = $variables['node'];
	$noticies = array( 'noticia_ambiental',
			'noticia_juridic',
			'noticia_comunitari',
			'noticia_cultural',
			'noticia_economic',
			'noticia_formacio',
			'noticia_general',
			'noticia_informatic',
			'noticia_projectes',
			'noticia_social',
			'noticia_internacional_ang',
			'noticia_internacional_cat',
			'noticia_internacional_esp',
			'noticia_en_angles',
	);
	$recursos = array(	'recurs_economic',
			'recurs_formacio',
			'recurs_general',
			'recurs_informatic',
			'recurs_juridic',
			'recurs_projectes'
	);

	if (in_array($node->type, $noticies)) {
		$variables['theme_hook_suggestion'] = 'node__noticia';
	}
	if (in_array($node->type, $recursos)) {
		$variables['theme_hook_suggestion'] = 'node__recurs';
	}
}

/**
 * Get label from content type
 */
function mobile_xarxanet_get_label($tipus) {
	$text = $tipus;

	if($tipus == "noticia_ambiental") $text = "Notícia > Ambiental";
	if($tipus == "noticia_juridic") $text = "Notícia > Jurídic";
	if($tipus == "noticia_comunitari") $text = "Notícia > Comunitari";
	if($tipus == "noticia_cultural") $text = "Notícia > Cultural";
	if($tipus == "noticia_economic") $text = "Notícia > Econòmic";
	if($tipus == "noticia_formacio") $text = "Notícia > Formació";
	if($tipus == "noticia_general") $text = "Notícia > General";
	if($tipus == "noticia_informatic") $text = "Notícia > Informàtic";
	if($tipus == "noticia_projectes") $text = "Notícia > Projectes";
	if($tipus == "noticia_social") $text = "Notícia > Social";
	if($tipus == "noticia_internacional_ang") $text = "Notícia > Internacional";
	if($tipus == "noticia_internacional_cat") $text = "Notícia > Internacional";
	if($tipus == "noticia_internacional_esp") $text = "Notícia > Internacional";

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
	if($tipus == "Notícia Internacional") $text = "Notícia > Internacional";

	if($tipus == "Curs") $text = "Esdeveniment > Curs";
	if($tipus == "Acte") $text = "Esdeveniment > Acte";
	if($tipus == "Esdeveniment") $text = "Agenda";
	if($tipus == "event") $text = "Agenda";

	if($tipus == "Finançament (NOU)") $text = "Finançament";
	if($tipus == "Premi") $text = "Finançament > Premi";
	if($tipus == "Subvenció") $text = "Finançament > Subvenció";
	if($tipus == "Beques") $text = "Finançament > Beques";
	if($tipus == "Altres") $text = "Finançament > Altres";
	if($tipus == "Recurs Jurídic") $text = "Recurs > Jurídic";

	if($tipus == "recurs_economic") $text = "Recurs > Econòmic";
	if($tipus == "recurs_formacio") $text = "Recurs > Formació";
	if($tipus == "recurs_general") $text = "Recurs > General";
	if($tipus == "recurs_informatic") $text = "Recurs > Informàtic";
	if($tipus == "recurs_juridic") $text = "Recurs > Jurídic";
	if($tipus == "recurs_projectes") $text = "Recurs > Projectes";

	if($tipus == "Recurs Econòmic") $text = "Recurs > Econòmic";
	if($tipus == "Recurs Formació") $text = "Recurs > Formació";
	if($tipus == "Recurs General") $text = "Recurs > General";
	if($tipus == "Recurs Informàtic") $text = "Recurs > Informàtic";
	if($tipus == "Recurs Jurídic") $text = "Recurs > Jurídic";
	if($tipus == "Recurs Projectes") $text = "Recurs > Projectes";

	$news_type_icon_filename = str_replace(array('_',' '),'-',mobile_xarxanet_drop_accents(strtolower($tipus)));
	$news_type_icon_path = base_path().path_to_theme()."/images/pictos/news-icons/".$news_type_icon_filename.".gif";

	return '<div id="category">	<div id="picto"><img alt="news-icon" src="'.$news_type_icon_path.'" /></div><div id="category-title">'. $text .'</div></div>';
}

/*
 * Drop accents from a string
*/
function mobile_xarxanet_drop_accents($incoming_string){
	$tofind = "ÀÁÂÄÅàáâäÒÓÔÖòóôöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
	$replac = "AAAAAaaaaOOOOooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
	return utf8_encode(strtr(utf8_decode($incoming_string),
			utf8_decode($tofind),
			$replac));
}
