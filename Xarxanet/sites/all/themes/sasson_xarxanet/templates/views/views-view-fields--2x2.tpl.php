<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<div class="<?php print $fields['type']->raw; ?>">

<?php
	if ($id == 1) {
		$rawImatge = $fields['field_agenda_imatge']->content;
		if (strip_tags($rawImatge, '<img>') == '') $rawImatge = "<a href='" . $fields ['path']->content . "'>" . theme_image_style (array('style_name' => 'tag-petit', 'path' => 'public://no-image.jpg', 'title' => 'just a test image', 'alt' => 'test image')) . "</a>";
	} else {
		$rawImatge = $fields['field_agenda_imatge_1']->content;
		if (strip_tags($rawImatge, '<img>') == '') $rawImatge = "<a href='" . $fields ['path']->content . "'>" . theme_image_style (array('style_name' => 'tag-mig', 'path' => 'public://no-image.jpg', 'title' => 'just a test image', 'alt' => 'test image')) . "</a>";
	}
	
	$type = $fields['type']->raw;
	if (isset($fields['field_finfull_tipus'])) $type = strip_tags($fields['field_finfull_tipus']->content);
	if (isset($fields['field_event_type'])) $type = strip_tags($fields['field_event_type']->content);
	
	print $rawImatge;
	print sasson_xarxanet_get_label($type, $fields['path']->raw);
	
	$startdate = strip_tags($fields['field_date_event']->content);
	$enddate = strip_tags($fields['field_date_event_1']->content);
	
	if ($startdate) {
		$date_event_fecha = substr($startdate,0, -7);
		$date_event_hora = substr($startdate, -5);
		print '<div class="event-data">
	      		<div class="floatesquerra" ><strong>Inici  </strong>'.
		      		$date_event_fecha." a les ".$date_event_hora.
		      		'</div>';
	
		if ($startdate != $enddate) {
			$date_event_fecha = substr($enddate,0, -7);
			$date_event_hora = substr($enddate, -5);
			print '<div class="floatesquerra" ><strong>Final  </strong>'.
					$date_event_fecha." a les ".$date_event_hora.
					'</div>';
		}
		print '</div>';
	}
	
	print '<h3>'.$fields['title']->content.'</h3>';
	print $fields['field_resum']->content; 
?>

</div>
