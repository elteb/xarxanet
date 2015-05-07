<?php 
/**
* @file
* Default theme implementation to display a node.
*
* Available variables:
* - $title: the (sanitized) title of the node.
* - $content: An array of node items. Use render($content) to print them all,
* or print a subset such as render($content['field_example']). Use
* hide($content['field_example']) to temporarily suppress the printing of a
* given element.
* - $user_picture: The node author's picture from user-picture.tpl.php.
* - $date: Formatted creation date. Preprocess functions can reformat it by
* calling format_date() with the desired parameters on the $created variable.
* - $name: Themed username of node author output from theme_username().
* - $node_url: Direct URL of the current node.
* - $display_submitted: Whether submission information should be displayed.
* - $submitted: Submission information created from $name and $date during
* template_preprocess_node().
* - $classes: String of classes that can be used to style contextually through
* CSS. It can be manipulated through the variable $classes_array from
* preprocess functions. The default values can be one or more of the
* following:
* - node: The current template type; for example, "theming hook".
* - node-[type]: The current node type. For example, if the node is a
* "Blog entry" it would result in "node-blog". Note that the machine
* name will often be in a short form of the human readable label.
* - node-teaser: Nodes in teaser form.
* - node-preview: Nodes in preview mode.
* The following are controlled through the node publishing options.
* - node-promoted: Nodes promoted to the front page.
* - node-sticky: Nodes ordered above other non-sticky nodes in teaser
* listings.
* - node-unpublished: Unpublished nodes visible only to administrators.
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
*
* Other variables:
* - $node: Full node object. Contains data that may not be safe.
* - $type: Node type; for example, story, page, blog, etc.
* - $comment_count: Number of comments attached to the node.
* - $uid: User ID of the node author.
* - $created: Time the node was published formatted in Unix timestamp.
* - $classes_array: Array of html class attribute values. It is flattened
* into a string within the variable $classes.
* - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
* teaser listings.
* - $id: Position of the node. Increments each time it's output.
*
* Node status variables:
* - $view_mode: View mode; for example, "full", "teaser".
* - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
* - $page: Flag for the full page state.
* - $promote: Flag for front page promotion state.
* - $sticky: Flags for sticky post setting.
* - $status: Flag for published status.
* - $comment: State of comment settings for the node.
* - $readmore: Flags true if the teaser content of the node cannot hold the
* main body content.
* - $is_front: Flags true when presented in the front page.
* - $logged_in: Flags true when the current user is a logged-in member.
* - $is_admin: Flags true when the current user is an administrator.
*
* Field variables: for each field instance attached to the node a corresponding
* variable is defined; for example, $node->body becomes $body. When needing to
* access a field's raw values, developers/themers are strongly encouraged to
* use these variables. Otherwise they will have to explicitly specify the
* desired field language; for example, $node->body['en'], thus overriding any
* language negotiation rule that was previously applied.
*
* @see template_preprocess()
* @see template_preprocess_node()
* @see template_process()
*
* @ingroup themeable
*/

