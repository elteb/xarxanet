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
<div id="<?php print $node_id; ?>" class="<?php print $classes; ?>">
    <div class="node-inner">
        <div class="node-column-images">
           
            <?php if(isset($field_imatges)): ?>
                <div class="node-image">
                    <ul class="items">
                        <?php foreach($field_imatges as $imatge): ?>
                            <li>
                              <?php print $imatge['view'];?>
                              <?php if($imatge['data']['alt']):?>
                                <div class="legend"><p><?php print $imatge['data']['alt']; ?></p></div>
                              <? endif;?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if($terms): ?>
                <div class="node-terms">
                    <h2>Tags1</h2>
                    <?php print $terms; ?>
                </div>
            <?php endif; ?>
			<?php if($field_file):?>
				<div class="node-terms">
				<h2>Fitxers adjunts</h2>
				<?php foreach($field_file as $adjunt): ?>
					<?php print $adjunt['view'];;?>
				<?php endforeach;?>
				</div>
			<?php endif; ?>
			<?php if($field_links):?>
				<div class="node-terms">
				<h2>Enllaços relacionats</h2>
				<ul class="linksrelacionats">
				<?php foreach($field_links as $enllac): ?>
					<li><?php print ($enllac['view']);?></li>
				<?php endforeach;?>
				</ul>
				</div>
			<?php endif; ?>


            <?php if($links): ?>
			
                <div class="node-links block">
			    <h2 class="block-title"> <?php print t('Other actions'); ?></h2>
			    <div class="block-content"><?php print $links; ?></div>
		   </div>

            <?php endif; ?>



        </div>

        <div class="node-content node-column-text">
            <?php if ($unpublished): ?>
                <div class="unpublished"><?php print t('No publicat'); ?></div>
            <?php endif; ?>

            <div class="node-intro">
                <?php print $field_resum[0]['value'] ?>
            </div><!-- .e_intro -->

            <div class="node-social-links">
              <div class="floatesquerra">
                <?php print $node->content['tweetbutton']['#value']; ?>
                <?php print $node->content['fb_social_like_widget']['#value']; ?>
              </div>
              <div class="floatdreta">
                <?php print $node->content['service_links']['#value']?>
               </div>
            </div>

            <?php if ($submitted): ?>
                <div class="node-submitted">
                    <div class="cincestrelles"><?php print $node->content['fivestar_widget']['#value']; ?></div>
                    <p><?php print format_date($node->changed, 'small'); ?></p>

                    <?php if(isset($node->field_autor[0]['value'])): ?>
                        <p><strong>Autor: </strong><?php print $node->field_autor[0]['value']; ?></p>
                    <?php endif; ?>
                        <p><strong>Entitat redactora: </strong><?php print $node->name; ?></p>
                    <?php if(isset($field_entitat) && !empty($field_entitat[0]['value'])): ?>
                        <p><strong>Entitat redactora: </strong><?php print $field_entitat[0]['value']; ?></p>
                    <?php endif; ?>
                    
                </div>
            <?php endif; ?>

            <div class="node-body-text">
                <?php print $node->content['body']['#value']; ?>
            </div>
            <!-- preguntes -->
            <a name="tornar"></a>
            <ol class="sections">
            <?php $i=0?>
            <?php foreach($node->field_subtitols as $titol):?>
                <?php if ($titol['value']!=''): ?>
                <li><a href="#<?php print ($i+1)?>"><?php print $titol['value']?></a></li>
                <?php $i++?>
                <?php endif ?>
            <?php endforeach;?>
            </ol>
            <!-- respostes -->
            <?php $i=0;?>
            <?php foreach($node->field_continguts as $contingut):?>
            <?php if ($contingut['value']!=''): ?>
            <h3 class="label-h3"><a name="<?php print ($i+1)?>"><?php print ($i+1).". ".$node->field_subtitols[$i]['value']?></a></h3>
                   <p><?php print $contingut['value']?></p>
              <?php $i++;?>
              <p><a href="#tornar" class="tornar">▲ Tornar a l'índex</a></p>
              <?php endif ?>
              <?php endforeach;?>

        </div>
    </div>

</div><!-- /node -->