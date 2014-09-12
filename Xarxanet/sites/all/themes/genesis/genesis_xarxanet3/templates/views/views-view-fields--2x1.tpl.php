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

<?php $tipus = $fields['type']->content;
  if($fields['field_finfull_tipus_value']->content != "") $tipus = $fields['field_finfull_tipus_value']->content;
  if($fields['field_event_type_value']->content != "") $tipus = $fields['field_event_type_value']->content;

?>
<div class="<?php print xarxanet_get_class($tipus); ?>">
  <?php print xarxanet_get_label($tipus,$fields['path']->content); ?>
  <?php $numId = $id; ?>

  <?php

  $rawImatge = "";
    $rawImatge = $fields['field_agenda_imatge_fid_1']->content;
    if($rawImatge == "") {
	  $rawImatge = $fields['field_agenda_imatge_fid']->content;
	  if($rawImatge == "") {
		$rawImatge = 'tag-mig';
		drupal_set_message('x');
	  }
	}
  
  if($rawImatge == 'tag-petit' ||$rawImatge == 'tag-mig' ||$rawImatge == 'tag-gran')
  {
    $rawImatge = "<a href='" . $fields['path']->content . "'>" . 
                  theme('imagecache', $rawImatge, 'no-image.jpg', 'just a test image', 'test image') .
                  "</a>";
  }
  print $rawImatge;
  ?>

  <?php //print $fields['field_imatges']->content; ?>
  <?php if ($fields['field_date_event_value']->content):?>
  <div class="event-data">
    <div class="esvent-data">
      <div class="floatesquerra" ><strong>Inici  </strong>
      <?php if ($fields['field_date_event_value']->raw!= $fields['field_date_event_value2']->raw):?>
          <?php 
		  $date_event_fecha = substr($fields['field_date_event_value']->content,0, -7);
          $date_event_hora = substr($fields['field_date_event_value']->content, -5);
          if ($date_event_fecha != "" && $date_event_hora !="")  { print  ($date_event_fecha." a les ".$date_event_hora); }
		  //print date("d/m/Y \a \l\e\s H:i",strtotime($fields['field_date_event_value']->raw));
		  ?>
		</div>
      </div>
	  <div class="esvent-data">
		<div class="floatesquerra" style="clear:left;"><strong>Final </strong>
		<?php 
		$date_event_fecha = substr($fields['field_date_event_value2']->content,0, -7);
		$date_event_hora = substr($fields['field_date_event_value2']->content, -5);
		if ($date_event_fecha != "" && $date_event_hora !="")  { print  ($date_event_fecha." a les ".$date_event_hora); }
		?>
		</div>
	  </div>
    <?else:?>
        <?php 
		$date_event_fecha = substr($fields['field_date_event_value']->content,0, -7);
        $date_event_hora = substr($fields['field_date_event_value']->content, -5);
        if ($date_event_fecha != "" && $date_event_hora !="")  { print  ($date_event_fecha." a les ".$date_event_hora); }
		?></div>
          </div>
    <?php endif;?>
    </div>
  <?php endif;?>
  <h3><?php print $fields['title']->content; ?></h3>
  <?php print $fields['field_resum_value']->content; ?>
</div>

