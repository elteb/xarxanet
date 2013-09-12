<?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('No publicat'); ?></div>
  <?php endif; ?>
<div class="sub"><?php print $data[0]['view'];?></div>  

  <div id="social-links" style="width: 100%; float: left;">
  <?php print $twitter; ?>
  <?php print $facebook; ?>
  </div>
  <div></div>
<div class="type">
	<span class="label2"> <?php print $tipus; ?></span>
</div>
<?php if(sizeof($terms)>0): ?>

 <div class="e_tags">
   <h2 class="title">Tags</h2>
        <?php print $terms; ?>
        
      </div> <!-- .e_tags -->
<?php endif?>

      <div class="e_intro">
        <div class="image">
          <img src="<?php print $imatge_petita ?>" alt="<?php print $imatge_petita_alt ?>" />
          <p class="legend"><?php print $imatge_petita_alt?></p>
        </div>
        <div class="text">
          <?php print $resum ?>
        </div>
      </div> <!-- .e_intro -->

      <div class="e_text">
        <?php print $contingut?>
        <div class="e_moreinfo">
          <strong><a href="<?php if(substr($enllac,0,7) === 'http://'){ print $enllac;}else{ print "http://".$enllac;} ?>">Més informació.</a></strong>
        </div>
      </div> <!-- .e_text -->

	<div class="e_text">
		<h2 class="label"><?php print utf8_encode(t("Dades organitzador"))?></h2>
		<p>
		<?php print $organitzador ?><br/>
		<?php print $adreca_org ?><br/>
		<?php print $telefon ?><br/>
		<?php print $correu ?><br/>		
		<?php print $web ?><br/>	
		</p>
	</div>
	<div class="e_share">
		<h2 class="label">Comparteix</h2>	
		<div id="service-links">
			<?php print $service_links?>
		</div>
	</div>
	<?php global $rel_node?>
	<?php $rel_node = theme('sidebar_event',$adreca,$organitzador, $ambits, $mapa, $links)?>
