<?php 
	$colors = array(
			'noticia_ambiental' => '8ebc7c',
			'noticia_comunitari' => 'f4bc45',
			'noticia_cultural' => '959ed5',
			'noticia_economic' => 'd1b91b',
			'noticia_formacio' => 'be9255',
			'noticia_informatic' => '9b8cd1',
			'noticia_internacional_ang' => 'a75387',
			'noticia_internacional_cat' => 'a75387',
			'noticia_internacional_esp' => 'a75387',
			'noticia_juridic' => '62aec5',
			'noticia_projectes' => 'e39595',
			'noticia_social' =>'b182ac');
	$ambits = array(
			'noticia_ambiental' => 'Ambiental',
			'noticia_comunitari' => 'Comunitari',
			'noticia_cultural' => 'Cultural',
			'noticia_economic' => 'Econòmic',
			'noticia_formacio' => 'Formació',
			'noticia_informatic' => 'Informàtic',
			'noticia_internacional_ang' => 'Internacional',
			'noticia_internacional_cat' => 'Internacional',
			'noticia_internacional_esp' => 'Internacional',
			'noticia_juridic' => 'Jurídic',
			'noticia_projectes' => 'Projectes',
			'noticia_social' =>'Social');
	$links = array(
			'noticia_ambiental' => array('ambiental', 'Més notícies ambientals'),
			'noticia_comunitari' => array('comunitari', 'Més notícies comunitàries'),
			'noticia_cultural' => array('cultural', 'Més notícies culturals'),
			'noticia_economic' => array('economic/noticies', 'Més notícies econòmiques'),
			'noticia_formacio' => array('formacio/noticies', 'Més notícies sobre formació'),
			'noticia_informatic' => array('informatic/noticies', 'Més notícies informàtiques'),
			'noticia_internacional_ang' => array('internacional/noticies/eng', 'Més notícies internacionals - Anglès'),
			'noticia_internacional_cat' => array('internacional', 'Més notícies internacionals'),
			'noticia_internacional_esp' => array('internacional/noticies/esp', 'Més notícies internacionals - Castellà'),
			'noticia_juridic' => array('juridic/noticies', 'Més notícies jurídiques'),
			'noticia_projectes' => array('projectes/noticies', 'Més notícies sobre projectes'),
			'noticia_social' =>array('social', 'Més notícies socials'));

?>
<?php if (!empty($section_nodes)) { ?>
<table border="0" cellspacing="0" cellpadding="0" style='width: 580px; border-top: solid 20px #FFF; width: 580px;'><tr>
	<td style="background-color: <?php echo '#'.$colors[$section_name]?>; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 3px 8px; height: 28px; width: <?php echo (strlen($ambits[$section_name]))*2.7;?>px"><?php echo $ambits[$section_name];?></td>
	<td style="width: <?php echo 580-(strlen($ambits[$section_name]))*2.7;?>px; text-align: right;"><a href='<?php echo $links[$section_name][0]; ?>' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 11pt; text-decoration: none;'><?php echo $links[$section_name][1]; ?></a></td></tr><tr>
	<td style="border-top: solid 2px <?php echo '#'.$colors[$section_name]?>; padding: 10px 5px;" colspan="2">
		<table style="font-family: Arial, Helvetica; font-size: 13px;">
		<?php
		//$length = 0;
		foreach ($section_nodes as $node) {
			//if ($length < 3) {
				$news_node = node_load($node->nid);
				$teaser = strip_tags($news_node->field_resum[0]['value']);
				echo "	<tr>
					<td style='padding: 0 5px; vertical-align: top; width: 10px'><img style='vertical-align:top; margin-top:8px' src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet_{$colors[$section_name]}.jpg' /></td>
					<td style='padding: 2px;'><a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 12pt; line-height: 21px;'>{$news_node->title}</a></td>
					</tr><tr><td colspan='2' style='padding: 0 5px 5px 5px;'><p style='margin: 2px 0;'>{$teaser}</p></td></tr>";
				//$length++;
			//}				
		} 
		?>
		</table>
	</td>
</tr></table>
<?php }?>

 
