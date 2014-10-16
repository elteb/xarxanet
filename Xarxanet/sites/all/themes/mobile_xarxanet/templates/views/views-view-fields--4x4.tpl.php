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

<?php
	$fid = $fields['field_agenda_imatge_fid']->raw;
	if ($fid == "") $fid = $fields['field_agenda_imatge_fid_1']->raw;
	if ($fid == "") $fid = $fields['field_agenda_imatge_fid_2']->raw;
	$file = field_file_load($fid);
	$fileurl = imagecache_create_url('mobile', $file['filepath']);
	$teaser = strip_html_tags($fields['field_resum_value']->raw);
	
	$date_event_fecha = substr($fields['field_date_event_value']->content,0, -8);
	$date_event_hora = substr($fields['field_date_event_value']->content, -5);
	$data_inici = ($date_event_fecha != "" && $date_event_hora !="") ? ($date_event_fecha.", ".$date_event_hora) : "";

	$date_event_fecha = substr($fields['field_date_event_value2']->content,0, -8);
	$date_event_hora = substr($fields['field_date_event_value2']->content, -5);
	$data_fi = ($date_event_fecha != "" && $date_event_hora !="") ? ($date_event_fecha.", ".$date_event_hora) : "";
	
	$clock = path_to_theme().'/images/pictos/timer.png';
		
	print "
		<div class='item-content'>
			<div class='title'>{$fields['title']->content}</div> ";
	
	if ($data_inici != '' && $data_fi != '') {
		print " <div class='data'>
				<div id='clock'><img src='/{$clock}' alt='timer' /></div>
				<div id='text'><b>Inici: </b>{$data_inici} - <b>Fi: </b>{$data_fi}</div>
				</div>";
	}
			
	print "	<div class='image'>
				<a href='{$fields['path']->content}'>
					<img src='$fileurl' alt='imatge de {$fields['title']->raw}'/>
				</a>
			</div>
			<div class='teaser'>{$teaser}</div>
		</div>";
?>
