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

// Data
$mesos = array('de gener', 'de febrer', 'de març', 'd\'abril', 'de maig', 'de juny', 'de juliol', 'd\'agost', 'de setembre', 'd\'octubre', 'de novembre', 'de desembre');
$dies = array('Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte', 'Diumenge');
$pathroot = 'http://www.xarxanet.org';

// Banners fixes
$banners_fixes = array(	'Banner PFVC' 	=> 	array (	$pathroot.'/sites/default/files/butlletins/abast/banner_PFVC.gif', 
													'http://www.voluntariat.org/AgendadecursosdelPFVC.aspx'),
						'Banner opinió' => 	array (	$pathroot.'/sites/default/files/butlletins/abast/banner_opinio.png', 
													'http://bloc.xarxanet.org/'),
						'Banner subs. butlletí' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_subsButlleti.png', 
															$pathroot.'/user/register'),
						'Banner fes-te voluntari' => array ($pathroot.'/sites/default/files/butlletins/abast/banner_festeVoluntari.gif', 
															$pathroot.'/fes-voluntariat'),
						'Banner assessorament' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_assessorament.gif', 
															$pathroot.'/formulari-dassessorament'),
						'Banner xarxes socials' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_xarxes.gif', 
															$pathroot.'/segueix-nos'),
						'Banner voluntariat' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_voluntariat.gif', 
															'http://www.voluntariat.org/'),
						'Banner xarxanet' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_xarxanet.gif', 
														'http://www.xarxanet.org/'),
						'Banner verso' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_verso.gif', 
													'http://www20.gencat.cat/portal/site/bsf/menuitem.ce32baba3744d8fa172a63a7b0c0e1a0/?vgnextoid=cbc7b0b331fc6310VgnVCM2000009b0c1e0aRCRD&vgnextchannel=cbc7b0b331fc6310VgnVCM2000009b0c1e0aRCRD&vgnextfmt=default'),
						'Banner masclisme' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_masclisme.gif', 
														'http://www20.gencat.cat/portal/site/icdones/menuitem.351404635dde900639a72641b0c0e1a0/?vgnextoid=704754f598c9b110VgnVCM1000000b0c1e0aRCRD&vgnextchannel=704754f598c9b110VgnVCM1000000b0c1e0aRCRD&vgnextfmt=default&newLang=ca_ES'),
						'Banner blocs xarxanet' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_blocs.gif', 
															'http://blocs.xarxanet.org/'),
						'Banner omnia' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_omnia.gif', 
													'http://xarxa-omnia.org/'),
						'Banner dixit' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_dixit.gif', 
													'http://www20.gencat.cat/portal/site/dixit'),
						'Banner butlletins' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_butlletins.gif', 
													'http://www20.gencat.cat/portal/site/bsf/menuitem.6e02226e86d88424e42a63a7b0c0e1a0/?vgnextoid=ca359a00346a4210VgnVCM1000008d0c1e0aRCRD&vgnextchannel=ca359a00346a4210VgnVCM1000008d0c1e0aRCRD&vgnextfmt=default&newLang=ca_ES'),
						'Banner INTERREG IVC' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_interreg.gif', 
													'http://verso.au.dk'),
						'Banner Barcelona CEV' => 	array  ($pathroot.'/sites/default/files/butlletins/abast/banner_bcev.png', 
													'http://www.xarxanet.org/especial/barcelona-cev'));

// Notícies destacades
$num_destacades = 3;
$destacades = array();
foreach ($node->field_abast_destacades_xarxanet as $key => $destacada_xarxanet){
	if ($num_destacades != 0 && !empty($destacada_xarxanet['safe']['nid'])){
		$node_ = node_load($destacada_xarxanet['safe']['nid']);
		if (isset($node->field_abast_crop[$key]['filepath'])){
			$imatge = $node->field_abast_crop[$key]['filepath'];
			$alt = $node->field_abast_crop[$key]['data']['alt'];
		}elseif (isset($node_->field_agenda_imatge[0]['filepath'])){
			$imatge = imagecache_create_path('abast-gran', $node_->field_agenda_imatge[0]['filepath']);
			$alt = $node_->field_agenda_imatge[0]['data']['alt'];
		}else{
			$imatge = imagecache_create_path('abast-gran', $node_->field_imatges[0]['filepath']);
			$alt = $node_->field_imatges[0]['data']['alt'];
		}
		$destacades[$key] = array(	'titular' => $node_->title,
								'link' => $pathroot.'/'.$node_->path, 
								'imatge' => $imatge,
								'alt' => $alt);
		$num_destacades--;
	}
}

foreach ($node->field_abast_destacades_titular as $key => $destacada){
	if ($num_destacades != 0 && !empty($destacada['title'])){
		$destacades[$key] = array(	'titular' => $destacada['title'],
								'link' => $destacada['url'], 
								'imatge' => $node->field_abast_crop[$key]['filepath'], 
								'alt' => $node->field_abast_crop[$key]['data']['alt']);
		$num_destacades--;
	}
}
ksort($destacades);

