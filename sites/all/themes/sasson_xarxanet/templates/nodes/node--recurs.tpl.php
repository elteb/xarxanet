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


<article id="<?php print $node_id; ?>" class="<?php print $classes; ?>">
    <div class="node-inner">
        <div class="node-column-images">
            <?php if(!empty($node->field_imatges['und'])): ?>
                <div class="node-image">
                    <ul class="items">
						<?php foreach($node->field_imatges['und'] as $imatge): ?>
                            <li>
                              <?php
                                $peu = ($node->field_peu_de_foto['und'][$key]['value'] && ($node->field_peu_de_foto['und'][$key]['value']!='--Peu de foto--')) ? $node->field_peu_de_foto['und'][$key]['value'] : $imatge['field_file_image_alt_text']['und'][0]['value'];
                                if($imatge['field_autoria']) $peu .= ' - Font: '.$imatge['field_autoria']['und'][0]['value'];
                							  echo '<a href="'.file_create_url($imatge['uri']).'" rel="lightbox" title="'.$peu.'">'.
                								theme_image_style (array('style_name' => 'imatge-article', 'path' => $imatge['uri'], 'title' => $peu, 'alt' => $imatge['alt'])).
                								'</a>';
                                echo '<div class="legend"><p>'.$peu.'</p></div>';
                              ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php
            if(!empty($node->taxonomy_vocabulary_1['und'])): ?>
                <div class="node-terms">
                    <h2>Tags</h2>
                    <ul class="links tags" role="navigation">
                    <?php
						foreach($node->taxonomy_vocabulary_1['und'] as $tag) {;
						    echo '<li>'.l( ucfirst($tag['taxonomy_term']->name), 'etiquetes/general/'.str_replace(' ', '-', $tag['taxonomy_term']->name)).'</li>';						}
                    ?>
                    </ul>
                </div>
            <?php endif; ?>

			<?php if($field_links):?>
				<?php if($field_links[0]['url'] != ''): ?>
					<div class="node-terms">
					<h2>Enllaços relacionats</h2>
					<ul class="linksrelacionats">
					<?php foreach($field_links as $enllac): ?>
						<li><?php print '<a href="'.$enllac['url'].'">'.$enllac['title'].'</a>' ?></li>
					<?php endforeach; ?>
					</ul>
					</div>
				<?php endif; ?>
			<?php endif; ?>


		<?php
			if($node->print_html_display || $node->print_mail_display || $node->print_pdf_display) {
				echo '
	                <div class="node-links block">
				    	<h2 class="block-title">'.t('Other actions').'</h2>
				    	<div class="block-content">
						<ul class="links" role="navigation">';
				if ($node->print_html_display) echo '<li class="print_html">'.l(t('Versió per imprimir'), 'print/'.$node->nid).'</li>';
				if ($node->print_mail_display) echo '<li class="print_mail">'.l(t('Envia a un amic'), 'printmail/'.$node->nid).'</li>';
				if ($node->print_pdf_display) echo '<li class="print_pdf">'.l(t('Versió PDF'), 'printpdf/'.$node->nid).'</li>';
				echo '</ul></div></div>';
			}
		?>
        </div>

        <div class="node-content node-column-text">
            <?php if ($unpublished): ?>
                <div class="unpublished"><?php print t('No publicat'); ?></div>
            <?php endif; ?>

            <div class="node-intro">
                <?php print $field_resum[0]['value'] ?>
            </div><!-- .e_intro -->

            <!-- Go to www.addthis.com/dashboard to customize your tools -->
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c67bc259a068b5"></script>
			<!-- Afegim el text via @xarxanetorg quan es comparteix a twitter desde AddThis-->
			<script type="text/javascript">
				var addthis_share = addthis_share || {}
				addthis_share = {
					passthrough : {
						twitter: {
							via: "xarxanetorg"
						}
					}
				}
			</script>
			<div class
			<div class="node-social-links">
				<div class="addthis_sharing_toolbox"></div>
			</div>

            <?php if ($submitted): ?>
                <div class="node-submitted">
                    <p><?php print format_date($node->created, 'small'); ?></p>

                    <?php if(isset($node->field_autor['und'][0]['value'])): ?>
                        <p><strong>Autor/a: </strong><?php print $node->field_autor['und'][0]['value']; ?></p>
                    <?php endif; ?>
                        <p><strong>Entitat redactora: </strong><?php print $node->name; ?></p>
                    <?php if(isset($node->field_entitat['und'][0]['value']) && !empty($node->field_entitat['und'][0]['value'])): ?>
                        <p><strong>Entitat redactora: </strong><?php print $node->field_entitat['und'][0]['value']; ?></p>
                    <?php endif; ?>

                    <?php
                    	print render($node->field_vote);
                    ?>

                    	<div style="display:none">
                    		<?php
	                    		/* if (strpos(google_analytics_counter_display(), '></span>')  === FALSE)
	                    			echo google_analytics_counter_display();
	                    		else
	                    			echo 0; */
                    		?>
                    	</div>
                </div>
            <?php endif; ?>

            <div class="node-body-text">
                <?php
                print $node->body['und'][0]['value']; ?>
            </div>

            <!-- preguntes -->
            <a name="tornar"></a>
            	<ol class="sections">
            	<?php
            		$i=0;
            		foreach($node->field_subtitols['und'] as $titol) {
                		if ($titol['value']!='') {
							$i++;
							echo '<li><a href="#'.$i.'">'.$titol['value'].'</a></li>';
						}
					}
					echo '</ol>';
            		/*-- respostes --*/
            		$i=0;
            		foreach($node->field_continguts['und'] as $contingut) {
						if ($contingut['value']!='') {
							$i++;
							echo '<div class="resource-answer">';
							echo '<h3 class="label-h3"><a name="'.$i.'">'.$i.". ".$node->field_subtitols['und'][$i-1]['value'].'</a></h3>';
                   			echo '<p>'.$contingut['value'].'</p>';
              				echo '<p class="tornar" ><a href="#tornar">▲ Tornar a l\'índex</a></p>';
              				echo '</div>';
              			}
              		}
              	?>
        </div>
    </div>
    <?php print render($content['comments']); ?>
</article><!-- /node -->
