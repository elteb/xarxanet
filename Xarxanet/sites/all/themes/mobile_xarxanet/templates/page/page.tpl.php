<?php print $doctype."\n"; ?>
<?php 
/**
 * @file page.tpl.php
 * Theme implementation to display a single Drupal page for Genesis Subtheme.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *     least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *     themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *     so on).
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *     for the page.
 * - $section_class: A CSS class that uses .section + the 1st URL argument, allows for
 *     themeing site sections based on path.
 * - $classes: A set of CSS classes (preprocess $body_classes + Genesis custom classes).
 *     This contains flags indicating the current layout (multiple columns, single column),
 *     the current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *     when linking to the front page. This includes the language domain or prefix.
 * - $site_logo: The preprocessed $logo varaible. Includes the path to the logo image,
 *     as defined in theme configuration and wrapped in an anchor linking to the homepage.
 * - $site_name: The name of the site (preprocessed) wrapped in an anchor linking to the homepage.
 *     Empty when display has been disabled in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *     in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *     in theme settings.
 *
 * Navigation:
 * - $primary_menu: The preprocessed $primary_links (array), an array containing primary
 *     navigation links for the site, if they have been configured.
 * - $secondary_menu: The preprocessed $secondary_links (array), an array containing secondary
 *     navigation links for the site, if they have been configured.
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $leaderboard: Custom region for displaying content at the top of the page, useful
 *     for displaying a banner.
 * - $header: The header blocks region for display content in the header.
 * - $secondary_content: Full width custom region for displaying content between the header
 *     and the main content columns.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $content_top: A custom region for displaying content above the main content.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *     and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $content_bottom: A custom region for displaying content above the main content.
 * - $left: Region for the left sidebar.
 * - $right: Region for the right sidebar.
 * - $tertiary_content: Full width custom region for displaying content between main content
 *   columns and the footer.
 *
 * Footer/closing data:
 * - $footer : The footer regioin.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $closure: Final closing markup from any modules that have altered the page.
 *     This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see genesis_preprocess_page()
 */
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<head>
		<meta name="HandheldFriendly" content="true" />
		<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />
		<title><?php print $head_title; ?></title>
		<?php print $styles; ?>
		<link rel="apple-touch-icon-precomposed" href="/<?php print path_to_theme()?>/images/icon-xarxanet.png" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="/<?php print path_to_theme()?>/includes/bookmark_bubble.js"></script>		
	</head>
	
	<body class="<?php print $body_classes; ?>">
	<div id="container" >
		<div id="header">
			<a name="header"></a>
			<div id="logo">
				<a href="/mobile-frontpage"><img src="/<?php print path_to_theme()?>/images/logo-xarxanet-org.png" alt="logo xarxanet" /></a>
			</div>
			<div id="menu-tab">
				Menú
			</div>
			<div id="nothing" ></div>
		</div>
		<div id="menu">	
			<?php
				$i = 0;
				print "<div id='menu-left'><div class='menu-box' id='menu-box-{$i}'>";
				foreach ($mobile_menu as $item) {
					if ($item['attributes']['title'] == 'title') {
						$i++;
						print "</div>";
						if ($i == 2) print "</div><div id='menu-right'>"; 
						print "<div class='menu-box' id='menu-box-{$i}'>";
 						print "<div class='menu-item-title'>{$item['title']}</div>";
					} else {
						print "<div class='menu-item' id='{$item['attributes']['title']}'>
									<a href='/{$item['href']}'>{$item['title']}</a>
								</div>";
 					}
				}
				print "</div></div>";
			?>
			<div id="nothing"></div>
		</div>
		<!-- 
		<div id="app-banner">
			<div id="app-images">
				<img src="/<?php print path_to_theme()?>/images/pictos/android.png" alt="Android logo"/>
				<img src="/<?php print path_to_theme()?>/images/pictos/ios.png" alt="Apple logo" />
			</div>
			<div id="app-text">Descarrega't l'App de Xarxanet.org</div>
		</div>
		-->
		<div id="content">
			<div class="page-title"><?php print $title; ?></div> 
			<?php print $content; ?>
		</div>
		<div id="footer">
			<div id="first-line">
				<a id="classica" href="http://www.xarxanet.org">Mostra la pàgina clàssica</a>
				<a id="top" href="#header">Torna a dalt</a>
				<div id="nothing"></div>
			</div>
			<div id="second-line">
				<div class="item">Segueix-nos
					<div id="social-icons">
						<a href="http://www.facebook.com/xarxanet"><img src="/<?php print path_to_theme()?>/images/fb-icon.png" alt="icona facebook" /></a>
						<a href="http://twitter.com/xarxanetorg"><img src="/<?php print path_to_theme()?>/images/twitter-icon.png" alt="icona facebook" /></a>
					</div>
				</div>
				<div class="item" ><a href="contacte">Contacte</a></div>
				<div class="item"><a href="sobre-el-projecte">Sobre el projecte</a></div>
				<div class="item"><a href="avis-legal">Avís legal</a></div>
				<div id="nothing"></div>
			</div>
			<div id="third-line">
				<span>Xarxanet.org és un projecte de:</span>
				<div class="logo-gene">
					<a href="http://www.gencat.cat/benestar">
						<img src="/<?php print path_to_theme()?>/images/logo-generalitat.png" alt="Logo Benestar Social i Família" />
					</a>
				</div>
			</div>
		</div>
		
		<script>
			$( "#menu-tab" ).click(function() {
				$("#menu").slideToggle("300");
			});
			
			$( document ).ready(function() {
				if ($('body').hasClass('page-mobile-frontpage')) {
					//$( "#app-banner" ).fadeIn( 300 ).delay( 15000 ).fadeOut( 300 );
					
					var bubble = new google.bookmarkbubble.Bubble();
				    var parameter = 'bmb=1';

				    bubble.hasHashParameter = function() {
				      return window.location.hash.indexOf(parameter) != -1;
				    };

				    bubble.setHashParameter = function() {
				      if (!this.hasHashParameter()) {
				        window.location.hash += parameter;
				      }
				    };
				    bubble.showIfAllowed();
			    }
			});

			$( "#app-banner" ).click(function() {
				alert('hola');
			});
		</script>
	</div>
	</body>
</html>