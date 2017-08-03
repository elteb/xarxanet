<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>
<header id="third-header-clone" class="header hidde" role="header">
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="sticky-logo hidden-xs">
        <img src="/sites/all/themes/xn17/assets/images/logo/logo-30-white.svg" alt="menu icon"/>
      </div>
      <div id="menu-icon">
        <img src="/sites/all/themes/xn17/assets/images/icon/icon-menu-gray.svg" alt="menu icon"/>
      </div>
      <div class="main-selector main-resources">
        <a><!--TODO-->recursos</a>
      </div>
      <div class="main-selector main-news">
        <a><!--TODO-->notícies</a>
      </div>
      <div class="social-icons hidden-xs hidden-sm">
        <!-- TODO -->
        <a href="#"><img src="/sites/all/themes/xn17/assets/images/icon/icon-fb-circle.svg" alt="facebook icon"/></a>
        <a href="#"><img src="/sites/all/themes/xn17/assets/images/icon/icon-tw-circle.svg" alt="twitter icon"/></a>
        <a href="#"><img src="/sites/all/themes/xn17/assets/images/icon/icon-share-circle.svg" alt="share icon"/></a>
      </div>
    </div>
  </div>
</header>
<header id="first-header" class="header" role="header">
  <div class="container">
    <?php if ($site_slogan): ?>
      <div class="header-region col-lg-6 col-md-6 col-sm-12 col-xs-12 first hidden-sm hidden-xs">
        <div id="site-slogan"><?php print $site_slogan; ?></div>
      </div>
    <?php endif; ?>
    <?php if ($secondary_menu): ?>
      <div class="header-region col-lg-6 col-md-6 col-sm-12 col-xs-12 second">
        <ul id="secondary-menu" class="menu nav navbar-nav">
          <?php print render($secondary_menu); ?>
          <li class="leaf active hidden-md hidden-lg"><img id="search-icon" src="/sites/all/themes/xn17/assets/images/icon/icon-search-white.svg" alt="search icon"/></li>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</header>
<header id="second-header" class="header hidden-sm" role="header">
  <div class="container">
    <?php if ($logo): ?>
      <div class="header-region col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="site-logo">
          <a href="<?php print $front_page; ?>" class="navbar-brand" rel="home" title="<?php print t('Home'); ?>">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo" />
          </a>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($search_form): ?>
      <div class="header-region col-lg-6 col-md-6 col-sm-12 col-xs-12 hidden-xs">
        <div id="search-form">
          <?php print $search_form; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</header>
<header id="third-header" class="header" role="header">
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="sticky-logo hidden-xs hidden-md hidden-lg">
        <img src="/sites/all/themes/xn17/assets/images/logo/logo-30-white.svg" alt="menu icon"/>
      </div>
      <div id="menu-icon">
        <img src="/sites/all/themes/xn17/assets/images/icon/icon-menu-gray.svg" alt="menu icon"/>
      </div>
      <div class="main-selector main-resources">
        <a><!--TODO-->recursos</a>
      </div>
      <div class="main-selector main-news">
        <a><!--TODO-->notícies</a>
      </div>
      <div class="social-icons hidden-xs hidden-sm">
        <!-- TODO -->
        <a href="#"><img src="/sites/all/themes/xn17/assets/images/icon/icon-fb-circle.svg" alt="facebook icon"/></a>
        <a href="#"><img src="/sites/all/themes/xn17/assets/images/icon/icon-tw-circle.svg" alt="twitter icon"/></a>
        <a href="#"><img src="/sites/all/themes/xn17/assets/images/icon/icon-share-circle.svg" alt="share icon"/></a>
      </div>
    </div>
  </div>
</header>
<div id="main-menu">
  <div class="container">
    <?php
      print render($main_menu);
    ?>
  </div>
</div>

<div id="main-wrapper">
  <div id="main" class="main">
    <div class="container">
      <?php if ($breadcrumb): ?>
        <div id="breadcrumb" class="visible-desktop">
          <?php print $breadcrumb; ?>
        </div>
      <?php endif; ?>
      <?php if ($messages): ?>
        <div id="messages">
          <?php print $messages; ?>
        </div>
      <?php endif; ?>
      <div id="page-header">
        <?php if ($title): ?>
          <div class="page-header">
            <h1 class="title"><?php print $title; ?></h1>
          </div>
        <?php endif; ?>
        <?php if ($tabs): ?>
          <div class="tabs">
            <?php print render($tabs); ?>
          </div>
        <?php endif; ?>
        <?php if ($action_links): ?>
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
    <div id="content" class="container">
      <?php print render($page['content']); ?>
    </div>
  </div> <!-- /#main -->
</div> <!-- /#main-wrapper -->

<footer id="footer" class="footer" role="footer">
  <div class="container">
    <?php if ($copyright): ?>
      <small class="copyright pull-left"><?php print $copyright; ?></small>
    <?php endif; ?>
    <small class="pull-right"><a href="#"><?php print t('Back to Top'); ?></a></small>
  </div>
</footer>
