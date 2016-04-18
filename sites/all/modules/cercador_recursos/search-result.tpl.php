<li>	
	<div class="news">
	
		<div class="image">
		  <img src="<?php print base_path().$node->field_imatge_petita[0]['filepath']?>" alt="<?php print $node->field_imatge_petita[0]['data']['alt'] ?>" title="<?php print $node->field_imatge_petita[0]['data']['alt']?>">
		</div>
		<div class="info">
		  <h3 class="title"><a href='<?php echo base_path().$node->path?>'><?php echo $node->title ?></a></h3>
		  <div class="text">
			<p><?php echo $node->field_resum[0]['value']?></p>
		  </div>
		</div>
	</div>
	<div class="votes">
		<div class="vote">
		  <?php print($node->value)?>
		 </div>
		 <?php print($fields['value_1']->label)?>
		<strong><?php print $node->content['fivestar_widget']['#value']?></strong>		
	</div>
	
  </li>
  
  