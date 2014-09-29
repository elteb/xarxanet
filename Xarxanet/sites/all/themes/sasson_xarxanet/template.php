<?php

// DUPLICATE AND UNCOMMENT
// /**
//  * Implements template_preprocess_HOOK().
//  */
// function SUBTHEME_preprocess_HOOK(&$variables, $hook) {
// 
//   // Example: Add a striping class.
//   $variables['classes_array'][] = 'class-' . $variables['zebra'];
// 
// }

/*
 * Drop accents from a string
 */
function sasson_xarxanet_drop_accents($incoming_string){
	$tofind = "ÀÁÂÄÅàáâäÒÓÔÖòóôöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
	$replac = "AAAAAaaaaOOOOooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
	return utf8_encode(strtr(utf8_decode($incoming_string),
			utf8_decode($tofind),
			$replac));
}


/**
 * Get label from content type
 */
function sasson_xarxanet_get_label($tipus) {
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

	$news_type_icon_filename = str_replace(array('_',' '),'-',sasson_xarxanet_drop_accents(strtolower($tipus)));
	$news_type_icon_path = base_path().path_to_theme()."/images/news-icons/".$news_type_icon_filename.".gif";

	return '<p class="label node-type-detail" ><img alt="news-icon" src="'.$news_type_icon_path.'" />'. $text .'</p>';
}


/**
 * Preprocess node
 */
function sasson_xarxanet_preprocess_node(&$variables) {
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
	if ($node->type == 'butlleti_abast_nou') {
		switch ($node->simplenews->tid) {
			case 13529:
				//Butlletí A l'Abast convencional
				$variables['theme_hook_suggestion'] = 'node__butlleti_abast_nou';
				break;
			case 20400:
				//Butlletí A l'Abast-CEV
				$variables['theme_hook_suggestion'] = 'node__butlleti_abast_nou_cev';
				break;
		}
	}
}