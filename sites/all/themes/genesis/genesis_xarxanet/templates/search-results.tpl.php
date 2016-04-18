<?php

/**
 * @file search-results.tpl.php
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependant to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $type: The type of search, e.g., "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 */

//Comprovar si es tracta d'una cerca de la biblioteca
$uri = request_uri();
$uri = explode('/', $uri);
if ($uri[1] == 'biblioteca_cerca') { 
	foreach ($results as $result){
		$node = node_load($result['node']->nid);
	
		$autor = strip_tags($node->field_doc_autoria[0]['value']);
		$editorial = taxonomy_get_term($node->field_doc_editorial[0]['value']);
		$year = $node->field_doc_data_publi[0]['value'];
		$filepath = $filepath = (isset($node->field_doc_imatge[0]['filepath'])) ? '/'.$node->field_doc_imatge[0]['filepath'] : '/sites/default/files/biblioteca/doc_base.jpg';
		$snippet = str_replace(array(';/p>', 'Tweet'), '', strip_tags(htmlspecialchars_decode($result['snippet']), '<b><strong>'));
	
		echo "<table class='biblioteca-document'><tr>
			<td class='image'>
			<a href='{$result['link']}'>
			<img src='{$filepath}' alt='Portada de {$result['title']}' />
			</a>
			</td><td>
			<div class='text'>
			<h2><a href='{$result['link']}'>{$result['title']}</a></h2>
			<p class='top'>
			{$autor}<br/>
			{$editorial->name} ({$year})
			</p>
			<p class='snippet'>{$snippet}</p>
			</div>
			</td></tr></table>";
	}	
} else {
	echo "<dl class='search-results {$type}-results'>{$search_results}</dl>{$pager}";
}
?>