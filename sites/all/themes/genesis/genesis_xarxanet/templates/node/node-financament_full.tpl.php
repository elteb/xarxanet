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
            <?php if(!empty($field_agenda_imatge[0]['view'])): ?>
                <div class="node-image">
                    <?php print $field_agenda_imatge[0]['view']; ?>
                </div>
            <?php endif; ?>
            
            <?php if($terms): ?>
                <div class="node-terms">
                    <h2>Tags</h2>
                    <?php print $terms; ?>
                </div>
            <?php endif; ?>
            <?php if($links): ?>
                <div class="node-links"><?php print $links; ?></div>
            <?php endif; ?>
        </div>

        <div class="node-content node-column-text">
            <?php if ($unpublished): ?>
                <div class="unpublished"><?php print t('No publicat'); ?></div>
            <?php endif; ?>

            <div class="node-intro">
                <?php print $field_resum[0]['value'] ?>
            </div>

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
                <?php if($field_convocant[0]['value']):?>
                    <h3>Convocant:</h3>
                    <?php print $field_convocant[0]['value']; ?>
                <?php endif; ?>
                
                <?php if($field_finfull_data_publicacio[0]['view']):?>
                    <h3>Data publicació:</h3>
                    <p><?php print $field_finfull_data_publicacio[0]['view'] ?></p>
                <?php endif; ?>
                
                <?php if($field_date[0]['view']):?>
                    <h3>Termini:</h3>
                    <p><?php print $field_date[0]['view']; ?></p>
                <?php endif; ?>
                
                <h3>Contingut:</h3>
                <p><?php print $node->content['body']['#value']; ?></p>
                
                <?php if($field_finfull_ambit):?>
                    <h3>Àmbit:</h3>
                    <p><ul>
                        <?php foreach($field_finfull_ambit as $ambit): ?>
                            <li><?php print $ambit['view']; ?></li>
                        <?php endforeach; ?>
                    </ul></p>
                <?php endif; ?>
                
                <?php if($field_finfull_tipus[0]['value']):?>
                    <h3>Tipus:</h3>
                    <p><?php print $field_finfull_tipus[0]['value']; ?></p>
                <?php endif; ?>
                
                <?php if($field_finfull_publicprivat[0]['view']):?>
                    <h3>Públic/Privat:</h3>
                    <p><?php print $field_finfull_publicprivat[0]['view']; ?></p>
                <?php endif; ?>
                
                <?php if($field_finfull_ambit_geo[0]['view']):?>
                    <h3>Àmbit geogràfic:</h3>
                    <p><?php print $field_finfull_ambit_geo[0]['view']; ?></p>
                <?php endif; ?>
                
                <?php if($field_finfull_bases):?>
                    <h3>Bases</h3>
                    <p><ul>
                    <?php foreach($field_finfull_bases as $base): ?>
                        <li><?php print $base['view']; ?></li>
                    <?php endforeach; ?>
                    </ul></p>
                <?php endif; ?>
            </div>
            <!-- preguntes -->
            

        </div>
    </div>

</div><!-- /node -->
