	<?php
// $Id: page.tpl.php,v 1.14.2.6 2009/02/13 16:28:33 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The xarxanet URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 * - $body_classes_array: An array of the body classes. This is easier to
 *   manipulate then the string in $body_classes.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
<?php print $head ?>
<link rel="alternate" type="application/rss+xml" title="Feed RSS" href="http://www.xarxanet.org/rss_social" />
  <title><?php print $head_title; ?></title>
  <title>Xarxanet</title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>

<body class="l_ca t_03 h_03 p_00">

<ul id="quicknav">
  <li><a href="#content">Salta a contingut</a></li>
  <li><a href="#nav">Salta a navegació</a></li>
  <li><a href="#footer">Salta a peu de pàgina</a></li>
</ul>

<div id="page">
	<div id="header">

		<div id="logo">
			<a href="<?php print base_path()?>"><img src="<?php echo  base_path() . path_to_theme();?>/img/hdr03_logo.jpg" alt="xarxanet.org - Xarxa associatius i de voluntariat de Catalunya" /></a>
		</div>
		
    <?php include 'bloc_cerca.html'; ?>
	
	<div id="auxnav">
      <ul class="menu">
        <li class="first"><a target="_blank" href="http://bloc.xarxanet.org/"><?php print t(utf8_encode("Bloc Xarxanet"))?></a></li>
        <li><a target="_blank" href="http://www.voluntariat.org"><?php print t(utf8_encode("Voluntariat.org"))?></a></li>
        <li><a target="_blank" href="http://blocs.xarxanet.org"><?php print t(utf8_encode("Blocs d'entitats"))?></a></li>
      </ul>
    </div> <!-- #auxnav -->
  </div> <!-- #header -->
  
	
<div id="info">
    <div id="crumbs">
    		<?php print $breadcrumb;?>
    </div> <!-- #crumbs -->
         <?php if($header): ?>
     <div id="propi-header">
        <?php print $header; ?>
     </div>
     <?php endif; ?>
	<div class="intro">
		<h1 class="title"><?php print $title; ?></h1>
    </div>
  </div> <!-- #info -->
  
	 <div id="content">

	<?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
		
		<div class="main">
<?php print $messages?>
<?php if ($content_pretop): ?>
          
             <div>
            <?php print $content_pretop; ?>
          </div>
          
        <?php endif; ?>
		<?php if ($content_top): ?>
          <div class="e_highlight">
            <?php print $content_top; ?>
          </div>
        <?php endif; ?>
			<?php print $content; ?>
		</div> <!-- .main -->
	
	    <div class="rel">
       <?php print $right_top ?>
			 <?php global $rel_node?>
			 <?php print $rel_node?>
       <?php print $right ?>
    </div> <!-- .rel -->
	
	
	</div> <!-- #content -->
	
	
	<div id="nav">
    <img id="logo_benestar" src="<?php echo  base_path() . path_to_theme();?>/img/dept_ben_fam.gif"/>
		<?php print $left; ?>
		
		
	</div> <!-- #nav -->
<div id="footer">
    <?php include 'menu_inferior.html'; ?>

    <div class="copyright">
      <div class="scv">
        <a href="http://www.voluntariat.org" rel="external"><img src="<?php echo  base_path() . path_to_theme();?>/img/ftr_scv.gif" alt="Servei Català de Voluntariat" /></a>
      </div>
      <div class="gencat">
<a href="http://www.gencat.cat/benestar/" rel="external"><img src="<?php echo  base_path() . path_to_theme();?>/img/ftr_sac.gif" alt="Generalitat de Catalunya. Departament de Benestar Social i Família" /></a>
      </div>
    </div>
    <div class="by_equilibri" style="text-align: center; clear: both;"><a href="http://www.fundacioequilibri.org" title="<?php print t(utf8_encode("Fundació Equilibri")); ?>">Desenvolupament web</a></div>
  </div> <!-- #footer -->
<?php print $closure?>
</div> <!-- #page -->

</body>
</html>
	