// Notícies
$noticia_curta = 130; //Caràcters
$noticia_llarga = 900; //Caràcters
$noticies = array();
foreach ($node->field_abast_noticies_xarxanet as $key => $noticia_xarxanet){
	if (!empty($noticia_xarxanet['safe']['nid'])){
		$node_ =  node_load($noticia_xarxanet['safe']['nid']);
		if (isset($node->field_abast_crop1[$key]['filepath'])){
			$imatge = $node->field_abast_crop1[$key]['filepath'];
			$alt = $node->field_abast_crop1[$key]['data']['alt'];
		}elseif (isset($node_->field_agenda_imatge[0]['filepath'])){
			$imatge = imagecache_create_path('abast-gran', $node_->field_agenda_imatge[0]['filepath']);
			$alt = $node_->field_agenda_imatge[0]['data']['alt'];
		}else{
			$imatge = imagecache_create_path('abast-gran', $node_->field_imatges[0]['filepath']);
			$alt = $node_->field_imatges[0]['data']['alt'];
		}
		$noticies[$key] = array( 	'titular' => $node_->title,
								'link' => $pathroot.'/'.$node_->path,
								'imatge' => $imatge,
								'alt' => $alt,
								'teaser' => strip_tags($node_->field_resum[0]['value']));
	}
}
foreach ($node->field_abast_noticies_titular as $key => $noticia){
	if (!empty($noticia['title'])){
		$noticies[$key] = array(	'titular' => $noticia['title'],
								'link' => $noticia['url'],
								'imatge' => $node->field_abast_crop1[$key]['filepath'],
								'alt' => $node->field_abast_crop1[$key]['data']['alt'],
								'teaser' => strip_tags($node->field_abast_noticies_resum[$key]['value']));
	}
}
ksort($noticies);
?>

