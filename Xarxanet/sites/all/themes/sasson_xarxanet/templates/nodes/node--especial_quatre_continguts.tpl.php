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
<div id="especial-4-continguts-pane">
	<div class="row" id="first-row">
	<?php
		for($i=0; $i<4; $i++) {
			$link = $node->field_especial_contingut_4_xn[$i]['view'];
			$content_node = node_load($node->field_especial_contingut_4_xn[$i]['nid']);
			if ($i==0 || $i==3) {
				$image = base_path().imagecache_create_path('tag-mig', $content_node->field_agenda_imatge[0]['filepath']);
				$size = 'large';
			} else {
				$image = base_path().imagecache_create_path('tag-petit', $content_node->field_agenda_imatge[0]['filepath']);
				$size = 'small';
			}
			$alt = $content_node->field_agenda_imatge[0]['data']['alt'];
			$resum = $content_node->field_resum[0]['value'];
			$path = base_path().$content_node->path;
			
			echo "	<div class='content content-{$size}'>
 						<a href='{$path}'>
							<img src='{$image}' alt='{$alt}'/>
						</a>
						<div class='content_title'><h3>{$link}</h3></div>
						<div class='content_teaser'>{$resum}</div>
 					</div>";
			
			
			if ($i==1) echo "</div><div id='clear'></div><div class='row' id='second-row'>";
		} 
	?>
	</div><div id='clear'></div><div class="row" id="third-row">
		<?php
			$i = 0;
			if ((!empty($node->field_especial_contingut_4_a_xn[$i]['view'])) || (!empty($node->field_especial_contingut_4_a_ex[$i]['view']))) {
				if ($node->field_especial_idioma[0]['value'] == 'en') {
					echo '<label>Related news:</label>';
				} else {
					echo '<label>Altres continguts relacionats:</label>';
				}
			}
			while(isset($node->field_especial_contingut_4_a_xn[$i])) {
				echo '<div class="item">'.$node->field_especial_contingut_4_a_xn[$i]['view'].'</div>';
				$i++;
			}
			$i = 0;
			while(isset($node->field_especial_contingut_4_a_ex[$i])) {
				echo '<div class="item">'.$node->field_especial_contingut_4_a_ex[$i]['view'].'</div>';
				$i++;
			}
		?>
		</ul>
	</div>
</div>