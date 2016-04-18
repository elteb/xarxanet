<?php
/**
 * @file views-view-fields.tpl.php
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
*   - $field->separator: an optional separator that may appear before a field.
* - $row: The raw result object from the query, with all data it fetched.
*
* @ingroup views_templates
*/

if (isset($fields['field_doc_imatge_fid']->raw)){
	$imagefile = field_file_load($fields['field_doc_imatge_fid']->raw);
	$filepath = $imagefile['filepath'];
} else {
	$filepath = '/sites/default/files/biblioteca/doc_base.jpg';
}

$autor = strip_tags($fields['field_doc_autoria_value']->content);
$editorial = strip_tags($fields['field_doc_editorial_value']->content);
$year = strip_tags($fields['field_doc_data_publi_value']->content);
$teaser = strip_tags($fields['field_doc_sinopsi_value']->raw, '<br>');


echo 	"<table class='biblioteca-document'><tr>
			<td class='image'>
				<a href='{$fields['path']->content}'>
					<img src='{$filepath}' alt='Portada de {$fields['title']->raw}' />
				</a>
		</td><td>
			<div class='text'>
				<h2><a href='{$fields['path']->content}'>{$fields['title']->raw}</a></h2>
				<p class='top'>
					{$autor}<br/>
					{$editorial} ({$year})
				</p>
				<p class='teaser'>{$teaser}</p>
			</div>
		</td></tr></table>";
?>
