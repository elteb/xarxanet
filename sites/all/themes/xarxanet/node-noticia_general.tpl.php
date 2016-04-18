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
          <img src="<?php print base_path().$field_imatge_petita[0]['filepath'] ?>" alt="<?php print $field_imatge_petita[0]['data']['alt']  ?>"  title="<?php print $field_imatge_petita[0]['data']['alt']  ?>"/>
          <p class="legend"><?php print $field_imatge_petita[0]['data']['alt']?></p>
        </div>
        <div class="text">
          <?php print $field_resum[0]['value'] ?>
        </div>
      </div> <!-- .e_intro -->

      <div class="e_text">
        <?php print $node->content['body']['#value']?>
		
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
  <?php $i=0; ?>
  <?php $search_string = NULL; ?>
  <?php if(!empty($node->tags[1])): ?>
    <?php foreach($node->tags[1] as $tag): ?>
      <?php print $tag->name; ?>
      <?php if($i<2): ?>
        <?php $search_string .= $tag->name." "; ?>
        <?php $i++; ?>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>
	<?php global $rel_node?>
	<?php $rel_node = theme('sidebar_noticia', ($node->field_autor_noticies[0]['value']!="")?$node->field_autor_noticies[0]['value']:$node->name, $field_imatges, $links, $field_entitat, $search_string, $node->name, $node->nid)?>