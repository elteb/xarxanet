<?php

include("browser.php");
$browser = new Browser();
switch(true){
	case($browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() == 9 ):
		$CSS = '<link href="/sites/all/themes/genesis/genesis_xarxanet3/css/ie-9.css" rel="stylesheet" type="text/css" />';
	break;
	case($browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() == 7 ):
		$CSS = '
<link href="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix-alt.css" rel="stylesheet" type="text/css" />
<link href="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix.js"></script>
';
	break;
	case($browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() == 8 ):
		$CSS = '<link href="/sites/all/themes/genesis/genesis_xarxanet3/css/ie-8.css" rel="stylesheet" type="text/css" />';
	break;
	case($browser->getBrowser() == Browser::BROWSER_OPERA):
		$CSS = '<link href="/sites/all/themes/genesis/genesis_xarxanet3/css/opera.css" rel="stylesheet" type="text/css" />';
	break;
	case($browser->getBrowser() == Browser::BROWSER_FIREFOX):
		$CSS = '<link href="/sites/all/themes/genesis/genesis_xarxanet3/css/firefox.css" rel="stylesheet" type="text/css" />';
	break;
	case($browser->getBrowser() == Browser::BROWSER_CHROME):
	case($browser->getBrowser() == Browser::BROWSER_SAFARI):
		$CSS = '<link href="/sites/all/themes/genesis/genesis_xarxanet3/css/webkit.css" rel="stylesheet" type="text/css" />';
	break;
}

?>

<?php 
function modificacions_ie7(){
$grup1 = array(60, 90, 154, 155, 156, 157, 21929, 21930, 21931, 21932, 21933, 21934, 21935, 22297, 22298);
$grup2 = array(163, 14, 129, 130, 128, 131, 250, 253, 169, 165, 170, 168, 106);
$grup3 = array(89);
$grup4 = array(213);
$grup5 = array(59, 125, 127, 124, 126);
	if (arg(0) == 'node') {
		$node = node_load(array('nid' => arg(1)));
		$nid = $node->nid;
		if (in_array($nid , $grup1))
			return '<script type="text/javascript" src="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix-grup1.js"></script>';
		if (in_array($nid , $grup2))
			return '<script type="text/javascript" src="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix-grup2.js"></script>';
		if (in_array($nid , $grup3))
			return '<script type="text/javascript" src="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix-grup3.js"></script>';
		if (in_array($nid , $grup4))
			return '<script type="text/javascript" src="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix-grup4.js"></script>';
		if (in_array($nid , $grup5))
			return '<script type="text/javascript" src="/sites/all/themes/genesis/genesis_xarxanet3/css/ie7-fix-grup5.js"></script>';
		else { return "";}
	}
	else { 
		return "";
	}
}
?>
