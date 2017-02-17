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
<div id="especial-documents-pane">
	<div class="row" id="first-row">
	<?php
		for($i=0; $i<4; $i++) {
			$doc_node = node_load($node->field_especial_documents_doc['und'][$i]['nid']);
			$link = url('node/' . $doc_node->nid, array('absolute' => TRUE));
					
			if (isset($doc_node->field_doc_imatge['und'][0]['uri'])){
				$filepath = file_create_url($doc_node->field_doc_imatge['und'][0]['uri']);
			} else {
				$filepath = '/sites/default/files/biblioteca/doc_base.jpg';
			}
			
			echo "	<div class='document' id='doc-{$i}'>
					<div class='doc_image'><a href='{$link}'>
						<img src='{$filepath}' alt='Portada de {$doc_node->title}' />
					</a></div>
					<div class='doc_title'><h3><a href='{$link}'>{$doc_node->title}</a></h3></div></div>";
		}
		echo '	</div><div id="clear"></div>
 				<div class="row" id="second-row">';
	
		if(($node->field_especial_documents_altre_d['und'][0]['view'] != '') || ($node->field_especial_documents_altre_e['und'][0]['view'] != '')) { 
			echo '<label>Altres documents relacionats:</label> ';
			$i = 0;
			while($node->field_especial_documents_altre_d['und'][$i]['nid'] != '') {
				$content_node = node_load($node->field_especial_documents_altre_d['und'][$i]['nid']);
				$title = $content_node->title;
				$url = url('node/' . $content_node->nid, array('absolute' => TRUE));
				echo "<div class='item'><a href='{$url}'>{$title}</a></div>";
				$i++;
			}
			$i = 0;
			while(isset($node->field_especial_documents_altre_e['und'][$i])) {
				$title = $node->field_especial_documents_altre_e['und'][$i]['title'];
				$url = $node->field_especial_documents_altre_e['und'][$i]['url'];
				echo "<div class='item'><a href='{$url}'>{$title}</a></div>";
				$i++;
			}
			echo '</ul>';
		} 
	?>
	</div>
</div>