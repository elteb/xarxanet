<?php

/**
 * @file
 * Default print module template
 *
 * @ingroup print
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	lang="<?php print $print['language']; ?>"
	xml:lang="<?php print $print['language']; ?>">
<head>
    <?php print $print['head']; ?>
    <?php print $print['base_href']; ?>
    <title><?php print $print['title']; ?></title>
    <?php print $print['scripts']; ?>
    <?php print $print['sendtoprinter']; ?>
    <?php print $print['robots_meta']; ?>
    <?php print $print['favicon']; ?>
    <?php print $print['css']; ?>
  </head>
<body>
    <?php
				
if (! empty ( $print ['message'] )) {
					print '<div class="print-message">' . $print ['message'] . '</div><p />';
				}
				?>
    <div class="print-logo"><?php print $print['logo']; ?></div>
	<div class="print-site_name"><?php print $print['site_name']; ?></div>
	<p />
	<div class="print-breadcrumb"><?php print $print['breadcrumb']; ?></div>
	<hr class="print-hr" />
	<div class="print-summary">
		<?php print $print['node']->field_resum['und'][0]['value']; ?>
	</div>
	<hr class="print-hr" />
	<div class="print-content">
		<?php
			$type = explode('_',$print['type']);
			switch ($type[0]) {
				case 'noticia':
					print $print['node']->body['und'][0]['value'];
					break;
				case 'recurs':
					print $print['node']->body['und'][0]['value'];
					foreach ($print['node']->field_subtitols['und'] as $i => $subt) {
						print '<h2>'.$subt['value'].'</h2>';
						print $print['node']->field_continguts['und'][$i]['value'];
					}
					break;
				case 'financament':
					if($print['node']->field_convocant['und'][0]['value']) {
						echo '<p><b>Convocant: </b>'.strip_tags($print['node']->field_convocant['und'][0]['value']).'</p>';
					}
						
					if($print['node']->field_finfull_data_publicacio['und'][0]['value']) {
						echo '<p><b>Data de publicació: </b>'.strip_tags(date('d/m/Y', strtotime($print['node']->field_finfull_data_publicacio['und'][0]['value']))).'</p>';
					}
						
					if($print['node']->field_date['und'][0]['value']) {
						echo '<p><b>Termini: </b>'. strip_tags(date('d/m/Y', strtotime($print['node']->field_date['und'][0]['value']))).' - '.strip_tags(date('d/m/Y', strtotime($print['node']->field_date['und'][0]['value2']))).'</p>';
					}
					
					echo '<p><b>Contingut:</b><br/>'.$print['node']->body['und'][0]['value'].'</p>';
					 
					$all_fields = field_info_fields();
					$ambits = list_allowed_values($all_fields['field_finfull_ambit']);
					$tipus = list_allowed_values($all_fields['field_finfull_tipus']);
					$publipriv = list_allowed_values($all_fields['field_finfull_publicprivat']);
					$geografic = list_allowed_values($all_fields['field_finfull_ambit_geo']);
					 
					if (!empty($print['node']->field_finfull_ambit['und'])) {
						echo '<span><b>Àmbit:</b></span><ul>';
						foreach($print['node']->field_finfull_ambit['und'] as $ambit) {
							echo '<li>'.$ambits[$ambit['value']].'</li>';
						}
						echo '</ul>';
					}
						
					if ($print['node']->field_finfull_tipus['und'][0]['value']) {
						echo '<p><b>Tipus: </b>'.$tipus[$print['node']->field_finfull_tipus['und'][0]['value']].'</p>';
					}
					
					if ($print['node']->field_finfull_publicprivat['und'][0]['value']) {
						echo '<p><b>Públic/Privat: </b>'.$publipriv[$print['node']->field_finfull_publicprivat['und'][0]['value']].'</p>';
					}
					 
					if($print['node']->field_finfull_ambit_geo['und'][0]['value']) {
						echo '<p><b>Àmbit geogràfic: </b>'.$geografic[$print['node']->field_finfull_ambit_geo['und'][0]['value']].'</p>';
					}
					
					if(!empty($print['node']->field_finfull_bases['und'])) {
						echo '<span><b>Bases</b></span><ul>';
						foreach($print['node']->field_finfull_bases['und'] as $base) {
							echo '<li><a href="'.$base['url'].'">'.$base['title'].'</a> ('.$base['url'].')</li>';
						}
						echo '</ul></p>';
					}
					break;
				case 'event':
					$inici = new DateTime($print['node']->field_date_event['und'][0]['value'], new DateTimeZone($print['node']->field_date_event['und'][0]['timezone_db']));
					$final = new DateTime($print['node']->field_date_event['und'][0]['value2'], new DateTimeZone($print['node']->field_date_event['und'][0]['timezone_db']));
					$inici->setTimezone(new DateTimeZone($print['node']->field_date_event['und'][0]['timezone']));
					$final->setTimezone(new DateTimeZone($print['node']->field_date_event['und'][0]['timezone']));
					
					echo '<p><strong>Inici: </strong>'.$inici->format("d/m/Y \a \l\e\s H:i").'</p>';
					if ($print['node']->field_date_event['und'][0]['value'] != $print['node']->field_date_event['und'][0]['value2']) {
						echo '<p><strong>Final: </strong>'.$final->format("d/m/Y \a \l\e\s H:i").'</p>';
					}
					echo $print['node']->body['und'][0]['value'];
					
					echo '<p><b>Àmbit</b>';
					foreach($print['node']->field_ambits['und'] as $ambit) {
						echo '<li>'.$ambit['value'].'</li>';
					}
					echo '</p>';
					
					if($print['node']->field_organizer['und'][0]['value']) {
						echo '<p><strong>Organitzador </strong>'.$print['node']->field_organizer['und'][0]['value'].'</p>';
					}
					if($print['node']->field_org_adress['und'][0]['value']) {
						echo '<p><strong>Adreça de l\'organitzador </strong>'.$print['node']->field_org_adress['und'][0]['value'].'</p>';
					}
					if($print['node']->field_org_email['und'][0]['value']) {
              			echo '<p><strong>Correu </strong>'.$print['node']->field_org_email['und'][0]['value'].'</p>';
					}
					if($print['node']->field_org_web['und'][0]['display_url']) {
						echo '<p><strong>URI</strong> <a href="'.$print['node']->field_org_web['und'][0]['url'].'">'.$print['node']->field_org_web['und'][0]['title'].'</a> ('.$print['node']->field_org_web['und'][0]['url'].')</p>';
					}
					if($print['node']->field_link['und'][0]['value']) {
						echo '<p><strong>Més informació </strong> '.$print['node']->field_link['und'][0]['value'].'</p>';
					}
					break;
			}
		
		?>
	</div>
  </body>
</html>