<?php
  $node = $content['field_contingut']['#object']->field_contingut['und'][0]['nid'];
  $node = node_load($node);
  $autor = $node->field_autor_a['und'][0]['nid'];
  $autor = node_load($autor);
  $autor = $autor->title;
?>

<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pdng_mdl">
    <div class="modul_2x1">
      <div style="">Opinió</div>
      <div class="cont_titular_entradeta">
    <?php
      print "<h4>" . $node->title . "</h4>";
      print $node->field_resum['und'][0]['value'];
    ?>
      </div>
      <div style="border:solid 1px #aa0000;"><?php print $autor; ?></div>
    </div>
  </div>
</div>
