<div id="total-parts">
  <strong><?php print t("Nombre d'usuaris subscrits a l'Abast",array(),'ca'); ?></strong>: <?php print $abast; ?>
</div><br/>
<div id="total-butlleti">
  <strong><?php print t("Nombre d'usuaris subscrits al Butlletí",array(),'ca'); ?></strong>: <?php print $butlleti; ?>
</div><br/>
<ul id="total-parts">
<?php foreach($parts as $key => $part): ?>
  <li><strong><?php print $key; ?></strong>: <?php print $part; ?><br/></li>
<?php endforeach; ?>
</ul>
