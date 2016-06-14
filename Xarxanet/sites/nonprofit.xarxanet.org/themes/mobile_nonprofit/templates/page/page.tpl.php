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
		<title><?php print $title; ?></title>
		<?php print $styles; ?>
		<link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="/<?php print path_to_theme()?>/images/icon-nonprofit.png">
		<link rel="apple-touch-icon-precomposed" href="/<?php print path_to_theme()?>/images/icon-nonprofit.png" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="/<?php print path_to_theme()?>/includes/bookmark_bubble.js"></script>		
	</head>
	
	<body class="<?php print $body_classes; ?>">
	<div id="container" >
		<div id="header">
			<a name="header"></a>
			<div id="logo">
				<a href="/mobile-frontpage"><img src="/<?php print path_to_theme()?>/images/logo-nonprofit.jpg" alt="logo xarxanet" /></a>
			</div>
			<div id="menu-tab">
				Menu
			</div>
			<div id="nothing" ></div>
		</div>
		<div id="menu">	
			<?php
				$i = 0;
				print "<div id='menu-left'><div class='menu-box'>";
				foreach ($mobile_menu as $key => $item) {
					$url = (strpos($item['href'], "http") === false) ? '/'.$item['href'] : $item['href'];
					print "	<div class='menu-item' id='{$item['attributes']['title']}'>
								<a href='{$url}'>{$item['title']}</a>
							</div>";
 					if ($i == 3) print "</div></div><div id='menu-right'><div class='menu-box'>";
 					$i++;
				}
				print "</div></div>";
			?>
			<div id="nothing"></div>
		</div>
		<div id="content">
			<div class="page-title"><?php print $title; ?></div> 
			<?php
				print render($page['content']);
			?>
		</div>
		<div id="footer">
			<div id="first-line">
				<a id="classica" href="/mobile-switcher/desktop">View desktop version</a>
				<a id="top" href="#header">Go to top</a>
				<div id="nothing"></div>
			</div>
			<div id="second-line">
				<div class="item"><div>Follow us</div>
					<div id="social-icons">
						<a href="http://twitter.com/nonprofit_cat"><img src="/<?php print path_to_theme()?>/images/twitter-icon.png" alt="twitter icon" /></a>
					</div>
				</div>
				<div class="item" ><a href="contact-us">Contact us</a></div>
				<div class="item"><a href="about-nonprofit">About us</a></div>
				<div class="item"><a href="legal-terms">Legal terms</a></div>
				<div id="nothing"></div>
			</div>
			<div id="third-line">
				<span>Nonprofit.xarxanet.org is a project of:</span>
				<div class="logo-gene">
					<a href="http://benestar.gencat.cat">
						<img src="/<?php print path_to_theme()?>/images/logo-generalitat.png" alt="Logo Benestar Social i Família" />
					</a>
				</div>
				<div class="logo-xn">
					<a href="http://xarxanet.org">
						<img src="/<?php print path_to_theme()?>/images/logo-xarxanet-org.png" alt="Logo Benestar Social i Família" />
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