<table style="font-family: Verdana; font-size: 11px;" width="970px" style="margin:auto" cellspacing="8px">

	<!-- CAPÇALERA -->	
	<tr><td colspan="2">		
		<a href="http://www.gencat.cat" style="text-decoration:none">
			<img src="http://www.gencat.cat/img/logo.gif" alt="logo Generalitat" style="border:0 none;"/>
		</a>
		<p style="text-align:right; vertical-align:bottom; margin-bottom:0px; margin-top:-10px">
		Si no veieu correctament aquest butlletí, cliqueu <a style="font-weight:bold; color:#7b1b1c; text-decoration:none" href="http://www.voluntariat.org/Portals/0/Abast/documents/ultim_butlleti.html">aquí</a></p>	
		<table cellspacing="0" cellpadding="0" style="border-top: solid 3px #800000; width:100%">
			<tr><?php 
				if (is_numeric($title))	{
					echo '<td width="57" style="background-color: black; color: white; font-weight: bold; vertical-align: top; padding: 5px; font-size: 16px">#'.$title.'</td>';
				}	
				?>
			<td style="background-color: #7b1b1c" width="100%">
				<table style="width:100%">
					<tr><td style="font-family:Arial; font-weight:bold; color:white; vertical-align:top;">
						<?php if (empty($node->field_abast_titol_monografic[0]['value'])) {
							echo '<p style="font-size:30px; margin:5px">Butlletí</p>';	
						} else {
							echo '<p style="font-size:30px; margin:5px">'.$node->field_abast_titol_monografic[0]['value'].'</p>';
							echo '<p style="font-size:18px; margin:5px">Monogràfic del Butlletí A l’Abast</p>';
						}?>
						<p style="font-size:16px; margin:5px">El butlletí del voluntariat català</p>
					</td>
					<td style="text-align:right"><img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/capçalera_blanc_sol.png" alt="Capçalera butlleti Abast" style="margin:10px"/></td></tr>				
				</table>
			</td></tr>
		</table>		
	</tr></td>
	<tr>	
		<td colspan="2">
			<a name="inici"></a>
			<table style="width:100%; font-size:11px;">
				<tr><td style="font-weight:bold">
					<?php
					$created = time(); 
					echo $dies[date('N', $created)-1].', '.date('j', $created).' '.$mesos[date('n', $created)-1].' de '.date('Y', $created);
					?>
				</td>
				<td style="text-align: right; font-weight:bold">
					<a style="color:#4D4D4D; text-decoration:none" href="http://xarxanet.org/hemeroteca-butlleti-labast">Butlletins anteriors</a>
				</td></tr>
			</table>
		</td>
	</tr>
	<tr><td colspan="2" height="3px" style="background-color: #800000;"></td></tr>
	<tr><td colspan="2" height="3px" style="background-color: #CCCCCC; padding: 4px; font-weight: bold">
	<?php
		$array_flex = array('', '_2', '_3');
		if (!empty($destacades)){ echo '<a style="color:#000001; text-decoration:none" href="#destacats">Destacats</a>';}
		if (!empty($noticies)){ echo ' | <a style="color:#000001; text-decoration:none" href="#noticies">Notícies</a>';} 
		if (!empty($node->field_abast_voluntariat_xarxanet[0]['safe']['nid']) || !empty($node->field_abast_voluntariat_titol[0]['title'])){ echo ' | <a style="color:#000001; text-decoration:none" href="#voluntariat">Crides de voluntariat</a>';}
		if (!empty($node->field_abast_pfvc_titol[0]['title'])){ echo ' | <a style="color:#000001; text-decoration:none" href="#pfvc">Cursos PFVC</a>';}
		if (!empty($node->field_abast_formacions_xarxanet[0]['safe']['nid'])){echo ' | <a style="color:#000001; text-decoration:none" href="#formacio">Altres formacions</a>';}
		if (!empty($node->field_abast_activitats_xarxanet[0]['safe']['nid'])){echo ' | <a style="color:#000001; text-decoration:none" href="#activitats">Agenda</a>';}
		if (!empty($node->field_abast_financament_xarxanet[0]['safe']['nid'])){echo ' | <a style="color:#000001; text-decoration:none" href="#financaments">Finançaments</a>';}
		foreach ($array_flex as $i) {
			$titol = 'field_abast_flexible_titol'.$i; 
			$titol = $node->$titol;
			if (!empty($titol[0]['value']))	echo ' | <a style="color:#000001; text-decoration:none" href="#flexible">'.$titol[0]['value'].'</a>';
		}
		for ($i=1; $i<=4; $i++) {
			$titol = 'field_monografic_titol_'.$i;
			$titol = $node->$titol;
			if(isset($titol[0]['value'])) echo ' | <a style="color:#000001; text-decoration:none" href="#bloc_lliure_'.$i.'">'.$titol[0]['value'].'</a>';
		}
		if (!empty($node->field_abast_entrevista_titol[0]['value']) || !empty($node->field_abast_entrevista_externa[0]['title'])){echo ' | <a style="color:#000001; text-decoration:none" href="#entrevista">'.$node->field_abast_entrevista_titol_sec[0]['value'].'</a>';}
		if ($node->field_abast_activat[0]["value"] !== '0'){ echo ' | <a style="color:#000001; text-decoration:none" href="#activat">Activa\'t</a>';}
	?>
	</td></tr>


	<!-- NOTÍCIES DESTACADES -->
	<?php if (!empty($destacades)){?>
		<tr><td colspan="2"><a name="destacats"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: Destacats</h1></td></tr>
		<tr><td colspan="2" style="border: 1px dashed #4C0000;">
			<table cellspacing="8">
				<?php
				$titulars = '<tr>';
				$imatges = '<tr>';
				foreach ($destacades as $destacada){
					$alt = empty($destacada['alt']) ? 'Imatge de la notícia '.$destacada['titular'] : $destacada['alt'];
					$titulars .= '<td width="33%" style="vertical-align: top;">';
					$titulars .= '<a href="'.$destacada['link'].'" style="font-weight: bold; color: #800000; font-size: 15px; text-decoration: none; font-family:Arial">'.$destacada['titular'].'</a></td>';
					$imatges .= '<td><a href="'.$destacada['link'].'" style="text-decoration: none"><img src="'.$pathroot.'/'.$destacada['imatge'].'" alt="'.$alt.'" height="194px" width="300px" style="border:0 none;"/></a></td>';
				}
				$titulars .= '</tr>';
				$imatges .= '</tr>';
				echo $titulars;
				echo $imatges;
				?>
			</table>
		</td></tr>
		<tr><td colspan="2" style="text-align: right;"><a href="#inici" style="text-decoration: none"><img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a></td></tr>
	<?php }?>
		
		
	<!-- NOTÍCIES -->
	<?php if (!empty($noticies)){?>
		<tr><td colspan="2"><a name="noticies"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: Notícies</h1></td></tr>
		<?php
		$curta = true;
		foreach ($noticies as $noticia){
			$alt = empty($destacada['alt']) ? 'Imatge de la notícia '.$noticia['titular'] : $noticia['alt'];
			$cont = '<table cellspacing="5" width="100%"><tr><td colspan="2" height="40px" style="vertical-align: top"><a href="'.$noticia['link'].'" style="font-weight: bold; color: #800000; font-size: 15px; text-decoration: none; font-family:Arial">'.$noticia['titular'].'</a></td></tr>';
			$cont .= '<tr><td style="vertical-align: top; width: 130px"><a href="'.$noticia['link'].'" style="text-decoration: none"><img src="'.$pathroot.'/'.$noticia['imatge'].'" alt="'.$alt.'" height="115" width="185" style="border:0 none;"/></a>';
			$cont .= '</td><td style="vertical-align: top"><p style="font-size: 12px; text-align: justify; margin: 0">';
			if ($curta){			
				$cont .= substr($noticia['teaser'], 0, strrpos(substr($noticia['teaser'], 0, $noticia_curta)," ")).' ...</p></td></tr></table></td>';
				echo '<tr><td width="33%" style="vertical-align: top">'.$cont.'</td>';
			}else{
				if (strlen($noticia['teaser'])>$noticia_llarga){
					$cont .= substr($noticia['teaser'], 0, strrpos(substr($noticia['teaser'], 0, $noticia_llarga)," ")).' ...</p></td></tr></table></td>';
				}else{
					$cont .= $noticia['teaser'].'</p></td></tr></table></td>';
				}
				echo '<td width="67%" style="vertical-align: top">'.$cont.'</td></tr>';			
			}
			$curta = !$curta;
		}
		if (!$curta) echo '<td width="67%" style="vertical-align: top"></td></tr>';	
		?>
		<tr><td colspan="2" style="text-align: right;">
			<a style="font-weight: bold; color: #000001; text-decoration: none" href="<?php echo $node->field_abast_noticies_enllac[0]['url']; ?>">
				<?php echo $node->field_abast_noticies_enllac[0]['title']; ?>
			</a>
			<a href="#inici" style="text-decoration: none">  <img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a>
		</td></tr>
	<?php } ?>
	
	
	<tr><td style="vertical-align: top">	
	<!-- VÍDEO -->
		<?php
			if (isset($node->field_abast_video[0]['data']['url']) && isset($node->field_abast_video[0]['filepath'])){
				$video_title = (isset($node->field_abast_video_titol[0]['value'])) ? $node->field_abast_video_titol[0]['value'] : "El vídeo de la quinzena";
				echo '<div style="border: 1px dashed #818181; margin-right: 8px; padding: 0 15px;">';
				echo '<p style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-align:center">'.$video_title.'</p>';
				echo '<a href="'.$node->field_abast_video[0]['data']['url'].'" style="text-decoration: none">';
				echo '<img src="'.$pathroot.'/'.$node->field_abast_video[0]['filepath'].'" alt="'.$node->field_abast_video[0]['data']['alt'].'" width="268" style="margin-bottom: 15px; border:0 none;"/></a>';
				echo '</div>';
			}
		?>


	<!-- BANNERS -->
		<!-- BANNERS FIXES -->
		<?php
			foreach ($node->field_abast_banner_fixe as $banner){
				echo '<br/><a href="'.$banners_fixes[$banner['value']][1].'" style="text-decoration:none">';
				echo '<img src="'.$banners_fixes[$banner['value']][0].'" alt="'.$banner['value'].'" style="margin: 10px 0; border:0 none;"/></a>';
			}
		?>
		
		<!-- BANNERS NOUS -->
		<?php
			foreach ($node->field_abast_banner_nou as $banner){
				if(isset($banner['filepath'])){
					echo '<br/><a href="'.$banner['data']['url'].'" style="text-decoration:none">';
					echo '<img src="'.$pathroot.'/'.$banner['filepath'].'" alt="'.$banner['data']['alt'].'" style="margin: 10px 0; border:0 none;"/></a>';
				}
			} 
		?>
			
	</td><td style="vertical-align:top">


	<!-- VOLUNTARIAT -->
	<?php if(!empty($node->field_abast_voluntariat_xarxanet[0]['safe']['nid']) || !empty($node->field_abast_voluntariat_titol[0]['title'])){?>
		<a name="voluntariat"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: Crides de voluntariat</h1>
		<?php 
		foreach ($node->field_abast_voluntariat_xarxanet as $key => $voluntariat){
			if(!empty($voluntariat['safe']['nid'])){
				$node_ =  node_load($voluntariat['safe']['nid']);
				echo '<a href="'.$pathroot.'/'.$node_->path.'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$node_->title.'</a>';
				echo '<p style="font-size: 12px; margin: 0; vertical-align: top; margin: 5px 0 10px;">
						<b>Entitat: </b>'.$node->field_abast_voluntariat_entitat[$key]['value'].'<br/>
						<b>Lloc: </b>'.$node->field_abast_voluntariat_lloc[$key]['value'].'<br/>
						<b>Dedicació: </b>'.$node->field_abast_voluntariat_dedicaci[$key]['value'].'<br/>
						<b>Perfil: </b>'.str_replace(array('<p>', '</p>'), '', $node->field_abast_voluntariat_perfil[$key]['value']).'
					</p>';
			}
		}
		foreach ($node->field_abast_voluntariat_titol as $key => $voluntariat){
			if(!empty($voluntariat['title'])){
				echo '<a href="'.$voluntariat['url'].'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$voluntariat['title'].'</a>';
				echo '<p style="font-size: 12px; margin: 0; vertical-align: top; margin: 5px 0 10px;">
						<b>Entitat: </b>'.$node->field_abast_voluntariat_entitat[$key]['value'].'<br/>
						<b>Lloc: </b>'.$node->field_abast_voluntariat_lloc[$key]['value'].'<br/>
						<b>Dedicació: </b>'.$node->field_abast_voluntariat_dedicaci[$key]['value'].'<br/>
						<b>Perfil: </b>'.str_replace(array('<p>', '</p>'), '', $node->field_abast_voluntariat_perfil[$key]['value']).'
					</p>';
			}
		}
		?>	
		<p style="text-align: right">
			<a style="font-weight: bold; color: #000001; text-decoration: none" href="http://www.voluntariat.org/Promoci%C3%B3delvoluntariat/Volsfervoluntariat.aspx">
				Més crides a voluntariat
			</a>
			<a href="#inici" style="text-decoration: none">  <img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a>
		</p>
	<?php }?>


	<!-- FORMACIÓ PFVC -->
	<?php if(!empty($node->field_abast_pfvc_titol[0]['title'])){?>
		<a name="pfvc"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: Cursos del Pla de Formació del voluntariat de Catalunya (PFVC)</h1>
		<?php
		foreach ($node->field_abast_pfvc_titol as $key => $pfvc){
			if (!empty($pfvc['title'])){
				echo '<a href="'.$pfvc['url'].'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$pfvc['title'].'</a>';
				echo '	<p style="font-size: 12px; margin: 0; vertical-align: top; margin: 5px 0 10px;">
						<b>Data d\'inici: </b>'.$node->field_abast_pfvc_dates[$key]['value'].'<br/>
						<b>Lloc: </b>'.$node->field_abast_pfvc_lloc[$key]['value'].'<br/>
						<b>Entitat: </b>'.$node->field_abast_pfvc_entitat[$key]['value'].'</p>';
			}
		}
		?>
		<p style="text-align: right">
			<a style="font-weight: bold; color: #000001; text-decoration: none" href="http://www.voluntariat.org/Formaci%C3%B3/www.voluntariat.org/tabid/110/mode/E/Default.aspx">
				Més formacions
			</a>
			<a href="#inici" style="text-decoration: none">  <img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a>
		</p>
	<?php }?>
	
	
	<!-- ALTRES FORMACIONS -->
	<?php if(!empty($node->field_abast_formacions_xarxanet[0]['safe']['nid'])){?>
		<a name="formacio"><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: Altres formacions</h1>
		<?php
		foreach ($node->field_abast_formacions_xarxanet as $key => $formacio){
			if (!empty($formacio['safe']['nid'])){
				$node_ = node_load($formacio['safe']['nid']);
				
				if(isset($node->field_abast_formacions_dates[$key]['value'])){
					$data = $node->field_abast_formacions_dates[$key]['value'];
				}else{
					$data = strtotime($node_->field_date_event[0]['value']);
					$data = $dies[date('N', $data)-1].', '.date('j', $data).' '.$mesos[date('n', $data)-1].' de '.date('Y', $data);
				}
				$location = $node_->location['city'];
				if ($node_->location['name']) $location = $node_->location['name'].', '.$location; 							
				$lloc = (isset($node->field_abast_formacions_lloc[$key]['value'])) ? $node->field_abast_formacions_lloc[$key]['value'] : $location;
				$entitat = (isset($node->field_abast_formacions_entitat[$key]['value'])) ? $node->field_abast_formacions_entitat[$key]['value'] : $node_->field_organizer[0]['value'];				
				echo '<a href="'.$pathroot.'/'.$node_->path.'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$node_->title.'</a>';
				echo '	<p style="font-size: 12px; margin: 0; vertical-align: top; margin: 5px 0 10px;">
						<b>Data d\'inici: </b>'.$data.'<br/>
						<b>Lloc: </b>'.$lloc.'<br/>
						<b>Entitat: </b>'.$entitat.'</p>';
			}
		}
		?>
		<p style="text-align: right">
			<a style="font-weight: bold; color: #000001; text-decoration: none" href="<?php echo $pathroot;?>/agenda/curs">
				Més formacions
			</a>
			<a href="#inici" style="text-decoration: none">  <img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a>
		</p>
	<?php }?>


	<!-- ACTIVITATS -->
	<?php if(!empty($node->field_abast_activitats_xarxanet[0]['safe']['nid'])){?>
		<a name="activitats"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: Agenda d'activitats</h1>
		<?php
		/*foreach ($node->field_abast_activitats_xarxanet as $key => $activitat){
			if (!empty($activitat['safe']['nid'])){
				$node_ = node_load($activitat['safe']['nid']);
				$data = (isset($node->field_abast_activitats_dates[$key]['value'])) ? $node->field_abast_activitats_dates[$key]['value'] : date('d/m/y', strtotime($node_->field_date_event[0]['value']));
				echo '<p><a href="'.$pathroot.'/'.$node_->path.'" style="color: #000001; font-size: 12px; text-decoration: none">'.$node_->title.'</a>';
				echo ' - '.$data.'</p>';
			}
		}*/		
		foreach ($node->field_abast_activitats_xarxanet as $key => $activitat){
			if (!empty($activitat['safe']['nid'])){
				$node_ = node_load($activitat['safe']['nid']);
				
				if(isset($node->field_abast_activitats_dates[$key]['value'])){
					$data = $node->field_abast_activitats_dates[$key]['value'];
				}else{
					$data = strtotime($node_->field_date_event[0]['value']);
					$data = $dies[date('N', $data)-1].', '.date('j', $data).' '.$mesos[date('n', $data)-1].' de '.date('Y', $data);
				}
				$location = $node_->location['city'];
				if ($node_->location['name']) $location = $node_->location['name'].', '.$location;
				$lloc = (isset($node->field_abast_activitats_lloc[$key]['value'])) ? $node->field_abast_activitats_lloc[$key]['value'] : $location;
				$entitat = (isset($node->field_abast_activitats_entitat[$key]['value'])) ? $node->field_abast_activitats_entitat[$key]['value'] : $node_->field_organizer[0]['value'];				
				echo '<a href="'.$pathroot.'/'.$node_->path.'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$node_->title.'</a>';
				echo '	<p style="font-size: 12px; margin: 0; vertical-align: top; margin: 5px 0 10px;">
						<b>Data d\'inici: </b>'.$data.'<br/>
						<b>Lloc: </b>'.$lloc.'<br/>
						<b>Entitat: </b>'.$entitat.'</p>';
			}
		}
		?>
		<p style="text-align: right">
			<a style="font-weight: bold; color: #000001; text-decoration: none" href="<?php echo $pathroot;?>/agenda">
				Més agenda
			</a>
			<a href="#inici" style="text-decoration: none">  <img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a>
		</p>
	<?php }?>
	
	
	<!-- FINANÇAMENTS -->
	<?php if(!empty($node->field_abast_financament_xarxanet[0]['safe']['nid'])){?>
		<a name="financaments"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: Finançaments</h1>
		<?php
		foreach ($node->field_abast_financament_xarxanet as $key => $financament){
			if (!empty($financament['safe']['nid'])){
				$node_ = node_load($financament['safe']['nid']);
				echo '<a href="'.$pathroot.'/'.$node_->path.'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$node_->title.'</a>';
				if (!empty($node->field_abast_financament_termini[$key]['value'])){
					$termini = $node->field_abast_financament_termini[$key]['value'];
				}else{
					$time1 = strtotime($node_->field_date[0]['value']);
					$time2 = strtotime($node_->field_date[0]['value2']);
					$termini =	'Del '.date('j', $time1).' '.$mesos[date('n', $time1)-1].' de '.date('Y', $time1).' al '.date('j', $time2).' '.$mesos[date('n', $time2)-1].' de '.date('Y', $time2);
				}  
				$convocant = ($node->field_abast_financament_convocan[$key]['value']) ? $node->field_abast_financament_convocan[$key]['value'] : strip_tags($node_->field_convocant[0]['value']);
				echo '<p style="font-size: 12px; margin: 0; vertical-align: top; margin: 5px 0 10px;"><b>Termini: </b>'.$termini.'<br/><b>Convocant: </b>'.$convocant.'</p>';
			}
		}
		?>
		<p style="text-align: right">
			<a style="font-weight: bold; color: #000001; text-decoration: none" href="<?php echo $pathroot;?>/financaments">
				Més finançaments
			</a>
			<a href="#inici" style="text-decoration: none">  <img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a>
		</p>
	<?php }?>
	
	
	<!-- BLOC FLEXIBLE -->
		<?php
		foreach ($array_flex as $i) {
			$titol = 'field_abast_flexible_titol'.$i; $titol = $node->$titol;
			$contingut = 'field_abast_flexible_contingut'.$i; $contingut = $node->$contingut;
			$extern = 'field_abast_flexible_extern'.$i; $extern = $node->$extern;
			$resum = 'field_abast_flexible_resum'.$i; $resum = $node->$resum;
			$imatge_alt = 'field_abast_flexible_imatge'.$i; $imatge_alt = $node->$imatge_alt;
			$enllac = 'field_abast_flexible_enllac'.$i; $enllac = $node->$enllac;
						
			if (!empty($titol[0]['value'])){
				echo '<a name="flexible"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: '.$titol[0]['value'].'</h1>';
				//Continguts Xarxanet
				foreach ($contingut as $key => $flexible){
					if (!empty($flexible['safe']['nid'])){
						$node_ = node_load($flexible['safe']['nid']);
						if (isset($node_->field_agenda_imatge[0]['filepath'])){
							$imatge = imagecache_create_path('abast-petit', $node_->field_agenda_imatge[0]['filepath']);
							$alt = $node_->field_agenda_imatge[0]['data']['alt'];
						}else{
							$imatge = imagecache_create_path('abast-petit', $node_->field_imatges[0]['filepath']);
							$alt = $node_->field_imatges[0]['data']['alt'];
							
						}
						echo '<a href="'.$pathroot.'/'.$node_->path.'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$node_->title.'</a>';
						echo '<table cellspacing="5" style="margin-bottom: 10px"><tr><td style="vertical-align: top">';
						echo '<a href="'.$pathroot.'/'.$node_->path.'" style="text-decoration: none"><img src="'.$pathroot.'/'.$imatge.'" alt="'.$alt.'" height="115" width="185" style="border:0 none;"/></a></td><td style="vertical-align: top">';
						echo '<p style="font-size: 12px; text-align: justify; margin: 0; vertical-align: top">'.strip_tags($node_->field_resum[0]['value']).'</p></td></tr></table>';
					}
				}
				//Continguts externs
				$i = 0;
				while (!empty($extern[$i]['title'])) {
					$imatge = $imatge_alt[$i]['filepath'];
					$alt = $imatge_alt[$i]['alt'];
					echo '<a href="'.$extern[$i]['url'].'" style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none">'.$extern[$i]['title'].'</a>';
					echo '<table cellspacing="5" style="margin-bottom: 10px"><tr><td style="vertical-align: top">';
					echo '<a href="'.$extern[$i]['url'].'" style="text-decoration: none"><img src="'.$pathroot.'/'.$imatge.'" alt="'.$alt.'" height="115" width="185" style="border:0 none;"/></a></td><td style="vertical-align: top">';
					echo '<p style="font-size: 12px; text-align: justify; margin: 0; vertical-align: top">'.strip_tags($resum[$i]['value'],'<a>').'</p></td></tr></table>';
					$i++;
				}				
				
				echo '<p style="text-align: right">';
				if (!empty($enllac[0]['title'])){
					echo '<a href="'.$enllac[0]['url'].'" style="font-weight: bold; color: #000001; text-decoration: none">'.$enllac[0]['title'].'</a>';
				}	
				echo '<a href="#inici" style="text-decoration: none">  <img src="'.$pathroot.'/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a></p>';
			}
		}
		?>
	
	<!-- BLOC LLIURE -->
		<?php
		for ($i=1; $i<=4; $i++) {
			$titol = 'field_monografic_titol_'.$i;
			$titol = $node->$titol;
			$cos = 'field_monografic_cos_'.$i;
			$cos = $node->$cos;
			if(isset($titol[0]['value'])) echo '<a name="bloc_lliure_'.$i.'"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: '.$titol[0]['value'].'</h1>';
			if(isset($cos[0]['value'])) echo $cos[0]['value'];
			if(isset($titol[0]['value'])) echo '<p style="text-align:right"><a href="#inici" style="text-decoration: none">  <img src="'.$pathroot.'/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a></p>';
		}
		?>
	
	<!-- ENTREVISTA -->
		<?php
		$i = 0;
		if (!empty($node->field_abast_entrevista_titol[0]['value']) || !empty($node->field_abast_entrevista_externa[0]['title'])) {echo '<a name="entrevista"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 10px 0 5px;">:: '.$node->field_abast_entrevista_titol_sec[0]['value'].'</h1>';}
		while (!empty($node->field_abast_entrevista_cita[$i]['value'])){
			if ($node_ =  node_load($node->field_abast_entrevista[$i]['safe']['nid'])) {
				if (isset($node_->field_agenda_imatge[0]['filepath'])){
					$imatge = imagecache_create_path('abast-petit', $node_->field_agenda_imatge[0]['filepath']);
					$alt = $node_->field_agenda_imatge[0]['data']['alt'];
				}else{
					$imatge = imagecache_create_path('abast-petit', $node_->field_imatges[0]['filepath']);
					$alt = $node_->field_imatges[0]['data']['alt'];
				
				}
				$titol = (!empty($node->field_abast_entrevista_titol[$i]['value'])) ? $node->field_abast_entrevista_titol[$i]['value'] : $node_->title;
				$link = $pathroot.'/'.$node_->path;
			} else {
				$titol = $node->field_abast_entrevista_externa[$i]['title'];
				$link = $node->field_abast_entrevista_externa[$i]['url'];
				$alt = $node->field_abast_entrevista_imatge[$i]['data']['alt'];
				$imatge = $node->field_abast_entrevista_imatge[$i]['filepath'];
			}			
			echo '<table cellspacing="5" style="margin-bottom: 10px"><tr><td style="vertical-align: top">';
			echo '<a href="'.$link.'" style="text-decoration: none"><img src="'.$pathroot.'/'.$imatge.'" alt="'.$alt.'" height="115" width="185" style="border:0 none;"/></a></td><td style="vertical-align: top">';
			echo '<a href="'.$link.'" style="font-weight: bold; color: #800000; font-size: 15px; text-decoration: none; font-family:Arial">'.$titol.'</a>';
			echo '	<table style="margin-left:85px; margin-top:5px; width:auto"><tr><td style="vertical-align:top"><img src="'.$pathroot.'/sites/default/files/butlletins/abast/cometes1.gif" alt="cometes" width="15px"/></td>
					<td style="font-size: 12px; text-align:center; padding:5px 0; width:180px">'.strip_tags($node->field_abast_entrevista_cita[$i]['value']).'</td>
					<td style="vertical-align:bottom"><img src="'.$pathroot.'/sites/default/files/butlletins/abast/cometes2.gif" alt="cometes" width="15px"/></td></tr></table>';	
			echo '</td></tr></table>';			
			$i++;
		}
		echo '<p style="text-align:right"><a href="#inici" style="text-decoration: none">  <img src="'.$pathroot.'/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a></p>';
		?>
	
		
	<!-- ACTIVA'T -->
	<?php if ($node->field_abast_activat[0]["value"] !== '0') { ?>
		<a name="activat"></a><h1 style="font-family:Arial; font-size:17px; font-weight:bold; color:#818181; margin: 15px 0 5px;">:: Activa't</h1>
		<a style="font-weight: bold; color: #800000; font-size: 14px; font-family:Arial; text-decoration: none" href="<?php echo $pathroot;?>/noticies/he-danar-informar-me-i-fer-voluntariat">
			On he d'anar per informar-me i fer voluntariat?
		</a>
		<table cellspacing="5">
			<tr><td>
				<a href="<?php echo $pathroot;?>/noticies/he-danar-informar-me-i-fer-voluntariat" style="text-decoration:none">
					<img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/mapa_activat_2.jpg" alt="mapa dels centres de voluntariat a Catalunya" style="border:0 none;"/>
				</a>
			</td><td>
				<p style="font-size: 12px; text-align: justify; margin: 0;">
					No saps a on has d’anar per informar-te sobre el voluntariat? T’oferim un mapa de les principals oficines de voluntariat municipal arreu de Catalunya. També queden recollides les principals entitats de referència en l’àmbit del voluntariat als diferents pobles i ciutats. 
				</p>
				<p style="text-align: right">
					<a href="#inici" style="text-decoration: none">  <img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/fletxeta.gif" alt="torna a dalt" style="border:0 none;"/></a>
				</p>
			</td></tr>
		</table>
	<?php } ?>
	</td>
