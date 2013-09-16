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
$pathroot = 'http://www.xarxanet.org';

// Data
$mesos = array('de gener', 'de febrer', 'de març', 'd\'abril', 'de maig', 'de juny', 'de juliol', 'd\'agost', 'de setembre', 'd\'octubre', 'de novembre', 'de desembre');
$dies = array('Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte', 'Diumenge');

//Noticia principal esquerra
$noticia_prin_esq = array();
if ($node_ =  node_load($node->field_financ_prin_xarxanet_esq[0]['safe']['nid'])) {
	//Noticia Xarxanet
	if (isset($node_->field_agenda_imatge[0]['filepath'])){
		$noticia_prin_esq['imatge'] = imagecache_create_path('financ-gran', $node_->field_agenda_imatge[0]['filepath']);
		$noticia_prin_esq['alt'] = $node_->field_agenda_imatge[0]['data']['alt'];
	}else{
		$noticia_prin_esq['imatge'] = imagecache_create_path('financ-gran', $node_->field_imatges[0]['filepath']);
		$noticia_prin_esq['alt'] = $node_->field_imatges[0]['data']['alt'];
	}
	$noticia_prin_esq['title'] = $node_->title;
	$noticia_prin_esq['teaser'] = strip_tags($node_->field_resum[0]['value']);
	$noticia_prin_esq['link'] = $pathroot.'/'.$node_->path;
} else {
	//Noticia externa
	$noticia_prin_esq['title'] = $node->field_financ_prin_ext_esq[0]['title'];
	$noticia_prin_esq['link'] = $node->field_financ_prin_ext_esq[0]['url'];
	$noticia_prin_esq['teaser'] = strip_tags($node->field_financ_prin_resum_esq[0]['value']);
	$noticia_prin_esq['imatge'] = $node->field_financ_prin_foto_esq[0]['filepath'];
	$noticia_prin_esq['alt'] = $node->field_financ_prin_foto_esq[0]['data']['alt'];
}


//Noticia principal dreta
$noticia_prin_dreta = array();
if ($node_ =  node_load($node->field_financ_prin_xarxanet_dreta[0]['safe']['nid'])) {
	//Noticia Xarxanet
	if (isset($node_->field_agenda_imatge[0]['filepath'])){
		$noticia_prin_dreta['imatge'] = imagecache_create_path('financ-gran', $node_->field_agenda_imatge[0]['filepath']);
		$noticia_prin_dreta['alt'] = $node_->field_agenda_imatge[0]['data']['alt'];
	}else{
		$noticia_prin_dreta['imatge'] = imagecache_create_path('financ-gran', $node_->field_imatges[0]['filepath']);
		$noticia_prin_dreta['alt'] = $node_->field_imatges[0]['data']['alt'];
	}
	$noticia_prin_dreta['title'] = $node_->title;
	$noticia_prin_dreta['teaser'] = strip_tags($node_->field_resum[0]['value']);
	$noticia_prin_dreta['link'] = $pathroot.'/'.$node_->path;
} else {
	//Noticia Externa
	$noticia_prin_dreta['title'] = $node->field_financ_prin_ext_dreta[0]['title'];
	$noticia_prin_dreta['link'] = $node->field_financ_prin_ext_dreta[0]['url'];
	$noticia_prin_dreta['teaser'] = strip_tags($node->field_financ_prin_resum_dreta[0]['value']);
	$noticia_prin_dreta['imatge'] = $node->field_financ_prin_foto_dreta[0]['filepath'];
	$noticia_prin_dreta['alt'] = $node->field_financ_prin_foto_dreta[0]['data']['alt'];
}


