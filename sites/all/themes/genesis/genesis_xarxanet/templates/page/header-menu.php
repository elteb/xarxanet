<?php
    global $user;
    $inicia_sessio = ($user->uid)? $user->name : 'Inicieu sessió';
?>
<div id="header-menu">
  <div id="Barras">
    <ul>
      <li><a title="Bloc Xarxanet" href="http://bloc.xarxanet.org/" target="_blank">Bloc Xarxanet</a></li>
      <li><a title="Voluntariat.org" href="http://www.voluntariat.org/" target="_blank">Voluntariat.org</a></li>
      <li><a title="Blocs d'entitats" href="http://blocs.xarxanet.org/" target="_blank">Blocs d'entitats</a></li>
      <li><a title="Sobre el projecte" href="<?php print base_path(); ?>sobre-el-projecte">Sobre el projecte</a></li>
      <li><a title="Contactar" href="<?php print base_path(); ?>contacte">Contactar</a></li>
      <li class="li-right"><a title="Registreu-vos" href="<?php print base_path(); ?>user/register">Registreu-vos</a></li>
      <li class="li-right li-registre"><a id="inicia-sessio" title="<?php print $inicia_sessio; ?>" href="#"><?php print $inicia_sessio; ?></a></li>
    </ul>
  </div>
  <div id="Barras">
    <ul>
      <li><a title="Què ofereix xarxanet.org?" href="<?php print base_path(); ?>que-tofereix-xarxanetorg">Què ofereix xarxanet.org?</a></li>
      <!--  <li><a title="Subscriu-te al butlletí" href="<?php print base_path(); ?>user/register">Subscriu-te al butlletí</a></li> -->
      <li><a title="Troba la teva entitat" href="<?php print base_path(); ?>troba-la-teva-entitat">Troba la teva entitat</a></li>
      <li><a title="Quiosc Associatiu" href="<?php print base_path(); ?>quiosc-associatiu">Quiosc Associatiu</a></li>		
      <li><a title="Fes-te voluntari" href="<?php print base_path(); ?>fes-voluntariat">Fes-te voluntari</a></li>
      <li><a title="Butlletins" href="<?php print base_path(); ?>butlletins">Butlletins</a></li>
    </ul>
    <div id="Search">
      <form id="search-form" action="<?php echo base_path(); ?>search/apachesolr_search/" method="get" name="searchform">
        <input id="search-text" type="text" class="search"/>
        <input class="button" type="submit" value=""/>
      </form>
    </div>
  </div>
  <div id="Logos">
    <a title="Xarxanet.org" href="/" class="Logo-Xarxanet"><img src="<?php print base_path().path_to_theme();?>/images/header-logo-xarxanet.gif" width="205" height="70" alt="Xarxanet" longdesc="http://url" /></a>