</tr><tr>	
	<!-- PEU -->	
	<td colspan="2" style="border-top: dotted 2px #800000; border-bottom: dotted 2px #800000; font-size:1px">&nbsp;</td>
</tr><tr>
	<td td colspan="2">
		<table cellspacing="10">
			<tr><td>	
				<a href="http://www20.gencat.cat/portal/site/bsf" style="text-decoration:none"><img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/logo_benestarSocial.jpg" alt="logo benestar i familia" height="32" style="display: inline; border:0 none;"/></a>
			</td><td>
				<a href="http://www.peretarres.org" style="text-decoration:none"><img src="<?php echo $pathroot;?>/sites/default/files/butlletins/abast/logo_FPT.jpg" alt="logo fundacio pere tarres" height="32" style="display: inline; border:0 none;"/></a>
			</td><td>
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/es/deed.ca"><img alt="Licencia de Creative Commons" src="http://i.creativecommons.org/l/by-nc-sa/3.0/es/88x31.png" style="border:0 none;"/></a>
			</td></tr>
		</table>	
		<p style="font-size: 10px; text-align: justify; margin: 0">D'acord amb l’article 5.2 de la Llei orgànica 15/1999, de protecció de dades de caràcter personal, us informem que les dades personals han estat recollides, incorporades i tractades en un fitxer automatitzat les vostres , anomenat "Entitats de voluntariat", la finalitat del qual és trametre les comunicacions que el/la ciutadà/ana o l’entitat ha requerit . L'òrgan responsable del fitxer és la Direcció General d'Acció Cívica i Comunitària i l'adreça on la persona o entitat interessada pot exercir els drets d'accés, rectificació, cancel·lació i oposició és el Servei de Promoció de l’Associacionisme i el Voluntariat (Passeig del Taulat, 266-270, 08019, Barcelona) 
		<br/>Aquest butlletí és una iniciativa del Departament de Benestar Social i Família de la Generalitat de Catalunya, coeditat amb la Fundació Pere Tarrés. ISSN: 1138-4352</p> 
	</td>
</tr><tr>
	<td colspan="2" style="border-top: dotted 2px #800000; border-bottom: dotted 2px #800000; font-size:1px">&nbsp;</td>
</tr><tr>
	<td colspan="2">
		<p style="font-size: 11px; margin: 0"> 
			<a style="color: #800000; text-decoration: none" href="http://xarxanet.org/sites/default/files/subscripcions_abast/alta.html">alta</a> ::  
			<a style="color: #800000; text-decoration: none" href="http://xarxanet.org/sites/default/files/subscripcions_abast/baixa.html">baixa</a> ::   
			<a style="color: #800000; text-decoration: none" href="mailto:alabast@voluntariat.org?Subject=Consulta%20butlletí">contacte</a> ::  
			<a style="color: #800000; text-decoration: none" href="http://xarxanet.org/hemeroteca-butlleti-labast">butlletins anteriors</a>
		</p>
	</td>
</tr>
<tr>
	<td colspan="2" style="text-align:right; font-size 11px;">
		<a style="text-decoration:none; color:#4D4D4D;" href="http://www.gencat.cat/web/cat/copyright.htm">© Generalitat de Catalunya</a>  
	</td>
</tr>
</table>