?>
<div id="biblioteca-panel">
	<div class="panel-col-first biblioteca-fitxa">
		
		<!-- CAPÇALERA -->
		<table class='biblioteca-document top'><tr><td>
			<p class="top"><?php echo $node->field_doc_autoria['und'][0]['value']?></p>
			<p>	<?php 
					$tem1 = $node->field_doc_tematica['und'][0]['taxonomy_term']->name;
					$tem2 = $node->field_doc_tematica['und'][1]['taxonomy_term']->name;
					$tipo = $node->field_doc_tipologia['und'][0]['taxonomy_term']->name;
				?>
				<?php echo '<a href="/biblioteca_filtre?field_doc_tematica_value='.str_replace(' ', '+',$tem1).'">'.$tem1.'</a>
 				 			> <a href="/biblioteca_filtre?field_doc_tematica_value='.str_replace(' ', '+',$tem2).'">'.$tem2.'</a>';?>
 				 <br />
 				 <?php echo '<a href="/biblioteca_filtre?field_doc_tipologia_value='.str_replace(' ', '+',$tipo).'">'.$tipo.'</a>' ?>
			</p>
		</td><td>
			<!-- SOCIAL BUTTONS -->
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c67bc259a068b5"></script>
            <div class="node-social-links">
              <div class="addthis_sharing_toolbox"></div>
            </div>
		</td></tr></table>
		
		<!-- COS -->
		<table class='biblioteca-document'><tr><td class="big_image">
			<?php
				$image = field_get_items('node', $node, 'field_doc_tipologia');
				$imagepath = (!empty($node->field_doc_imatge['und'])) ? file_create_url($node->field_doc_imatge['und'][0]['uri']) : base_path().'/sites/default/files/biblioteca/doc_base.jpg';
			?>
			<img src="<?php echo $imagepath;?>" alt="Portada de <?php echo $title;?>" width="215" />
			<?php print $node->content['fivestar_widget']['#value']; ?>
			
		</td><td class="text">
			<p class="teaser"><?php echo strip_tags($node->field_doc_sinopsi['und'][0]['value']); ?></p>
			 <?php 
			 	if(!empty($node->taxonomy_vocabulary_5['und'])) {
                	echo '<p><b>Paraules clau: </b>';
                	$tag_str = '';
                   	foreach($node->taxonomy_vocabulary_5['und'] as $tag) {
						$tag_str .= ucfirst($tag['taxonomy_term']->name).', '; 
					}
					echo substr($tag_str, 0, -2).'</p>';
            	}
            ?>
			<p>
				<b>Informació de publicació</b><br/>
				Lloc: <?php echo $node->field_doc_lloc_publi['und'][0]['value'];?><br/>
				Any: <?php echo $node->field_doc_data_publi['und'][0]['value'];?><br/>
				Editorial: <?php echo $node->field_doc_editorial['und'][0]['taxonomy_term']->name;?><br/>
				<?php
					$collect = ''; 
					if ($node->field_doc_colleccio['und'][0]['value'] != '') { 
						echo 'Col·lecció o obra general: '.$node->field_doc_colleccio['und'][0]['value'].'<br/>';
						$collect = $node->field_doc_colleccio['und'][0]['value'].'. ';
					}
				?>
				Idioma: <?php echo $node->field_doc_idioma['und'][0]['taxonomy_term']->name;?>
			</p>
			<p>
				<b>Referència bibliogràfica</b><br/>
				<?php echo $node->field_doc_autoria['und'][0]['value'].'. ('.$node->field_doc_data_publi['und'][0]['value'].'). <i>'.$title.'</i>. '.$collect.$node->field_doc_lloc_publi['und'][0]['value'].': '.$node->field_doc_editorial['und'][0]['taxonomy_term']->name;?>
			</p>
			<p><b>Visites</b>: 
				<?php
				 if (strpos(google_analytics_counter_display(), '></span>')  === FALSE)
					echo google_analytics_counter_display();
				else
					echo 0;
				?>
			</p>
		</td></tr></table>
		
		<!-- PEU -->
		<table class='biblioteca-document' id="bilioteca-document-peu"><tr><td class="document">
			<b>Descàrrega directa</b><br/>
			<?php if (!empty($node->field_doc_descarrega['und'])) { ?>
				<a href="<?php echo file_create_url($node->field_doc_descarrega['und'][0]['uri']);?>" onClick="_gaq.push(['_trackEvent', 'Descàrregues Biblioteca','Descàrrega de: <?php echo $tipo;?>','<?php echo $node->title;?>']);"><img src="/sites/default/files/biblioteca/download.png" alt="Icona de descàrrega" width="50"></a>
			<?php } else { ?>
				<img src="/sites/default/files/biblioteca/download_bn.png" alt="Icona de descàrrega" width="50">
			<?php } ?>
		</td><td class="link">
			<?php 
				$fonts = ($node->field_doc_font['und'][0]['url'] != '') ? '<a href="'.$node->field_doc_font['und'][0]['url'].'">'.$node->field_doc_font['und'][0]['title'].'</a>' : 'No disponible';
				echo '<b>Descàrrega externa</b><br/>'.$fonts;
			?>
		</td><td class="link">
			<?php
				$fisic = ($node->field_doc_fisic['und'][0]['url'] != '') ? '<a href="'.$node->field_doc_fisic['und'][0]['url'].'">'.$node->field_doc_fisic['und'][0]['title'].'</a>' : 'No disponible';
				echo '<b>Disponibilitat en paper</b><br/>'.$fisic;
			?>
		</td></tr></table>
		
	</div>
	<div class="panel-col-last">
		<?php   		
		$display = panels_load_display(5);
		print(panels_render_display($display));
		?>
	</div>
</div>