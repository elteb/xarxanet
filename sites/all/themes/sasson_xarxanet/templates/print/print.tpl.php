<?php

/**
 * @file
 * Default print module template
 *
 * @ingroup print
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $head; ?>
    <base href='<?php print $url ?>' />
    <title><?php print $print_title; ?></title>
    <?php print $scripts; ?>
    <?php if (isset($sendtoprinter)) print $sendtoprinter; ?>
    <?php print $robots_meta; ?>
    <?php if (theme_get_setting('toggle_favicon')): ?>
      <link rel='shortcut icon' href='<?php print theme_get_setting('favicon') ?>' type='image/x-icon' />
    <?php endif; ?>
    <?php print $css; ?>
  </head>
<body>		
	<?php if (!empty($message)): ?>
      <div class="print-message"><?php print $message; ?></div><p />
    <?php endif; ?>
    <?php if ($print_logo): ?>
      <div class="print-logo"><?php print $print_logo; ?></div>
    <?php endif; ?>
	<div class="print-site_name"><?php print theme('print_published'); ?></div>
	<p />
	<div class="print-breadcrumb"><?php print theme('print_breadcrumb', array('node' => $node)); ?></div>
	<hr class="print-hr" />
	<div class="print-summary">
		<?php print $node->field_resum['und'][0]['value']; ?>
	</div>
	<hr class="print-hr" />
	<div class="print-content">
		<?php		
			$type = explode('_',$node->type);			
			switch ($type[0]) {
				case 'noticia':
					print $node->body['und'][0]['value'];
					break;
				case 'recurs':
					print $node->body['und'][0]['value'];
					foreach ($node->field_subtitols['und'] as $i => $subt) {
						print '<h2>'.$subt['value'].'</h2>';
						print $node->field_continguts['und'][$i]['value'];
					}
					break;
				case 'financament':
					if($node->field_convocant['und'][0]['value']) {
						echo '<p><b>Convocant: </b>'.strip_tags($node->field_convocant['und'][0]['value']).'</p>';
					}
						
					if($node->field_finfull_data_publicacio['und'][0]['value']) {
						echo '<p><b>Data de publicació: </b>'.strip_tags(date('d/m/Y', strtotime($node->field_finfull_data_publicacio['und'][0]['value']))).'</p>';
					}
						
					if($node->field_date['und'][0]['value']) {
						echo '<p><b>Termini: </b>'. strip_tags(date('d/m/Y', strtotime($node->field_date['und'][0]['value']))).' - '.strip_tags(date('d/m/Y', strtotime($node->field_date['und'][0]['value2']))).'</p>';
					}
					
					echo '<p><b>Contingut:</b><br/>'.$node->body['und'][0]['value'].'</p>';
					 
					$all_fields = field_info_fields();
					$ambits = list_allowed_values($all_fields['field_finfull_ambit']);
					$tipus = list_allowed_values($all_fields['field_finfull_tipus']);
					$publipriv = list_allowed_values($all_fields['field_finfull_publicprivat']);
					$geografic = list_allowed_values($all_fields['field_finfull_ambit_geo']);
					 
					if (!empty($node->field_finfull_ambit['und'])) {
						echo '<span><b>Àmbit:</b></span><ul>';
						foreach($node->field_finfull_ambit['und'] as $ambit) {
							echo '<li>'.$ambits[$ambit['value']].'</li>';
						}
						echo '</ul>';
					}
						
					if ($node->field_finfull_tipus['und'][0]['value']) {
						echo '<p><b>Tipus: </b>'.$tipus[$node->field_finfull_tipus['und'][0]['value']].'</p>';
					}
					
					if ($node->field_finfull_publicprivat['und'][0]['value']) {
						echo '<p><b>Públic/Privat: </b>'.$publipriv[$node->field_finfull_publicprivat['und'][0]['value']].'</p>';
					}
					 
					if($node->field_finfull_ambit_geo['und'][0]['value']) {
						echo '<p><b>Àmbit geogràfic: </b>'.$geografic[$node->field_finfull_ambit_geo['und'][0]['value']].'</p>';
					}
					
					if(!empty($node->field_finfull_bases['und'])) {
						echo '<span><b>Bases</b></span><ul>';
						foreach($node->field_finfull_bases['und'] as $base) {
							echo '<li><a href="'.$base['url'].'">'.$base['title'].'</a> ('.$base['url'].')</li>';
						}
						echo '</ul></p>';
					}
					break;
				case 'event':
					$inici = new DateTime($node->field_date_event['und'][0]['value'], new DateTimeZone($node->field_date_event['und'][0]['timezone_db']));
					$final = new DateTime($node->field_date_event['und'][0]['value2'], new DateTimeZone($node->field_date_event['und'][0]['timezone_db']));
					$inici->setTimezone(new DateTimeZone($node->field_date_event['und'][0]['timezone']));
					$final->setTimezone(new DateTimeZone($node->field_date_event['und'][0]['timezone']));
					
					echo '<p><strong>Inici: </strong>'.$inici->format("d/m/Y \a \l\\e\s H:i").'</p>';
					if ($node->field_date_event['und'][0]['value'] != $node->field_date_event['und'][0]['value2']) {
						echo '<p><strong>Final: </strong>'.$final->format("d/m/Y \a \l\\e\s H:i").'</p>';
					}
					echo $node->body['und'][0]['value'];
					
					if($node->field_organizer['und'][0]['value']) {
						echo '<p><strong>Organitzador </strong>'.$node->field_organizer['und'][0]['value'].'</p>';
					}
					if($node->field_org_adress['und'][0]['value']) {
						echo '<p><strong>Adreça de l\'organitzador </strong>'.$node->field_org_adress['und'][0]['value'].'</p>';
					}
					if($node->field_org_email['und'][0]['value']) {
              			echo '<p><strong>Correu </strong>'.$node->field_org_email['und'][0]['value'].'</p>';
					}
					if($node->field_org_web['und'][0]['display_url']) {
						echo '<p><strong>URI</strong> <a href="'.$node->field_org_web['und'][0]['url'].'">'.$node->field_org_web['und'][0]['title'].'</a> ('.$node->field_org_web['und'][0]['url'].')</p>';
					}
					if($node->field_link['und'][0]['value']) {
						echo '<p><strong>Més informació </strong> '.$node->field_link['und'][0]['value'].'</p>';
					}
					break;
				case 'opinio':
					print $node->body['und'][0]['value'];
					break;
			}
		?>
	</div>
  </body>
</html>