//Noticia secundaria
$noticia_secundaria = array();
for ($i = 1; $i <= 4; $i++){
	$noticia = 'field_financ_secund_xarxanet_'.$i;
	$noticia = $node->$noticia;
	if ($node_ =  node_load($noticia[0]['safe']['nid'])) {
		//Noticia Xarxanet
		if (isset($node_->field_agenda_imatge[0]['filepath'])){
			$noticia_secundaria[$i]['imatge'] = imagecache_create_path('financ-petit', $node_->field_agenda_imatge[0]['filepath']);
			$noticia_secundaria[$i]['alt'] = $node_->field_agenda_imatge[0]['data']['alt'];
		}else{
			$noticia_secundaria[$i]['imatge'] = imagecache_create_path('financ-petit', $node_->field_imatges[0]['filepath']);
			$noticia_secundaria[$i]['alt'] = $node_->field_imatges[0]['data']['alt'];
		}
		$noticia_secundaria[$i]['title'] = $node_->title;
		$noticia_secundaria[$i]['teaser'] = strip_tags($node_->field_resum[0]['value']);
		$noticia_secundaria[$i]['link'] = $pathroot.'/'.$node_->path;
	} else {
		//Noticia externa
		$foto = 'field_financ_secund_foto_'.$i;
		$foto = $node->$foto;
		$titular = 'field_financ_secund_ext_'.$i;
		$titular = $node->$titular;
		$resum = 'field_financ_secund_resum_'.$i;
		$resum = $node->$resum;
		$noticia_secundaria[$i]['title'] = $titular[0]['title'];
		$noticia_secundaria[$i]['link'] = $titular[0]['url'];
		$noticia_secundaria[$i]['teaser'] = strip_tags($resum[0]['value']);
		$noticia_secundaria[$i]['imatge'] = $foto[0]['filepath'];
		$noticia_secundaria[$i]['alt'] = $foto[0]['data']['alt'];
	}
}

//Finançaments
$lastweek = $node->created - 604800;
$nodes = db_query('SELECT nid FROM {node} WHERE type="%s" AND status=1 ORDER BY created DESC', 'financament_full');
$financ_nodes = array();

while ($row = db_fetch_array($nodes)){
	$financ_node = node_load($row['nid']);
	$financ_end = strtotime($financ_node->field_date[0][value2]);
	if ($financ_end > $node->created){
		if (($financ_node->created > $lastweek) || (count($financ_nodes) < 10)){
			$financ_start = strtotime($financ_node->field_date[0][value]);
			$key = $financ_end;
			while (!empty($financ_nodes[$key])) $key++;
			$financ_nodes[$key] = array( 'title' => $financ_node->title,
										'link' => $pathroot.'/'.$financ_node->path,
										'teaser' => strip_tags($financ_node->field_resum[0]['value']),
										'convocant' => strip_tags($financ_node->field_convocant[0]['value']),
										'termini' => date('d/m/Y', $financ_start).' - '.date('d/m/Y', $financ_end));
		} else {
			break;
		}
	}
}
ksort($financ_nodes);
?>

