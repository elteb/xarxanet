<?php

/**
 * @file
 * Default print module template
 *
 * @ingroup print
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $print['language']; ?>" xml:lang="<?php print $print['language']; ?>">
  <head>
    <?php print $print['head']; ?>
    <?php print $print['base_href']; ?>
    <title><?php print $print['title']; ?></title>
    <?php print $print['scripts']; ?>
    <?php print $print['sendtoprinter']; ?>
    <?php print $print['robots_meta']; ?>
    <?php print $print['favicon']; ?>
    <?php print $print['css']; ?>
  </head>
  <body>
    <?php if (!empty($print['message'])) {
      print '<div class="print-message">'. $print['message'] .'</div><p />';
    } ?>
    <div class="print-logo"><img src="/sites/all/themes/genesis/genesis_xarxanet/images/header-logo-xarxanet.gif" /></div>
 
    <p />
    <div class="print-breadcrumb"><?php print $print['breadcrumb']; ?></div>
    <hr class="print-hr" />
    <h1 class="print-title"><?php print $node->title; ?></h1>
<?php 
$contingut= strip_selected_tags_by_id_or_class(array("tweetbutton"), $node->content['body']['#value']); ?>

	
 <div class="print-content">
	<div style="font-size:1.1em; font-family:Georgia,'Times New Roman',Times,serif;">
		<?php print $node->field_resum[0]['value']; ?>
	</div>

<small>
<div><?php print format_date($node->created, "custom", "d/m/Y - H:i"); ?></div>
<div><strong>Autor:</strong> <?php print $node->field_autor_noticies[0]['value']; ?></div>
<?php 
		$valor=false;
		foreach ((array)$node->field_entitat as $item) { 
		if ($item['view']) $valor=true;
		} ?>
		<?php if ($valor){ ?>
			<div><strong>Entitat redactora:</strong> 
			    <?php foreach ((array)$node->field_entitat as $item) { ?>
			     <?php print $item['view']." "; ?> 
			    <?php } ?>
			</div>
		<?php } ?>
</small>

	<div style="font-family:Arial,Helvetica,sans-serif; font-size:1em;">
		<?php 
		$valor=false;
		foreach ((array)$node->field_agenda_imatge as $item) { 
		if ($item['filepath']) $valor=true;
		} ?>
		<?php if ($valor){ ?>
			    <?php foreach ((array)$node->field_agenda_imatge as $item) { ?>
			      <?php print theme_image($item['filepath'], $alt = '', $title = '', array('width'=>'377px', 'height'=>'auto', 'style'=>'width:377px; height:auto; float:left; margin-right:10px; margin-bottom:10px;'), FALSE); ?>
			    <?php } ?>
		<?php } ?>


		<?php print $contingut; ?>


		<?php 
		$valor=false;
		foreach ((array)$node->field_file as $item) { 
		if ($item['filepath']) $valor=true;
		} ?>
		<?php if ($valor){ ?>
  		<h3 class="field-label">Fitxers Adjunts</h3>
			    <?php foreach ((array)$node->field_file as $item) { ?>
				<div class="field-item"><?php print $item['view'] ?></div>
			    <?php } ?>
		<?php } ?>




  <div class="field-items" style="clear:both;">
    <?php foreach ((array)$node->field_imatges as $item) { ?>
      <div class="field-item" style="float:left; margin-right:10px; margin-bottom:10px;"><?php print $item['view'] ?></div>
    <?php } ?>
  </div>
  <div class="field-items" style="clear:both;"></div>

	</div>
</div>
    <hr class="print-hr" />
    <div class="print-source_url"><?php print $print['source_url']; ?></div>

  </body>
</html>
