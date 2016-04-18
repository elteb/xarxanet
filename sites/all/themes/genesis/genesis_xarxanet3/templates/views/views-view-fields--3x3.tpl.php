<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
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

<div class="<?php  print xarxanet_get_class($fields['type']->content); ?>">
  <?php  print xarxanet_get_label($fields['type']->content,$fields['path']->content); ?>

  <?php $numId = $id; ?>

  <?php

  $rawImatge = "";
  if($numId == -1){
    $rawImatge = $fields['field_agenda_imatge_fid_2']->content;
    if($rawImatge == "") $rawImatge = 'tag-gran';

  }else if($numId == -1 || $numId == -7){
    $rawImatge = $fields['field_agenda_imatge_fid_1']->content;
    if($rawImatge == "") $rawImatge = 'tag-mig';
  }else{
    $rawImatge = $fields['field_agenda_imatge_fid']->content;
    if($rawImatge == "") $rawImatge = 'tag-petit';
  }

  if($rawImatge == 'tag-petit' ||$rawImatge == 'tag-mig' ||$rawImatge == 'tag-gran')
  {
    $rawImatge = "<a href='" . $fields['path']->content . "'>" . 
                  theme('imagecache', $rawImatge, 'no-image.jpg', 'just a test image', 'test image') .
                  "</a>";
  }
  print $rawImatge;
  ?>

  <?php print $fields['field_imatges']->content; ?>
 		

  <h3><?php print $fields['title']->content; ?></h3>
  <?php print $fields['field_resum_value']->content; ?>
</div>
