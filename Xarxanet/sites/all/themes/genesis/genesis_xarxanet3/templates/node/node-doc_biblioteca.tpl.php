<?php 
// $Id: node.tpl.php,v 1.1.2.8 2009/05/19 00:05:00 jmburnz Exp $

/**
 * @file node.tpl.php
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_user().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Helper variables:
 * - $node_id: Outputs a unique id for each node.
 * - $classes: Outputs dynamic classes for advanced themeing.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see genesis_preprocess_node()
 */
?>
<div id="biblioteca-panel">
	<div class="panel-col-first biblioteca-fitxa">
		
		<!-- CAPÇALERA -->
		<table class='biblioteca-document top'><tr><td>
			<p class="top"><?php echo $node->field_doc_autoria[0]['value']?></p>
			<p>	<?php 
					$tematica = array();
					foreach ($node->field_doc_tematica as $tem) {
						$term = taxonomy_get_term($tem['value']);
						$tematica[$term->weight] = array($term->tid, $term->name);
					}
					ksort($tematica);
					$tem1 = array_pop($tematica);
					$tem2 = array_pop($tematica);
				?>
				<?php echo '<a href="/biblioteca_filtre?field_doc_tematica_value='.$tem1[0].'">'.$tem1[1].'</a>
 				 			> <a href="/biblioteca_filtre?field_doc_tematica_value='.$tem2[0].'">'.$tem2[1].'</a>';?>
 				 <br />
 				 <?php echo '<a href="/biblioteca_filtre?field_doc_tipologia_value='.$node->field_doc_tipologia[0]['value'].'">'.$node->field_doc_tipologia[0]['view'].'</a>' ?>
			</p>
		</td><td>
			<!-- SOCIAL BUTTONS -->
			<table id="social-table"><tr><td>
				<?php print $node->content['service_links']['#value'];?> </div>
			</td></tr><tr><td>
				<?php 
				print $node->content['fb_social_like_widget']['#value'];
				print $node->content['tweetbutton']['#value']; 
				?>
			</td></tr></table>
		</td></tr></table>
		
		<!-- COS -->
		<table class='biblioteca-document'><tr><td class="big_image">
			<?php 
				$filepath = (isset($node->field_doc_imatge[0]['filepath'])) ? $node->field_doc_imatge[0]['filepath'] : '/sites/default/files/biblioteca/doc_base.jpg';
				$basepath = base_path(); 
			?>
			<img src="<?php echo $basepath.$filepath;?>" alt="Portada de <?php echo $title;?>" width="215" />
			<?php print $node->content['fivestar_widget']['#value']; ?>
			
		</td><td class="text">
			<p class="teaser"><?php echo strip_tags($node->field_doc_sinopsi[0]['value']); ?></p>
			<p><b>Paraules clau: </b>
				<?php $tags = taxonomy_node_get_terms($node);
					$tag_str = '';
					foreach ($tags as $tag) {
						if ($tag->vid == 5) $tag_str .= $tag->name.', ';
					}
					if (strlen($tag_str) != 0) echo substr($tag_str, 0, -2);
				?>
			</p>
			<p>
				<b>Informació de publicació</b><br/>
				Lloc: <?php echo $node->field_doc_lloc_publi[0]['value'];?><br/>
				Any: <?php echo $node->field_doc_data_publi[0]['view'];?><br/>
				Editorial: <?php echo $node->field_doc_editorial[0]['view'];?><br/>
				<?php
					$collect = ''; 
					if ($node->field_doc_colleccio[0]['value'] != '') { 
						echo 'Col·lecció o obra general: '.$node->field_doc_colleccio[0]['value'].'<br/>';
						$collect = $node->field_doc_colleccio[0]['value'].'. ';
					}
				?>
				Idioma: <?php echo $node->field_doc_idioma[0]['view'];?>
			</p>
			<p>
				<b>Referència bibliogràfica</b><br/>
				<?php echo $node->field_doc_autoria[0]['value'].'. ('.$node->field_doc_data_publi[0]['view'].'). <i>'.$title.'</i>. '.$collect.$node->field_doc_lloc_publi[0]['value'].': '.$node->field_doc_editorial[0]['view'];?>
			</p>
			<p><b>Visites</b>: <?php $stats = (!is_null(statistics_get($node->nid))) ? statistics_get($node->nid) : 0 ; echo $stats['totalcount']; ?></p>	
		</td></tr></table>
		
		<!-- PEU -->
		<table class='biblioteca-document' id="bilioteca-document-peu"><tr><td class="document">
			<b>Descàrrega directa</b><br/>
			<?php if ($node->field_doc_descarrega[0]['filepath'] != '') { ?>
				<a href="<?php echo $basepath.$node->field_doc_descarrega[0]['filepath'];?>"><img src="/sites/default/files/biblioteca/download.png" alt="Icona de descàrrega" width="50"></a>
			<?php } else { ?>
				<img src="/sites/default/files/biblioteca/download_bn.png" alt="Icona de descàrrega" width="50">
			<?php } ?>
		</td><td class="link">
			<?php 
				$fonts = ($node->field_doc_font[0]['view'] != '') ? $node->field_doc_font[0]['view'] : 'No disponible';
				echo '<b>Descàrrega externa</b><br/>'.$fonts;
			?>
		</td><td class="link">
			<?php
				$fisic = ($node->field_doc_fisic[0]['view'] != '') ? $node->field_doc_fisic[0]['view'] : 'No disponible';
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