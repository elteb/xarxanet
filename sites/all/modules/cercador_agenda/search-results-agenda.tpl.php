<li> 
	<div class="news">
	
		<div class="image">
		  <img src="<?php print base_path().$node->field_imatge_petita[0]['filepath']?>" alt="<?php print $node->field_imatge_petita[0]['data']['alt'] ?>" title="<?php print $node->field_imatge_petita[0]['data']['alt']?>">
		</div>
		<div class="info">
		  <h3 class="title"><a href='<?php echo base_path().$node->path?>'><?php echo $node->title ?></a></h3>
      <?php if(date('d/m/Y',strtotime($node->field_date_event[0]['value'])) == date('d/m/Y',strtotime($node->field_date_event[0]['value2']))): ?>
        <span class="date"><?php print date('d/m/Y - G:i',strtotime($node->field_date_event[0]['value']))." - ".date('G:i',strtotime($node->field_date_event[0]['value2'])) ?></span>
      <?php else: ?>
        <span class="date"><?php print date('d/m/Y - G:i',strtotime($node->field_date_event[0]['value']))." - ".date('d/m/Y - G:i',strtotime($node->field_date_event[0]['value2']))?></span>
      <?php endif; ?>
		  <div class="text">
			<p><?php echo $node->field_resum[0]['value']?></p>
		  </div>
		</div>
	</div>
  </li>