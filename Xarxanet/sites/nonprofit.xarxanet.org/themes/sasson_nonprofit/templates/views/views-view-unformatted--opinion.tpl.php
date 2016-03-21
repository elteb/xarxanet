<?php
// $Id: views-view-unformatted.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php
$itRow = 1;
foreach ($rows as $id => $row):  ?>
<?php if ($itRow == 1) print '<div id="left-column">'; ?>
  <div class="<?php print $classes_array[$id] . " views-row-clear-" .($itRow - 1) % 3 ?> ">
    <?php print $row; ?>
  </div>
<?php if($itRow == 2) print '</div>'; ?>
<?php
$itRow++;
endforeach; ?>
