<?php

/**
 * @file
 * Default print module template
 *
 * @ingroup print
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $head; ?>
    <base href='<?php print $url ?>' />
    <title><?php print $print_title; ?></title>
    <?php print $scripts; ?>
    <?php if (isset($sendtoprinter)) print $sendtoprinter; ?>
    <?php print $robots_meta; ?>
    <?php if (theme_get_setting('toggle_favicon')): ?>
      <link rel='shortcut icon' href='<?php print theme_get_setting('favicon') ?>' type='image/x-icon' />
    <?php endif; ?>
    <?php print $css; ?>
  </head>
<body>		
	<?php if (!empty($message)): ?>
      <div class="print-message"><?php print $message; ?></div><p />
    <?php endif; ?>
    <?php if ($print_logo): ?>
      <div class="print-logo"><?php print $print_logo; ?></div>
    <?php endif; ?>
	<div class="print-site_name"><?php print theme('print_published'); ?></div>
	<p />
	<div class="print-breadcrumb"><?php print theme('print_breadcrumb', array('node' => $node)); ?></div>
	<hr class="print-hr" />
	<div class="print-summary">
		<?php print $node->field_resum['und'][0]['value']; ?>
	</div>
	<hr class="print-hr" />
	<div class="print-content">
		<?php		
			$type = explode('_',$node->type);			
			switch ($type[0]) {
				case 'article':
					print $node->body['und'][0]['value'];
					break;
				case 'opinion':
					print $node->body['und'][0]['value'];
					break;
			}
		?>
	</div>
  </body>
</html>