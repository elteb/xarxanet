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
	$type = $fields['type']->raw;	
	if(strip_tags($fields['field_finfull_tipus']->content) != '') {
		$type = strip_tags($fields['field_finfull_tipus']->content);
	}
	if(strip_tags($fields['field_event_type']->content)) {
		$type = strip_tags($fields['field_event_type']->content);
	}

	if ($id == 1) {
		$rawImatge = $fields['field_agenda_imatge_2']->content;
		if ($rawImatge == "") $rawImatge = "<a href='" . $fields ['path']->content . "'>" . theme ( 'imagecache', 'tag-gran', 'no-image.jpg', 'just a test image', 'test image' ) . "</a>";
	} else if (($id == 2) || ($id == 7)) {
		$rawImatge = $fields['field_agenda_imatge_1']->content;
		if ($rawImatge == "") $rawImatge = "<a href='" . $fields ['path']->content . "'>" . theme ( 'imagecache', 'tag-mig', 'no-image.jpg', 'just a test image', 'test image' ) . "</a>";
	} else {
		$rawImatge = $fields['field_agenda_imatge']->content;
		if ($rawImatge == "") $rawImatge = "<a href='" . $fields ['path']->content . "'>" . theme ( 'imagecache', 'tag-petit', 'no-image.jpg', 'just a test image', 'test image' ) . "</a>";
	}
	print $rawImatge;
	print sasson_xarxanet_get_label($type, $fields['path']->raw);
	print '<h3>'.$fields['title']->content.'</h3>';
	print $fields['field_resum']->content; 
?>

</div>