<table style="font-family: Arial, Helvetica; font-size: 13px;" width="910px" style="margin:auto" cellspacing="0px">
	<!-- CAPÇALERA -->
	<tr><td colspan="2" style="border: 1px solid; border-bottom: none; padding-right: 10px">
		<p style="padding: 2px; font-size: 11px; text-align:right"> Si no visualitzes correctament el butlletí clica aquest <a href="<?php echo $pathroot.'/node/'.$node->nid?>" style="text-decoration:none; color: #B2290C; font-weight: bold;">enllaç</a></p>
	</td></tr>
	<tr><td style="border-left: 1px solid; padding-left: 10px">
		<a href="http://www.xarxanet.org" style="text-decoration:none">
			<img src="http://www.xarxanet.org/sites/all/themes/genesis/genesis_xarxanet/images/header-logo-xarxanet.gif" alt="logotip xarxanet" style="margin-left:5px; border: 0 none"/>
		</a>
	</td><td style="border-right: 1px solid; padding-right: 10px">
		<p style="font-size:38px; color:#B2290C; text-align:right; font-weight:bold; margin:10px 5px">Finançament</p>
	</td></tr>
	<tr style="background-color:#CCCCCC; color:#53544F; font-weight:bold;"><td style="padding: 5px 10px; border-top:3px solid #53544F; border-bottom: 15px solid white;">
		<?php
			$created = $node->created; 
			echo $dies[date('N', $created)-1].', '.date('j', $created).' '.$mesos[date('n', $created)-1].' de '.date('Y', $created).' - Num. '.$title;
		?>
	</td><td style="text-align: right; padding: 5px 10px; border-top:3px solid #53544F; border-bottom: 15px solid white;">
		<a href="http://www.xarxanet.org/hemeroteca_financament" style="text-decoration:none; color:#53544F">Butlletins anteriors</a>
	</td></tr>
	
	<!-- NOTÍCIES PRINCIPALS -->
	<tr><td>
		<a href="<?php echo $noticia_prin_esq['link']?>" style="text-decoration:none">
			<img src="<?php echo $pathroot.'/'.$noticia_prin_esq['imatge']?>" alt="<?php echo $noticia_prin_esq['alt']?>" style="border: 0 none; margin-right: 10px;"/>
		</a>
	</td><td>
		<a href="<?php echo $noticia_prin_dreta['link']?>" style="text-decoration:none">
			<img src="<?php echo $pathroot.'/'.$noticia_prin_dreta['imatge']?>" alt="<?php echo $noticia_prin_dreta['alt']?>" style="border: 0 none; margin-left: 10px;"/>
		</a>
	</td></tr>
	<tr><td>
		<a href="<?php echo $noticia_prin_esq['link']?>" style="text-decoration:none; color:#53544F; font-family:Verdana; font-size:15pt; line-height: 1.3em">
			<?php echo $noticia_prin_esq['title']?>
		</a>
	</td><td style="padding-left: 10px;">
		<a href="<?php echo $noticia_prin_dreta['link']?>" style="text-decoration:none; color:#53544F; font-family:Verdana; font-size:15pt; line-height: 1.3em">
			<?php echo $noticia_prin_dreta['title']?>
		</a>
	</td></tr>
	<tr><td style="vertical-align: top">
		<p style="margin: 2px 0;"><?php echo $noticia_prin_esq['teaser']?></p>
	</td><td style="vertical-align: top; padding-left: 10px;">
		<p style="margin: 2px 0;"><?php echo $noticia_prin_dreta['teaser']?></p>
	</td></tr>
</table>

