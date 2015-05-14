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
		$path = $result['fields']['path'];
		$nid = explode('/', $path);
		$nid = $nid[1];
		$node = node_load($nid);
		$url = url($path);
		
		$title = strip_tags($node->title);
		$autor = strip_tags($node->field_doc_autoria['und'][0]['value']);
		$editorial = taxonomy_term_load($node->field_doc_editorial['und'][0]['tid']);
		$editorial = $editorial->name;
		$year = $node->field_doc_data_publi['und'][0]['value'];
		$teaser = strip_tags($node->field_doc_sinopsi['und'][0]['value'], '<br>');

		if (!empty($node->field_doc_imatge['und'])){
			$uri = $node->field_doc_imatge['und'][0]['uri'];
			$filepath = file_create_url($uri);
		} else {
			$filepath = '/sites/default/files/biblioteca/doc_base.jpg';
		}
		
		echo 	"<table class='biblioteca-document'><tr>
				<td class='image'>
				<a href='{$url}'>
				<img src='{$filepath}' alt='Portada de {$title}' />
				</a>
				</td><td>
				<div class='text'>
				<h2><a href='{$url}'>{$title}</a></h2>
				<p class='top'>
				{$autor}<br/>
				{$editorial} ({$year})
				</p>
				<p class='teaser'>{$teaser}</p>
				</div>
				</td></tr></table>";
	}
	echo "{$pager}";	
} else {
	echo "<dl class='search-results {$type}-results'>{$search_results}</dl>{$pager}";
}
?>