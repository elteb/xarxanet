<?php
    global $user;
    $inicia_sessio = ($user->uid)? $user->name : 'Inicieu sessió';
?>


<div id="header-menu">

  <div id="Logos">
	<a title="Xarxanet.org" href="/" class="Logo-Xarxanet"><img src="<?php print base_path().path_to_theme();?>/images/logo-xarxanet-org.png" width="205" height="42" alt="Xarxanet" longdesc="http://url" /></a>


<div id="header-right">	
   <div class="user-links">
	   <ul>
		   <?php
		   		if (($_COOKIE['mt_device'] == 'desktop') || ($_GET['device'] == 'desktop')) {
					echo '<li class="upper-buttons mobile"><a href="/index.php?device=mobile">Mòbil</a></li>';
				} 
		   ?>
		   <li class="upper-buttons first"><a href="/user">Accedeix</a></li>
		   <li class="upper-buttons last"><a href="/butlletins">Butlletins</a></li>
	   </ul>
   </div>

   <div id="Search">
      <form id="search-form" action="<?php echo base_path(); ?>search/apachesolr_search/" method="get" name="searchform">
        <input id="search-text" type="text" class="search"/>
        <input class="button" type="submit" value=""/>
      </form>
   </div>
</div>


  </div>
  <div id="Menu">
    <ul class="Menu">
      <li class="Noticies"><a title="Notícies" href="<?php print base_path(); ?>noticies" class="Noticies">Notícies</a>
       
      </li>
      <li class="Recursos"><a title="Recursos" href="/recursos" class="Recursos">Recursos</a>
        
      </li>
      <li class="Financament"><a title="Finançament" href="<?php print base_path(); ?>financaments" class="Financament">Finançament</a>
        <ul>
          <li><a title="Financament Públic" href="<?php print base_path(); ?>financaments/public" class="Public">Públic</a></li>
          <li><a title="Financament Privat" href="<?php print base_path(); ?>financaments/privat" class="Privat">Privat</a></li>
          <li><a title="Financament Premis" href="<?php print base_path(); ?>financaments/premis" class="Premis">Premis</a></li>
          <li><a title="Financament Subvenció" href="<?php print base_path(); ?>financaments/subvencions" class="Subvencio">Subvenció</a></li>
          <li><a title="Financament Beques" href="<?php print base_path(); ?>financaments/beques" class="Beques">Beques</a></li>
          <li><a title="Financament Altres" href="<?php print base_path(); ?>financaments/altres" class="Altres">Altres</a></li>
        </ul>
      </li>
      <li class="Agenda"><a title="Agenda" href="<?php print base_path(); ?>agenda" class="Agenda">Agenda</a>
        <ul>
          <li><a title="" href="<?php print base_path(); ?>agenda/acte" class="Actes">Actes</a></li>
          <li><a title="" href="<?php print base_path(); ?>agenda/curs" class="Cursos">Cursos</a></li>
          <li><a title="Esdeveniments antics" href="<?php print base_path(); ?>agenda/esdeveniments_antics" class="Esdeveniments-Antics">Esdeveniments antics</a></li>
        </ul>
      </li>
     <li class="Biblioteca"><a title="Biblioteca" href="<?php print base_path(); ?>biblioteca" class="Biblioteca">Biblioteca</a></li>

	
      <li class="QuePotsFer third"><a title="Fes voluntariat" href="<?php print base_path(); ?>fes-voluntariat" class="QuePotsFer">Fes Voluntariat</a>
            </li>

	
	<li class="QuePotsFer second"><a href="<?php print base_path(); ?>noticies/publica-continguts-xarxanetorg" title="Publica continguts" target="">Publica Continguts</a></li>
	<li class="QuePotsFer first"><a href="<?php print base_path(); ?>formulari-dassessorament" title="Assessora't" target="">Assessora't</a></li>


    </ul>
    <ul class="Menu-AS">
      <li class="Ambits">Àmbits
	
      </li>
      <li class="Serveis">Millora l'entitat
	
      </li>
    </ul>
  </div>
</div>
