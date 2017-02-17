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
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php if ($id == 'field_recull_principal_rel') { ?>
			<?php $noti_rel_ext = $field->content; ?>
		<?php } ?>
		<?php if ($id == 'field_recull_principal_rel_xn') { ?>
			<?php $nodes_rel = explode(",",$field->content); ?>
			<?php print '<div class="item-list"><ul>'; ?>
			<?php foreach($nodes_rel as $node_rel){
				$node = node_load(strip_tags($node_rel));
				$type = $node->type;
				if($type=='opinio'){
					$autor = $node->field_autor_a['und'][0]['nid'];
					$autor = node_load($autor);	
					print "<li><a href=" . url('node/' .$node->nid, array('absolute' => TRUE)) . ">Opinió - " . $autor->title . ": " . $node->title . "</a></li>"; 
				}else{
					print "<li><a href=" . url('node/' .$node->nid, array('absolute' => TRUE)) . ">" . $node->title . "</a></li>";
				}						
			} 
			print '</ul></div>'; 
			print $noti_rel_ext;
			?>			
		<?php }else{ ?>
			<?php if ($id != 'field_recull_principal_rel'): ?>
	    		<?php print $field->content; ?>
	    	<?php endif; ?>
	   	<?php } ?>
    <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>