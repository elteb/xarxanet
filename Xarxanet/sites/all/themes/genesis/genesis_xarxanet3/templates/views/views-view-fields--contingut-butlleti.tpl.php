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

<?php $link = "http://www.xarxanet.org".preg_replace("[\">a</a>]","",preg_replace("[<a href=\"]", "",$fields['view_node']->content))?>
 
 <table border="0" cellpadding="1" cellspacing="1" style="width: 100%; border: 1px none; margin-bottom:6px;margin-top:6px; >
	<tbody style=" border: 0px none;">
		<tr>
			<td colspan="6">
				<span style="font-weight:bold;
letter-spacing:0.035em;
margin-bottom:0.2em;

padding:2px 0; font-size:100%; color: #0D75EB;"><a href="<?php print $link?>" style="color: #0D75EB;"><?php print xarxanet_clean_text_butlleti(stripslashes($fields['title']->content))?></a></span></td>
		</tr>
		<tr>
			<td>
      <?php print xarxanet_clean_text_butlleti(strip_tags(preg_replace("[<a]","<a style=\"text-decoration: none; color: #0D75EB;\"",$fields['field_resum_value']->raw),"<a><strong>"))?></td>
		</tr>
	</tbody>
</table>
