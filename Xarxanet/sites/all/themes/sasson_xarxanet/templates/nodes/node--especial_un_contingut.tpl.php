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
<div id="especial-1-contingut-pane">
	<div class="row" id="first-row">
	<?php
		if ($node->field_especial_contingut_1_dest['und'][0]['nid'] != '') {
			$content_node = node_load($node->field_especial_contingut_1_dest['und'][0]['nid']);
			$title = $content_node->title;
			$url = url('node/' . $content_node->nid, array('absolute' => TRUE));
		} else {
			$title = $node->field_especial_contingut_1_dest_['und'][0]['title'];
			$url = $node->field_especial_contingut_1_dest_['und'][0]['url'];
		}
	
		if ($node->field_especial_contingut_1_form['und'][0]['value'] == 'Columna esquerra') {
			$image = file_create_url($node->field_especial_contingut_1_img['und'][0]['uri']);
			$alt = '';
		} else {
			$image = image_style_url('tag-mig',$content_node->field_agenda_imatge['und'][0]['uri']);
			$alt = $content_node->field_agenda_imatge['und'][0]['alt'];
		}
		
		$resum = $content_node->field_resum['und'][0]['value'];
		$position = str_replace(' ', '-', strtolower($node->field_especial_contingut_1_form['und'][0]['value']));
		
		echo "	<div class='content content-{$position}'>
					<a href='{$url}'>
						<img src='{$image}' alt='{$alt}'/>
					</a>
				<div class='content_title'><h3><a href='{$url}'>{$title}</a></h3></div>
				<div class='content_teaser'>{$resum}</div>
				</div>";

	?>
	</div><div id='clear'></div><div class="row" id="third-row">
		<?php
			$i = 0;
			if ((!empty($node->field_especial_contingut_1_a_xn['und'][$i]['nid'])) || (!empty($node->field_especial_contingut_1_a_ex['und'][$i]['title']))) {
				if ($node->field_especial_idioma['und'][0]['value'] == 'en') {
					echo '<label>Related news:</label>';
				} else {
					echo '<label>Altres continguts relacionats:</label>';
				}
				
			}
			while(isset($node->field_especial_contingut_1_a_xn['und'][$i])) {
				$content_node = node_load($node->field_especial_contingut_1_a_xn['und'][$i]['nid']);
				$title = $content_node->title;
				$url = url('node/' . $content_node->nid, array('absolute' => TRUE));
				echo "<div class='item'><a href='{$url}'>{$title}</a></div>";
				$i++;
			}
			$i = 0;
			while(isset($node->field_especial_contingut_1_a_ex['und'][$i])) {
				$title = $node->field_especial_contingut_1_a_ex['und'][$i]['title'];
				$url = $node->field_especial_contingut_1_a_ex['und'][$i]['url'];
				echo "<div class='item'><a href='{$url}'>{$title}</a></div>";
				$i++;
			}
		?>
		</ul>
	</div>
</div>