<table style="font-family: Arial, Helvetica; font-size: 13px; margin-top:15px;" width="910px" cellspacing="0px">
	<tr><td style="vertical-align:top;">
		
		<!-- ÚLTIMES CONVOCATÒRIES -->
		<table cellspacing="0px" style="margin-right: 15px; font-family: Arial, Helvetica; font-size: 13px;" width="627px">
			<tr><td colspan="2"><img src="<?php echo $pathroot?>/sites/default/files/butlletins/financament/sep_llarg.jpg" alt="separador"/></td></tr>
			<tr style="background-color:#B2290C; color:#FFFFFF; font-weight:bold">
				<td colspan="2" style="padding: 4px">Últimes convocatòries</td>
			</tr>
			<?php foreach ($financ_nodes as $financ_node){?>
				<tr><td style="padding-top: 10px; width: 18px; vertical-align:top">
					<img src="<?php echo $pathroot;?>/sites/default/files/butlletins/financament/red_box.png" alt="punt vermell" width="18px"/>
				</td><td style="padding: 10px 0 5px 5px;">
					<a style="text-decoration:none; color:#53544F; font-family:Verdana; font-size:12pt; line-height: 1.3em" href="<?php echo $financ_node['link']?>">
						<?php echo $financ_node['title']?>
					</a>
				</td></tr>
				<tr><td colspan="2">
					<p style="margin: 0px;"><?php echo $financ_node['teaser']?>
					<br/><b>Convocant: </b><?php echo $financ_node['convocant']?>
					<br/><b>Termini: </b><?php echo $financ_node['termini']?></p>
					<p style="margin-top:0px; text-align: right;"><a style="text-decoration:none; font-weight:bold; color:#B2290C;" href="<?php echo $financ_node['link']?>">Més informació</a></p>
				</td></tr>
			
			<?php }?>
		</table>
	</td><td style="vertical-align:top; padding-right: 10px;">
		<table cellspacing="0px" style="font-family: Arial, Helvetica; font-size: 13px;">
			<tr><td><img src="<?php echo $pathroot?>/sites/default/files/butlletins/financament/sep_curt.jpg" alt="separador"/></td></tr>
			
			<!-- MENÚ DRETA -->
			<tr style="background-color:#CCCCCC; height: 35px;"><td style="padding: 0px 3px; border-bottom:solid white">
				<table style="font-family: Arial, Helvetica; font-size: 13px;"><tr><td>
					<a href="http://www.xarxanet.org/financaments" style="color:#53544F; text-decoration:none; font-weight:bold;">
						Cerca el teu finançament
					</a>
				</td><td>
					<a href="http://www.xarxanet.org/financaments" style="color:#53544F; text-decoration:none">
						<img src="<?php echo $pathroot;?>/sites/default/files/butlletins/financament/lupa.png" alt="lupa" width="25px" style="margin-left:55px; border: 0 none;"/>
					</a>
				</td></tr></table>
			</td></tr>
			<tr style="background-color:#CB239F; font-weight:bold;"><td style="padding: 10px; border-bottom:solid white">
				<a href="http://www.xarxanet.org/financaments/premis" style="color:#FFFFFF; text-decoration:none">Més premis</a>
			</td></tr>
			<tr style="background-color:#D62369; color:#FFFFFF; font-weight:bold;"><td style="padding: 10px; border-bottom:solid white">
				<a href="http://www.xarxanet.org/financaments/subvencions" style="color:#FFFFFF; text-decoration:none">Més subvencions</a>
			</td></tr>
			<tr style="background-color:#BD523F; color:#FFFFFF; font-weight:bold;"><td style="padding: 10px; border-bottom:solid white">
				<a href="http://www.xarxanet.org/financaments/beques" style="color:#FFFFFF; text-decoration:none">Més beques</a>
			</td></tr>
			<tr><td style="border-top: 15px solid white; padding: 0px;">
			
			<!-- BANNERS -->
			<?php foreach ($node->field_financ_banner as $banner) {
				if (isset($banner['filepath'])) {?>
					<a style="text-decoration:none" href="<?php echo $banner['data']['url']?>">
						<img src="<?php echo $pathroot.'/'.$banner['filepath']?>" alt="<?php echo $banner['data']['alt']?>" width="265px" style="margin:2px 0; border: 0 none"/>
					</a>
					</td></tr><tr><td>	
			<?php } 
			}?>
			<!-- BANNER FIXE -->
			<a style="text-decoration:none" href="http://www.twitter.com/ajuts_entitats">
				<img src="<?php echo $pathroot?>/sites/default/files/butlletins/financament/banner_twitter.jpg" alt="Banner Twitter" width="265px" style="margin:2px 0; border: 0 none"/>
			</a>
			</td></tr>	
			
			<tr><td style="border-bottom: 15px solid white;">
			<!-- NOTICIA SECUNDARIA -->
			<?php foreach ($noticia_secundaria as $secundaria) {?>
				<a style="text-decoration:none" href="<?php echo $secundaria['link']?>">
					<img alt="<?php echo $secundaria['alt']?>" src="<?php echo $pathroot.'/'.$secundaria['imatge']?>" style="margin-top: 15px; border: 0 none">
				</a></td></tr>
				<tr><td>
					<a style="text-decoration:none; font-family:Verdana; font-size:12pt; line-height: 1.3em; color: #53544F;" href="<?php echo $secundaria['link']?>">
					<?php echo $secundaria['title']?>			
				</a></td></tr>
				<tr><td>
					<p style="margin-top: 5px;"><?php echo $secundaria['teaser']?></p>
				</td></tr><tr><td>
			<?php }?>
			
			</td></tr>
		</table>
	</td></tr>
	
	<!-- PEU -->
	<tr style="background-color:#CCCCCC; border-top:3px solid #53544F;">
	<td colspan="2" style="border-top: 3px solid #53544F; padding: 4px;">
		<table style="font-family: Arial, Helvetica; font-size: 13px; color:#53544F;">
			<tr><td colspan="2" style="padding-left:10px;">
				<b>Xarxanet.org és un projecte de</b>
			</td><td colspan="2" style="padding-left:50px;">
				<b>Entitats promotores</b>
			</td></tr>
			<tr><td style="vertical-align:top; padding-left:10px; padding-top:15px">
				<table><tr><td>
					<a href="http://www.gencat.cat/benestar" style="text-decoration:none">
						<img alt="logo generalitat" src="<?php echo $pathroot?>/sites/default/files/butlletins/financament/logo_generalitat.png" style="border: 0 none">
					</a>
				</td></tr><tr><td style="padding-top: 45px;">
					<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/es/deed.ca" rel="license">
						<img style="border:0 none;" src="http://i.creativecommons.org/l/by-nc-sa/3.0/es/80x15.png" alt="Licencia de Creative Commons">
					</a>
				</td></tr></table>
			</td><td style="vertical-align:top; padding-top:15px">
				<!-- <a href="http://www.voluntariat.org" style="text-decoration:none">
					<img alt="logo voluntariat" src="<?php echo $pathroot?>/sites/default/files/butlletins/financament/logo_scv.png" style="border: 0 none">
				</a> -->
			</td><td style="padding-left:50px;">
				<p>
					<a href="http://www.suport.org" style="color:#53544F; text-decoration:none; font-weight:normal">Suport Associatiu Centre d'Estudis</a><br />
					<a href="http://www.esplai.org" style="color:#53544F; text-decoration:none; font-weight:normal">Fundació Catalana de l'Esplai</a><br />
					<a href="http://www.peretarres.org" style="color:#53544F; text-decoration:none; font-weight:normal">Fundació Pere Tarrés</a><br />
					<a href="http://www.ateneus.cat" style="color:#53544F; text-decoration:none; font-weight:normal">Federació d'Ateneus de Catalunya</a><br />
					<a href="http://www.xvac.cat" style="color:#53544F; text-decoration:none; font-weight:normal">Xarxa de Voluntariat Ambiental de Catalunya</a><br />
					<a href="http://www.ensdecomunicacio.cat" style="color:#53544F; text-decoration:none; font-weight:normal">Ens de l'Associacionisme Cultural Català</a><br />
				</p>
			</td><td style="padding-left:15px">
				<p>
					<a href="http://jovesteb.org" style="color:#53544F; text-decoration:none; font-weight:normal">Associació per a joves Teb</a><br />
					<a href="http://www.ravalnet.org" style="color:#53544F; text-decoration:none; font-weight:normal">Associació ciutadana Ravalnet</a><br />
					<a href="http://www.federacio.net/ca" style="color:#53544F; text-decoration:none; font-weight:normal">Federació Catalana del Voluntariat Social</a><br />
					<a href="http://magno.uab.es/fas" style="color:#53544F; text-decoration:none; font-weight:normal">Fundació Autònoma Solidària</a><br />
					<a href="http://www.escoltesiguies.cat" style="color:#53544F; text-decoration:none; font-weight:normal">Minyons Escoltes i Guies de Catalunya (MEG)</a><br />
					<a href="http://www.iwith.org/ca/" style="color:#53544F; text-decoration:none; font-weight:normal">I-with.org</a><br />
				</p>
			</td></tr>
		</table>
	<tr><td colspan="2" style="background-color:black; color:white; text-align:right; padding:5px 10px;">
		<a style="text-decoration: none; color:white" href="http://www.xarxanet.org/alta_financament">Alta</a> | 
		<a style="text-decoration: none; color:white;" href="http://www.xarxanet.org/baixa_financament">Baixa</a> | 
		<a style="text-decoration: none; color:white;" href="mailto:financament@xarxanet.org?Subject=Consulta%20butlletí%20Finançament">Contacte</a> | 
		<a style="text-decoration: none; color:white;" href="http://www.xarxanet.org/avis-legal">Avís legal</a>
	</td></tr> 
</table>