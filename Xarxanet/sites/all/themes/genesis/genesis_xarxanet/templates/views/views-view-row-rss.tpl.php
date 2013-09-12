<?php
/**
 * @file views-view-row-rss.tpl.php
 * Default view template to display a item in an RSS feed.
 *
 * @ingroup views_templates
 */
?>
  <item>
    <title><?php print $title; ?></title>
    <link><?php print $link; ?></link>
<?php $description = html_entity_decode($description); ?>
    <description><?php print "<![CDATA[".$description."]]>"; ?></description>
    <?php print $item_elements; ?>
  </item>
