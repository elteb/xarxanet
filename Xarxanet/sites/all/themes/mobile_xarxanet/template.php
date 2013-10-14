<?php 

/**
 * Implementation of preprocess_page().
 */
function mobile_xarxanet_preprocess_page(&$vars) {	 
	// Load custom links menu into a variable, the name is always prefixed with 'menu-'
	$vars['mobile_menu'] = menu_navigation_links('menu-mobile-menu');	 
}

function get_time_offset($date_timezone, $date)
{
	$tz = new DateTimeZone($date_timezone);
	$temps = new DateTime($date,$tz);
	$offset = $tz->getOffset($temps);

	return $offset ;
}