<!--<a title="Generalitat Departament de Benestar Social i Família" href="http://www.gencat.cat/benestar/" class="Logo-Generalitat"><img src="<?php print base_path().path_to_theme();?>/images/logo-generalitat.png" alt="Generalitat" longdesc="http://xxx" /></a> -->
  </div>  
  <div id="Menu">
    <ul class="Menu">
      <li class="Inici"><a title="Inici" href="/" class="Inici">Inici</a></li>
      <li class="Recursos"><a title="Recursos" href="/recursos" class="Recursos">Recursos</a>
        <ul>
          <li><a title="Econòmic" href="<?php print base_path(); ?>economic/recursos" class="Economic">Económic</a></li>
          <li><a title="Formació" href="<?php print base_path(); ?>formacio/recursos" class="Formacio">Formació</a></li>
          <li><a title="Informàtic" href="<?php print base_path(); ?>informatic/recursos" class="Informatic">Informàtic</a></li>
          <li><a title="Jurídic" href="<?php print base_path(); ?>juridic/recursos" class="Juridic">Jurídic</a></li>
          <li><a title="Projectes" href="<?php print base_path(); ?>projectes/recursos" class="Projectes">Projectes</a></li>
          <li><a title="General" href="<?php print base_path(); ?>recursos" class="General">General</a></li>
        </ul>
      </li>
      <li class="Noticies"><a title="Notícies" href="<?php print base_path(); ?>noticies" class="Noticies">Notícies</a>
        <ul>
          <li><a title="Notícies Ambiental" href="<?php print base_path(); ?>ambiental/noticies" class="Ambiental">Ambiental</a></li>
          <li><a title="Notícies Comunitari" href="<?php print base_path(); ?>comunitari/noticies" class="Comunitari">Comunitari</a></li>
          <li><a title="Notícies Cultural" href="<?php print base_path(); ?>cultural/noticies" class="Cultural">Cultural</a></li>
          <li><a title="Notícies Social" href="<?php print base_path(); ?>social/noticies" class="Social">Social</a></li>
          <li><a title="Notícies Internacional" href="<?php print base_path(); ?>internacional/noticies" class="Internacional">Internacional</a></li>
          <li><a title="Notícies Econòmic" href="<?php print base_path(); ?>economic/noticies" class="Economic">Econòmic</a></li>
          <li><a title="Notícies Formació" href="<?php print base_path(); ?>formacio/noticies" class="Formació">Formació</a></li>
          <li><a title="Notícies Informàtic" href="<?php print base_path(); ?>informatic/noticies" class="Informatic">Informàtic</a></li>
          <li><a title="Notícies Jurídic" href="<?php print base_path(); ?>juridic/noticies" class="Juridic">Jurídic</a></li>
          <li><a title="Notícies Projectes" href="<?php print base_path(); ?>projectes/noticies" class="Projectes">Projectes</a></li>
        </ul>
      </li>
      <li class="Agenda"><a title="Agenda" href="<?php print base_path(); ?>agenda" class="Agenda">Agenda</a>
        <ul>
          <li><a title="" href="<?php print base_path(); ?>agenda/acte" class="Actes">Actes</a></li>
          <li><a title="" href="<?php print base_path(); ?>agenda/curs" class="Cursos">Cursos</a></li>
          <li><a title="Esdeveniments antics" href="<?php print base_path(); ?>agenda/esdeveniments_antics" class="Esdeveniments-Antics">Esdeveniments antics</a></li>
        </ul>
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
	  <li class="Biblioteca"><a title="Biblioteca" href="<?php print base_path(); ?>biblioteca" class="Biblioteca">Biblioteca</a>
	  </li>
      <li class="QuePotsFer"><a title="" href="" class="QuePotsFer">Què pots fer a Xarxanet?</a>
        <ul>
          <li><a title="T'ajudem?" href="<?php print base_path(); ?>t-ajudem">T'ajudem?</a></li>
          <li><a title="Publica continguts" href="<?php print base_path(); ?>noticies/publica-continguts-xarxanetorg">Publica continguts</a></li>
          <li><a title="Assessora't gratuïtament" href="<?php print base_path(); ?>assessorament-gratuit-associacions">Assessora't gratuïtament</a></li>
          <li><a title="Crea una pàgina web" href="<?php print base_path(); ?>com-fer-una-pagina-web-gratuita-la-teva-entitat">Crea una pàgina web</a></li>
          <li><a title="Fes córrer la veu" href="<?php print base_path(); ?>fes-correr-la-veu">Fes córrer la veu</a></li>
          <li><a title="Publica el teu esdeveniment" href="<?php print base_path(); ?>proposa-un-esdeveniment">Publica el teu esdeveniment</a></li>
        </ul>
      </li>
    </ul>
    <ul class="Menu-AS">
      <li class="Ambits">Àmbits associatius
        <ul class="Menu-AS-Sub">
          <li><a href="<?php print base_path(); ?>ambiental" title="Ambiental" class="Ambiental">Ambiental</a></li>
          <li><a href="<?php print base_path(); ?>comunitari" title="Comunitari" class="Comunitari">Comunitari</a></li>
          <li><a href="<?php print base_path(); ?>cultural" title="Cultural" class="Cultural">Cultural</a></li>
          <li><a href="<?php print base_path(); ?>social" title="Social" class="Social">Social</a></li>
          <li class="Internacional"><a href="<?php print base_path(); ?>internacional" title="Internacional" class="Internacional">Internacional</a>
          <ul class="Internacional">
              <li><a href="<?php print base_path(); ?>internacional" title="Notícies">Notícies</a></li>
              <li><a href="<?php print base_path(); ?>internacional/noticies/esp" title="Noticias">Noticias</a></li>
              <li><a href="<?php print base_path(); ?>internacional/noticies/eng" title="News">News</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="Serveis">Serveis d'Assesorament
        <ul class="Menu-AS-Sub">
          <li class="Economic"><a href="<?php print base_path(); ?>economic" title="Econòmic" class="Economic">Econòmic</a>
            <ul class="Economic">
              <li><a href="<?php print base_path(); ?>formulari-dassessorament" title="Formulari d'asessorament">Formulari d'asessorament</a></li>
              <li><a href="<?php print base_path(); ?>economic/cmf" title="Consultes freqüents">Consultes freqüents</a></li>
              <li><a href="<?php print base_path(); ?>economic/recursos" title="Recursos">Recursos</a></li>
              <li><a href="<?php print base_path(); ?>economic/noticies" title="Noticies">Notícies</a></li>
            </ul>
          </li>
          <li class="Formacio"><a href="<?php print base_path(); ?>formacio" title="Formació" class="Formacio">Formació</a>
            <ul class="Formacio">
              <li><a href="<?php print base_path(); ?>formulari-dassessorament" title="Formulari d'asessorament">Formulari d'asessorament</a></li>
              <li><a href="<?php print base_path(); ?>formacio/cmf" title="Consultes freqüents">Consultes freqüents</a></li>
              <li><a href="<?php print base_path(); ?>formacio/recursos" title="Recursos">Recursos</a></li>
              <li><a href="<?php print base_path(); ?>formacio/noticies" title="Noticies">Notícies</a></li>
            </ul>
          </li>
          <li class="Informatic"><a href="<?php print base_path(); ?>informatic" title="Informàtic" class="Informatic">Informàtic</a>
            <ul class="Informatic">
              <li><a href="<?php print base_path(); ?>formulari-dassessorament" title="Formulari d'asessorament">Formulari d'asessorament</a></li>
              <li><a href="<?php print base_path(); ?>informatic/cmf" title="Consultes freqüents">Consultes freqüents</a></li>
              <li><a href="<?php print base_path(); ?>informatic/recursos" title="Recursos">Recursos</a></li>
              <li><a href="<?php print base_path(); ?>informatic/noticies" title="Noticies">Notícies</a></li>
            </ul>
          </li>
          <li class="Juridic"><a href="<?php print base_path(); ?>juridic" title="Jurídic" class="Juridic">Jurídic</a>
            <ul class="Juridic">
              <li><a href="<?php print base_path(); ?>formulari-dassessorament" title="Formulari d'asessorament">Formulari d'asessorament</a></li>
              <li><a href="<?php print base_path(); ?>juridic/cmf" title="Consultes freqüents">Consultes freqüents</a></li>
              <li><a href="<?php print base_path(); ?>juridic/recursos" title="Recursos">Recursos</a></li>
              <li><a href="<?php print base_path(); ?>juridic/noticies" title="Noticies">Notícies</a></li>
            </ul>
          </li>
          <li class="Projectes"><a href="<?php print base_path(); ?>projectes" title="Projectes" class="Projectes">Projectes</a>
            <ul class="Projectes">
              <li><a href="<?php print base_path(); ?>formulari-dassessorament" title="Formulari d'asessorament">Formulari d'asessorament</a></li>
              <li><a href="<?php print base_path(); ?>projectes/cmf" title="Consultes freqüents">Consultes freqüents</a></li>
              <li><a href="<?php print base_path(); ?>projectes/recursos" title="Recursos">Recursos</a></li>
              <li><a href="<?php print base_path(); ?>projectes/noticies" title="Noticies">Notícies</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
