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
          <img src="<?php print base_path().$field_imatge_petita[0]['filepath'] ?>" alt="<?php print $field_imatge_petita[0]['data']['alt'] ?>" title="<?php print $field_imatge_petita[0]['data']['alt'] ?>"/>
          <p class="legend"><?php print $field_imatge_petita[0]['data']['alt']?></p>
        </div>
        <div class="text">
          <?php print $field_resum[0]['value'] ?>
        </div>
      </div> <!-- .e_intro -->
	  
<div class="e_text">
 <?php print $node->content['body']['#value']?>
<a name="tornar"></a>
 <ol class="sections">

 <?php $i=0?>
<?php foreach($node->field_subtitols as $titol):?>
		<?php if ($titol['value']!=''): ?>
		<li><a href="#<?php print ($i+1)?>"><?php print $titol['value']?></a></li>
		<?php $i++?>
		<?php endif ?>
<?php endforeach;?>
</ol>

<?php $i=0;?>
<?php foreach($node->field_continguts as $contingut):?>
<?php if ($contingut['value']!=''): ?>
<h3 class="label"><a name="<?php print ($i+1)?>"><?php print ($i+1).". ".$node->field_subtitols[$i]['value']?></a></h3>
       <p><?php print $contingut['value']?></p>
	<?php $i++;?>
	<p><a href="#tornar">Tornar a l'&iacute;ndex</a></p>
	<?php endif ?>
	<?php endforeach;?>
	</div>
	
	<div class="e_share">
		<h2 class="label">Comparteix</h2>	
		<div id="service-links">
			<?php print $node->content['service_links']['#value']?>
		</div>
	</div>
	<?php global $rel_node?>

  <?php $i=0; ?>
  <?php $search_string = NULL; ?>
  <?php if(!empty($node->tags[1])): ?>
    <?php foreach($node->tags[1] as $tag): ?>
      <?php if($i<2): ?>
        <?php $search_string .= $tag->name." "; ?>
        <?php $i++; ?>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>
	<?php $rel_node = theme('sidebar_recurs', $node->field_autor[0]['view'], $node->field_links, $links, $node->content['fivestar_widget']['#value'], $field_imatges,$search_string,$node->name,$node->nid)?>

