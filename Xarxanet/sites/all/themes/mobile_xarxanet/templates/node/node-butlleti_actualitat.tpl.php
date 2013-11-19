<?php
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
 *
 */
drupal_add_css(drupal_get_path('theme', 'genesis_xarxanet') . '/css/butlletins.css');

$pathroot = 'http://www.xarxanet.org';

// Data
$mesos = array('de gener', 'de febrer', 'de març', 'd\'abril', 'de maig', 'de juny', 'de juliol', 'd\'agost', 'de setembre', 'd\'octubre', 'de novembre', 'de desembre');
$dies = array('Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte', 'Diumenge');

?>
 <table class="butlleti"  style="font-family: Arial, Helvetica; font-size: 13px; border:1px solid #53544F; border-bottom: 0px; width:910px">
	<!-- CAPÇALERA -->
	<!--
	<tr><td colspan="2">
	<p style="padding: 2px; font-size: 11px; text-align:right"> Si no visualitzes correctament el butlletí clica aquest <a href="<?php echo $pathroot.'/node/'.$node->nid?>" style=" color: #B2290C; font-weight: bold;">enllaç</a></p>
	</td></tr>
	-->
	<tr><td>
		<a href="http://www.xarxanet.org" style="text-decoration:none">
			<img src="http://www.xarxanet.org/sites/all/themes/genesis/genesis_xarxanet/images/header-logo-xarxanet.gif" alt="logotip xarxanet" style="margin-left:5px"/>
		</a>
	</td><td>
		<p style="font-size:38px; color:#B2290C; text-align:right; font-weight:bold; margin:10px 5px">Actualitat</p>
	</td></tr>
	<tr style="background-color:#CCCCCC; color:#53544F; font-weight:bold;"><td style="padding: 5px 10px; border-top:3px solid #53544F; border-bottom: 15px solid white;">
		<?php
		$created = $node->created;
		echo $dies[date('N', $created)-1].', '.date('j', $created).' '.$mesos[date('n', $created)-1].' de '.date('Y', $created).' - Num. '.$title;
		?>
	</td><td style="text-align: right; padding: 5px 10px; border-top:3px solid #53544F; border-bottom: 15px solid white;">
		<a href="http://www.xarxanet.org/hemeroteca_actualitat" style=" color:#53544F">Butlletins anteriors</a>
	</td></tr>
	
	<tr><td style="vertical-align: top; padding-left: 20px">
	<!-- DESTACAT PRINCIPAL -->
	 <table class="butlleti" style='background-color: #ECEFF0; width: 580px;'>
		<?php 
		if ($node->field_actualitat_dest_prin_noti[0]['nid'] != '') {
			if ($node->field_actualitat_dest_prin_epigr[0]['safe'] !=  '') {?> 
				<tr><td style="background-color: #B1290B; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; text-align: center; padding: 0px; height: 28px;"><?php echo $node->field_actualitat_dest_prin_epigr[0]['safe']; ?></td></tr>
			<?php } 
			$news_node = node_load($node->field_actualitat_dest_prin_noti[0]['nid']);
			$teaser = strip_tags($news_node->field_resum[0]['value']);
			echo "	<tr><td style='padding: 0px !important;'>
						<a href='{$pathroot}/{$news_node->path}' style='text-decoration:none'>
							<img src='{$pathroot}/{$node->field_actualitat_dest_prin_foto[0]['filepath']}' alt='imatge destacat principal'/>
						</a>
					</td></tr><tr><td style='padding-bottom: 10px'>
						<a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 18pt; font-weight: lighter; line-height: 24px; text-decoration: none;'>
							{$news_node->title}
						</a>
						<p style='padding-top: 5px; margin: 2px 0;'>{$teaser}</p>";
			if ($node->field_actualitat_dest_prin_rel[0]['nid'] != '') {
				echo '<b>Altres informacions relacionades</b>
						<table class="butlleti">';
				foreach ($node->field_actualitat_dest_prin_rel as $rel) {
					$news_node = node_load($rel['nid']);
					echo "<tr><td style='padding: 1px 5px 0 5px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet.jpg' /></td>
							<td style='padding: 2px;'><a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 11pt'>{$news_node->title}</a></td>
							</tr>";	
				}
				echo '</table>';
			}
			echo "</tr></td>";
		} ?>
	</table>
	
	<!-- NOTÍCIES DESTACADES -->
	 <table class="butlleti" style='width: 580px; margin-top: 20px'><tr>
		<?php
		$i = 1;
		while ($i < 4) {
			$field = 'field_actualitat_noticies_dest_'.$i;
			$nid = $node->$field;
			$news_node = node_load($nid[0]['nid']);
			$teaser = strip_tags($news_node->field_resum[0]['value']);
			$img = imagecache_create_path('tag-petit', $news_node->field_agenda_imatge[0]['filepath']);
			$alt = $news_node->field_agenda_imatge[0]['data']['alt'];
			$paddingright = ($i < 3) ? 20 : 0;
			echo "<td style='vertical-align: top; padding: 0px; padding-right: {$paddingright}px'>
				<a href='{$pathroot}/{$news_node->path}' style='text-decoration:none'>
					<img src='{$pathroot}/{$img}' alt='{$alt}'/>
				</a>
				<a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 12pt; line-height: 21px; text-decoration: none;'>
					{$news_node->title}
				</a>
				<p style='padding-top: 5px'; margin: 2px 0;>{$teaser}</p>
			</td>";
			$i++;
		}		
		?>
	</tr></table>
	
	<!-- CURSOS I ACTES -->	
	 <table class="butlleti" style='width: 580px; margin-top: 20px'><tr>
		<td style="background-color: #aeb22a; padding: 0px; height: 28px; width: 55px;">
			<img style='margin-top: 2px; margin-left: 10px;' src='<?php echo $pathroot;?>/sites/default/files/butlletins/actualitat/cursos.png' />
		</td>
		<td style="background-color: #aeb22a; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 0px; height: 28px; width: 65px;">
			Cursos
		</td>
		<td style="width: 160px; text-align: right;">
			<a href='<?php echo $pathroot; ?>/agenda/curs' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 11pt; text-decoration: none;'>Tots els cursos</a>
		</td>
		<td style="width: 20px; padding:0px"></td>
		<td style="background-color: #a7a74d; padding: 0px; height: 28px; width: 60px;">
			<img style='margin-top: 2px; margin-left: 10px;' src='<?php echo $pathroot;?>/sites/default/files/butlletins/actualitat/actes.png' />
		</td>
		<td style="background-color: #a7a74d; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 0px; height: 28px; width: 60px; padding-left: 5px">
			Actes
		</td>
		<td style="width: 160px; text-align: right;">
			<a href='<?php echo $pathroot; ?>/agenda/acte' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 11pt; text-decoration: none;'>Tots els actes</a>
		</td>
		</tr><tr>
		<td colspan="3" style="background-color: #f6f5e3; vertical-align: top;">
			<table class="butlleti">
			<?php 
				$view = views_get_view_result('propers_cursos');
				foreach ($view as $elem) {
					$news_node = node_load($elem->nid);
					$date = $news_node->field_date_event[0];
					$start = date('j',strtotime($date['value'])).' '.$mesos[date('n', strtotime($date['value']))-1];
					$end = date('j',strtotime($date['value2'])).' '.$mesos[date('n', strtotime($date['value2']))-1];
					$date = ($start == $end) ? $start : 'Del '.$start.' al '.$end;
					echo "	<tr>
							<td style='padding: 1px 5px 0 5px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet_cursos.jpg' /></td>
							<td style='padding: 2px;' colspan='2'><a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 11pt'>{$news_node->title}</a></td>
							</tr><tr>
							<td></td>
							<td style='padding: 2px 5px 10px 0; width: 10px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/clock_cursos.png' /></td>
							<td style='padding: 2px 2px 10px 2px;'>{$date}</td>
							</tr>";
				}
			?>
			</table>
		</td>
		<td style="width: 20px; padding:0px"></td>
		<td colspan="3" style="background-color: #f1f2e4; vertical-align: top;">
			<table class="butlleti">
			<?php 
				$view = views_get_view_result('propers_events');
				foreach ($view as $elem) {
					$news_node = node_load($elem->nid);
					$date = $news_node->field_date_event[0];
					$start = date('j',strtotime($date['value'])).' '.$mesos[date('n', strtotime($date['value']))-1];
					$end = date('j',strtotime($date['value2'])).' '.$mesos[date('n', strtotime($date['value2']))-1];
					$date = ($start == $end) ? $start : 'Del '.$start.' al '.$end;
					echo "	<tr>
							<td style='padding: 1px 5px 0 5px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet_actes.jpg' /></td>
							<td style='padding: 2px;' colspan='2'><a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 11pt'>{$news_node->title}</a></td>
							</tr><tr>
							<td></td>
							<td style='padding: 2px 5px 10px 0; width: 10px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/clock_actes.png' /></td>
							<td style='padding: 2px 2px 10px 2px;'>{$date}</td>
							</tr>";
				}
			?>
			</table>
		</td>		
	</tr></table>
	
	<!-- RECULL DE NOTÍCIES DESTACAT -->
	<?php if ($node->field_actualitat_recull_epigraf[0]['safe'] != '') { ?>
	 <table class="butlleti" style='width: 580px; margin-top: 20px'><tr>
		<td style="background-color: #B1290B; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 0 8px; height: 28px; width: <?php echo (strlen($node->field_actualitat_recull_epigraf[0]['safe']))*3;?>px"><?php echo $node->field_actualitat_recull_epigraf[0]['safe'];?></td>
		<td style="width: 160px; text-align: right;"><a href='<?php echo $node->field_actualitat_recull_enllac[0]['url']; ?>' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 11pt; text-decoration: none;'><?php echo $node->field_actualitat_recull_enllac[0]['title']; ?></a></td></tr><tr>
		<td style="background-color: #eceff0;" colspan="2">
			<table class="butlleti">
			<?php
			foreach ($node->field_actualitat_recull_noticia as $elem) {
				$news_node = node_load($elem['nid']);
				$teaser = strip_tags($news_node->field_resum[0]['value']);
				echo "	<tr>
					<td style='padding: 5px 5px 0 5px; vertical-align: top; width: 10px'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet_g.jpg' /></td>
					<td style='padding: 2px;'><a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 12pt; line-height: 21px;'>{$news_node->title}</a></td>
					</tr><tr><td colspan='2' style='padding: 0 5px;'><p style='margin: 2px 0;'>{$teaser}</p></td></tr>";				
			} 
			?>
			</table>
		</td>
	</tr></table>
	<?php }?>
	
	<!-- NOTÍCIES PERSONALITZADES -->
	
	</td><td style="vertical-align: top; padding-right: 20px">
	
	<!-- ENQUESTA -->
	<?php if ($node->field_actualitat_enquesta[0]['nid'] != '') {
		$news_node = node_load($node->field_actualitat_enquesta[0]['nid']);
	?>
		 <table class="butlleti" style='width: 265px;'><tr>
			<td style="background-color: #7b7b79; padding: 0px; height: 28px; width: 35px;" ><img src="<?php echo $pathroot;?>/sites/default/files/butlletins/actualitat/enquesta.png" alt="icona_enquesta" style="margin-top: 2px; margin-left: 10px;"/></td>
			<td style="background-color: #7b7b79; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 0px; height: 28px; padding-left: 5px">Enquesta</td>
			</tr><tr><td colspan="2">
				<a href='<?php echo $pathroot.'/'.$news_node->path; ?>' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 12pt; line-height: 21px;'><?php echo $news_node->title;?></a>			
			</td></tr><tr><td colspan="2" style="padding-top:0px">
			<table class="butlleti">
				<?php
				foreach ($news_node->choice as $choice) {
					echo "<tr>
						<td style='padding: 1px 5px 0 5px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet.jpg' /></td>
						<td style='padding: 2px;' colspan='2'>{$choice['chtext']}</td>
						</tr>";
				} 
				?>
			</table>
			</td>
		</tr>
		</table>
	<?php }?>
	
	<!-- DESTACAT LATERAL SUPERIOR -->
	<?php if ($node->field_actualitat_lat_sup_noti[0]['nid'] != '') {
		$news_node = node_load($node->field_actualitat_lat_sup_noti[0]['nid']);
		$teaser = strip_tags($news_node->field_resum[0]['value']);
		$img = imagecache_create_path('financ-petit', $news_node->field_agenda_imatge[0]['filepath']);
		$alt = $news_node->field_agenda_imatge[0]['data']['alt'];
		echo "<table class='butlleti' style='width: 265px; margin-top: 20px; background-color: #ECEFF0;'><tr>";
		
		if ($node->field_actualitat_lat_sup_epigraf[0]['safe'] != '') {
			echo "<td style='background-color: #B1290B; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 0px 10px; height: 28px;'>{$node->field_actualitat_lat_sup_epigraf[0]['safe']}</td>";
		} 
		echo "</tr><tr><td style='padding: 0;'>
			<a href='{$pathroot}/{$news_node->path}' style='text-decoration:none'>
				<img src='{$pathroot}/{$img}' alt='{$alt}'/>
			</a>
			</td></tr><tr><td style='padding-bottom: 10px'>
			<a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 12pt; line-height: 21px; text-decoration: none;'>
				{$news_node->title}
			</a>
			<p style='padding-top: 5px; margin: 2px 0;'>{$teaser}</p>";
		if ($node->field_actualitat_lat_sup_rel[0]['nid'] != '') {
			echo '<b>Altres informacions relacionades</b>
			<table class="butlleti">';
			foreach ($node->field_actualitat_lat_sup_rel as $rel) {
				$news_node = node_load($rel['nid']);
				echo "<tr><td style='padding: 1px 5px 0 5px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet.jpg' /></td>
				<td style='padding: 2px;'><a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 11pt'>{$news_node->title}</a></td>
				</tr>";
			}
			echo '</table>';
		}
		echo "</td></tr></table>";
	 }?>
	
	
	<!-- FINANÇAMENTS -->
	<table class="butlleti" style='width: 265px; margin-top: 20px; background-color: #fef1e8'><tr>
		<td style="background-color: #f37310; padding: 0px; height: 28px; width: 35px;" ><img src="<?php echo $pathroot;?>/sites/default/files/butlletins/actualitat/financaments.png" alt="icona_finançaments" style="margin-top: 2px; margin-left: 10px;"/></td>
		<td style="background-color: #f37310; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 0px; height: 28px; padding-left: 5px">Finançaments</td>
		</tr><tr><td colspan="2">
		<table class="butlleti">
			<?php
			$view = views_get_view_result('ultims_financaments');
			foreach ($view as $elem) {
				$news_node = node_load($elem->nid);
				$date = $news_node->field_date[0];
				$start = date('j',strtotime($date['value'])).' '.$mesos[date('n', strtotime($date['value']))-1];
				$end = date('j',strtotime($date['value2'])).' '.$mesos[date('n', strtotime($date['value2']))-1];
				$date = ($start == $end) ? $start : 'Del '.$start.' al '.$end;
				echo "	<tr>
						<td style='padding: 1px 5px 0 5px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/bullet_financaments.jpg' /></td>
						<td style='padding: 2px;' colspan='2'><a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-weight: lighter; text-decoration: none; font-size: 11pt'>{$news_node->title}</a></td>
						</tr><tr>
						<td></td>
						<td style='padding: 2px 5px 10px 0; width: 10px; vertical-align: top;'><img src='{$pathroot}/sites/default/files/butlletins/actualitat/clock_financaments.png' /></td>
						<td style='padding: 2px 2px 10px 2px;'>{$date}</td>
						</tr>";
				}
			?>
		</table>
		</td></tr>
		<tr><td style='text-align: right; padding-bottom: 10px' colspan="2"><a href='<?php echo $pathroot; ?>/financaments' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 11pt; text-decoration: none;'>Tots els finançaments</a></td></tr>
	</table>
	
	<!-- BANNERS -->
	 <table class="butlleti" style='width: 265px; margin-top: 20px;'><tr>
	<td style='padding: 0px'>
	<a href="http://voluntariat.org/" style='text-decoration:none'>
		<img src="<?php echo $pathroot; ?>/sites/default/files/butlletins/actualitat/banner_voluntariat.jpg" alt="banner voluntariat" />
	</a></td></tr><tr>
	<td style='padding: 10px 0 0 0'>
	<a href="http://www.xarxanet.org/formulari-dassessorament" style='text-decoration:none'>
		<img src="<?php echo $pathroot; ?>/sites/default/files/butlletins/actualitat/banner_assessorament.jpg" alt="banner voluntariat" style='border: 0 none;'/>
	</a></td></tr>
	<?php
	foreach ($node->field_actualitat_banner as $banner) {
		echo "<tr>
			<td style='padding: 10px 0 0 0'><a href='{$banner['data']['url']}' style='text-decoration:none'>
			<img src='{$pathroot}/{$banner['filepath']}' alt='{$banner['data']['alt']}' />
			</a></td></tr>";
	} 
	?>
	</table>
	
	<!-- DESTACAT LATERAL INFERIOR -->
	<?php if ($node->field_actualitat_lat_inf_noticia[0]['nid'] != '') {
		$news_node = node_load($node->field_actualitat_lat_inf_noticia[0]['nid']);
		$teaser = strip_tags($news_node->field_resum[0]['value']);
		$img = imagecache_create_path('financ-petit', $news_node->field_agenda_imatge[0]['filepath']);
		$alt = $news_node->field_agenda_imatge[0]['data']['alt'];
		echo "<table class='butlleti' style='width: 265px; margin-top: 20px;'><tr>";
		
		if ($node->field_actualitat_lat_inf_epigraf[0]['safe'] != '') {
			echo "<td style='background-color: #B1290B; color: white; font-family: Georgia,Times New Roman,Times,serif; font-size: 12pt; padding: 0px 10px; height: 28px;'>{$node->field_actualitat_lat_inf_epigraf[0]['safe']}</td>";
		} 
		echo "</tr><tr><td style='padding: 0;'>
			<a href='{$pathroot}/{$news_node->path}' style='text-decoration:none'>
				<img src='{$pathroot}/{$img}' alt='{$alt}'/>
			</a>
			</td></tr><tr><td style='padding-bottom: 10px'>
			<a href='{$pathroot}/{$news_node->path}' style='font-family: Georgia,Times New Roman,Times,serif; color: #005577; font-size: 12pt; line-height: 21px; text-decoration: none;'>
				{$news_node->title}
			</a>
			<p style='padding-top: 5px; margin: 2px 0;'>{$teaser}</p>";
		echo "</td></tr></table>";
	 }?>
	
	</td></tr>	
	<!-- PEU -->
	<tr style="background-color:#CCCCCC; border-top:3px solid #53544F;">
	<td colspan="2" style="border-top: 3px solid #53544F; padding: 4px;">
		 <table class="butlleti"  style="font-family: Arial, Helvetica; font-size: 13px; color:#53544F;">
			<tr><td colspan="2" style="padding-left:10px;">
				<b>Xarxanet.org és un projecte de</b>
			</td><td colspan="2" style="padding-left:50px;">
				<b>Entitats promotores</b>
			</td></tr>
			<tr><td style="vertical-align:top; padding-left:10px; padding-top:15px">
				<table class="butlleti"><tr><td>
					<a href="http://www.gencat.cat/benestar" style="text-decoration:none">
						<img alt="logo generalitat" src="<?php echo $pathroot?>/sites/default/files/butlletins/financament/logo_generalitat.png">
					</a>
				</td></tr><tr><td style="height: 55px; vertical-align: bottom;">
					<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/es/deed.ca" rel="license">
						<img style="border:0 none;" src="http://i.creativecommons.org/l/by-nc-sa/3.0/es/80x15.png" alt="Licencia de Creative Commons">
					</a>
				</td></tr></table>
			</td><td style="vertical-align:top; padding-top:15px">
				<!-- <a href="http://www.voluntariat.org" style="text-decoration:none">
					<img alt="logo voluntariat" src="<?php echo $pathroot?>/sites/default/files/butlletins/financament/logo_scv.png">
				</a> -->
			</td><td style="padding-left:50px;">
				<p>
					<a href="http://www.suport.org" style="color:#53544F;  font-weight:normal">Suport Associatiu Centre d'Estudis</a><br />
					<a href="http://www.esplai.org" style="color:#53544F;  font-weight:normal">Fundació Catalana de l'Esplai</a><br />
					<a href="http://www.peretarres.org" style="color:#53544F;  font-weight:normal">Fundació Pere Tarrés</a><br />
					<a href="http://www.ateneus.cat" style="color:#53544F;  font-weight:normal">Federació d'Ateneus de Catalunya</a><br />
					<a href="http://www.xvac.cat" style="color:#53544F;  font-weight:normal">Xarxa de Voluntariat Ambiental de Catalunya</a><br />
					<a href="http://www.ensdecomunicacio.cat" style="color:#53544F;  font-weight:normal">Ens de l'Associacionisme Cultural Català</a><br />
				</p>
			</td><td style="padding-left:15px">
				<p>
					<a href="http://jovesteb.org" style="color:#53544F;  font-weight:normal">Associació per a joves Teb</a><br />
					<a href="http://www.ravalnet.org" style="color:#53544F;  font-weight:normal">Associació ciutadana Ravalnet</a><br />
					<a href="http://www.federacio.net/ca" style="color:#53544F;  font-weight:normal">Federació Catalana del Voluntariat Social</a><br />
					<a href="http://magno.uab.es/fas" style="color:#53544F;  font-weight:normal">Fundació Autònoma Solidària</a><br />
					<a href="http://www.escoltesiguies.cat" style="color:#53544F;  font-weight:normal">Minyons Escoltes i Guies de Catalunya (MEG)</a><br />
					<a href="http://www.iwith.org/ca/" style="color:#53544F;  font-weight:normal">I-with.org</a><br />
				</p>
			</td></tr>
		</table>
	<tr><td colspan="2" style="background-color:black; color:white; text-align:right; padding:5px 10px;">
		<a style=" color:white" href="http://www.xarxanet.org/alta_actualitat">Alta</a> | 
		<a style=" color:white;" href="http://www.xarxanet.org/baixa_actualitat">Baixa</a> | 
		<a style=" color:white;" href="mailto:butlleti@xarxanet.org?Subject=Consulta%20butlletí%20Finançament">Contacte</a> | 
		<a style=" color:white;" href="http://www.xarxanet.org/avis-legal">Avís legal</a>
	</td></tr> 
</table>