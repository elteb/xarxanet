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

print $fields['field_missio_valors']->content;
if (strip_tags($fields['field_ambit_intervencio']->content)) {
	print '<p><b>'.$fields['field_ambit_intervencio']->label.': </b>'.strip_tags($fields['field_ambit_intervencio']->content).'</p>';
}
print '<div id="data-block">
			<div class="data-block-part" id="left-part">';
if (strip_tags($fields['field_nif_de_l_entitat']->content)) {
	print '<div class="block-item" id="item-nif">'.$fields['field_nif_de_l_entitat']->content.'	</div>';
}
if (strip_tags($fields['field_telefon']->content)) {
	print '<div class="block-item" id="item-tel">'.$fields['field_telefon']->content.'	</div>';
}
if (strip_tags($fields['field_correu_electronic_public']->content)) {
	print '<div class="block-item" id="item-mail">'.$fields['field_correu_electronic_public']->content.'	</div>';
}
if (strip_tags($fields['field_pagina_web']->content)) {
	print '<div class="block-item" id="item-web">'.$fields['field_pagina_web']->content.'	</div>';
}
print	'	</div>
			<div class="data-block-part" id="right-part">';
if (strip_tags($fields['address']->content)) {
	print '<div class="block-item" id="item-adress">'.$fields['address']->content.'	</div>';
}
print	'	</div>
		</div>';
?>
