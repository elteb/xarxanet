<?php
$pathroot = 'http://www.xarxanet.org';
$colors = array (
		'Ambiental' => '8ebc7c',
		'Comunitari' => 'f4bc45',
		'Cultural' => '959ed5',
		'Econòmic' => 'd1b91b',
		'Formació' => 'be9255',
		'Informàtic' => '9b8cd1',
		'Internacional' => 'a75387',
		'Jurídic' => '62aec5',
		'Projectes' => 'e39595',
		'Social' => 'b182ac',
		'General' => 'b1290b'  
);
$links = array (
		'Ambiental' => array (
				'ambiental',
				'Més notícies ambientals' 
		),
		'Comunitari' => array (
				'comunitari',
				'Més notícies comunitàries' 
		),
		'Cultural' => array (
				'cultural',
				'Més notícies culturals' 
		),
		'Econòmic' => array (
				'economic/noticies',
				'Més notícies econòmiques' 
		),
		'Formació' => array (
				'formacio/noticies',
				'Més notícies sobre formació' 
		),
		'Informàtic' => array (
				'informatic/noticies',
				'Més notícies informàtiques' 
		),
		'Internacional' => array (
				'internacional/noticies',
				'Més notícies internacionals' 
		),
		'Jurídic' => array (
				'juridic/noticies',
				'Més notícies jurídiques' 
		),
		'Projectes' => array (
				'projectes/noticies',
				'Més notícies sobre projectes' 
		),
		'Social' => array (
				'social',
				'Més notícies socials' 
		) 
);

?>
<?php if (!empty($section_nodes)) { ?>

<table border="0" cellspacing="0" cellpadding="0" style="width: 580px; border-top: solid 20px #FFF; width: 580px;">
	<tr>
		<td style="background-color: <?php echo '#'.$colors[$section_name]?>; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 3px 8px; height: 28px; width: <?php echo (strlen($section_name))*2.7;?>px"><?php echo $section_name;?></td>
		<td style="width: <?php echo 580-(strlen($section_name))*2.7;?>px; text-align: right;"><a 	href='<?php echo $links[$section_name][0]; ?>' 	style='font-family: Georgia, Times New Roman, Times, serif; color: #005577; font-size: 11pt; text-decoration: none;'><?php echo $links[$section_name][1]; ?></a></td>
	</tr>
	<tr>
		<td style="border-top: solid 2px <?php echo '#'.$colors[$section_name]?>; padding: 10px 5px;" colspan="2">
			<table style="font-family: Arial, Helvetica; font-size: 13px;">
		<?php
	// $length = 0;
	foreach ( $section_nodes as $node ) {
		// if ($length < 3) {
		$news_node = node_load($node);
		$teaser = strip_tags($news_node->field_resum['und'][0]['value']);
		$url = url('node/' . $news_node->nid, array('absolute' => TRUE));
		echo "	<tr>
					<td style='padding: 0 5px; vertical-align: top; width: 10px'><img style='vertical-align:top; margin-top:8px' src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet_{$colors[$section_name]}.jpg'/></td>
					<td style='padding: 2px;'><a href='{$url}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 12pt; line-height: 21px;'>{$news_node->title}</a></td>
					</tr><tr><td colspan='2' style='padding: 0 5px 5px 5px;'><p style='margin: 2px 0;'>{$teaser}</p></td></tr>";
		// $length++;
		// }
	}
	?>
		</table>
		</td>
	</tr>
</table>
<?php }?>

 
