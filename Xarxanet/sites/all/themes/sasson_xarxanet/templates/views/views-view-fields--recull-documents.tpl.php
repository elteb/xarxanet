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
?>
<?php
if(isset($fields['title']))  echo '<'.$fields['title']->inline_html.' class="views-field-'.$fields['title']->class.'">'.$fields['title']->content.'</'.$fields['title']->inline_html.'>';

$docs = explode('##||##', $fields['field_recull_docs_doc']->content);
$imgs = array();
$keys = array('','_1','_2','_3');

foreach ($keys as $key) {
	$fieldkey = 'field_doc_imatge'.$key;
	$img = $fields[$fieldkey]->content;
	//$img = str_replace('src', 'width="110px" src', $img);
	$imgs[] = $img;
} 

echo '	<div class="row" id="first-row">'
 			.$imgs[0].'<div class="field-item">'.$docs[0].'</div>'
 			.$imgs[1].'<div class="field-item">'.$docs[1].'</div>'	
 		.'</div><div id="clear"></div><div class="row" id="last-row">'
 			.$imgs[2].'<div class="field-item">'.$docs[2].'</div>'
 			.$imgs[3].'<div class="field-item">'.$docs[3].'</div>'
 		.'</div>
 		<div id="clear"></div>
 		<div id="related-content">
 		<span>Altres documents relacionats:</span>';

if(($fields['field_recull_docs_altres']->content != '') || ($fields['field_recull_docs_extern']->content != '')){
	echo '<'.$fields['field_recull_docs_altres']->inline_html.' class="views-field-'.$fields['field_recull_docs_altres']->class.'">'.$fields['field_recull_docs_altres']->content.'</'.$fields['field_recull_docs_altres']->inline_html.'>';
	echo '<'.$fields['field_recull_docs_extern']->inline_html.' class="views-field-'.$fields['field_recull_docs_extern']->class.'">'.$fields['field_recull_docs_extern']->content.'</'.$fields['field_recull_docs_extern']->inline_html.'>';
}
echo '</div>';
?>
