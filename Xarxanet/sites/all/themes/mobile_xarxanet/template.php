<?php 

/**
 * Implementation of preprocess_page().
 */
function mobile_xarxanet_preprocess_page(&$vars) {	 
	// Load custom links menu into a variable, the name is always prefixed with 'menu-'
	$vars['mobile_menu'] = menu_navigation_links('menu-mobile-menu');	 
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function mobile_xarxanet_preprocess_comment_wrapper(&$vars) {
	if ($vars['content'] && $vars['node']->type != 'forum') {
		$vars['content'] = '<h2 id="comments-title">'. t('Comments') .'</h2>'.  $vars['content'];
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