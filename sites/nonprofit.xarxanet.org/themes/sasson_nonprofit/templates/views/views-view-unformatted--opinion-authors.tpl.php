<?php
// $Id: views-view-unformatted.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php
$itRow = 1;
foreach ($rows as $id => $row):
	if ($itRow <= 18) {
		print $row;
	}
	$itRow ++;	
endforeach; ?>
