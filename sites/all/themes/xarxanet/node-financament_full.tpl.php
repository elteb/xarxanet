<?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('No publicat'); ?></div>
  <?php endif; ?>
<div class="sub"><?php print format_date($node->changed, 'small'); ?></div> 

  <div id="social-links" style="width: 100%; float: left;">
  <?php print $node->content['tweetbutton']['#value']; ?>
 <?php print $node->content['fb_social_like_widget']['#value']; ?>
  </div>
  <div></div>
<?php if(sizeof($terms)>0): ?>

 <div class="e_tags">
   <h2 class="title">Tags</h2>
        <?php print $terms; ?>
        
      </div> <!-- .e_tags -->
<?php endif?>

      <div class="e_intro">
        <div class="image">
          <img src="<?php print base_path().$field_imatge_petita[0]['filepath'] ?>" alt="<?php print $field_imatge_petita[0]['data']['alt'] ?>" title="<?php print $field_imatge_petita[0]['data']['alt'] ?>" />
          <p class="legend"><?php print $field_imatge_petita[0]['data']['alt']?></p>
        </div>
        <div class="text">
          <?php print $field_resum[0]['value'] ?>
        </div>
      </div> <!-- .e_intro -->

      <div class="e_text">
        <?php if($field_convocant[0]['view']):?>
			<p><b>Convocant:</b></p>
			<p><?php print $field_convocant[0]['view'] ?></p>
		<?php endif?>
		
		<?php if($field_finfull_data_publicacio[0]['view']):?>
			<p><b>Data publicació:</b></p>
			<p><?php print $field_finfull_data_publicacio[0]['view'] ?></p>
		<?php endif?>
		
		<?php if($field_date[0]['view']):?>
			<p><b>Termini:</b></p>
			<p><?php print $field_date[0]['view'] ?></p>
		<?php endif?>
		
		<?php if($node->content['body']['#value']):?>
			<p><b>Contingut:</b></p>
			<p><?php print $node->content['body']['#value']?></p>
		<?php endif?>
		
		<?php if($field_finfull_ambit[0]['view']):?>
			<p><b>Àmbit:</b></p>
			<ul><?php  foreach($field_finfull_ambit as $field) print "<li>".$field['view']."</li>" ?></ul>
		<?php endif?>
		
		<?php if($field_finfull_tipus[0]['view']):?>
			<p><b>Tipus:</b></p>
			<ul><?php  foreach($field_finfull_tipus as $field) print "<li>".$field['view']."</li>" ?></ul>
		<?php endif?>
		
		<?php if($field_finfull_publicprivat[0]['view']):?>
			<p><b>Public/Privat:</b></p>		
			<ul><li><?php print $field_finfull_publicprivat[0]['view'] ?></li></ul>
		<?php endif?>
		
		<?php if($field_finfull_ambit_geo[0]['view']):?>
			<p><b>Àmbit geogràfic:</b></p>
			<ul><?php  foreach($field_finfull_ambit_geo as $field) print "<li>".$field['view']."</li>" ?></ul>
		<?php endif?>
		
		<?php if($field_finfull_bases[0]['view']):?>
			<p><b>Bases:</b></p>
			<ul><?php  foreach($field_finfull_bases as $field) print "<li>".$field['view']."</li>" ?></ul>
		<?php endif?>
		
		<?php if((sizeof($field_file)>0)&&($field_file[0]['view']!="")):?>
		<div class="e_files">
		<h2 class="title"><?php print("Fitxer adjunts")?></h2>
		<?php foreach($field_file as $adjunt): ?>
			<?php print $adjunt['view'];;?>
		<?php endforeach;?>
		</div>
		<?php endif;?>
      </div> <!-- .e_text -->
	  
		
	  
	 <div class="e_share">
		<h2 class="label">Comparteix</h2>	
		<div id="service-links">
			<?php print $node->content['service_links']['#value']?>
		</div>
	</div>