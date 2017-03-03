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

<div class="
<?php
	if ($id % 3 == 0) {
		print ' views-row-clear';
	}
?>
">

<?php
	if ($fields['type']->raw == 'opinion') {
		$rawImatge = $fields['field_square_photo']->content;
		if (strip_tags($fields['field_square_photo_1']->content, '<img>') != '') $rawImatge = $fields['field_square_photo_1']->content;
	} else {
		$rawImatge = $fields['field_agenda_imatge']->content;
	}

	if (strip_tags($rawImatge, '<img>') == '') $rawImatge = "<a href='" . strip_tags($fields['path']->content) . "'>" . theme_image_style (array('style_name' => 'tag-petit', 'path' => 'public://no-image.jpg', 'title' => 'just a test image', 'alt' => 'test image')) . "</a>";

	print $rawImatge;
	print '<h3>'.$fields['title']->content.'</h3>';
	print $fields['field_resum']->content;
?>

</div>
