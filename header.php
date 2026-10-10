<?php
/**
 * Header -- Kadavulmattum Premium
 */
if (!defined('ABSPATH')) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php global $km_force_day_theme; $km_default_theme = !empty($km_force_day_theme) ? 'day' : 'night'; ?>
<script>try{var t=localStorage.getItem('kmTheme3');if(t===null){t='<?php echo esc_js($km_default_theme); ?>';}if(t==='day')document.documentElement.className='theme-day';}catch(e){}</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="gh" id="ghHdr">
  <div class="ghbar">
    <div class="gh-left">
      <div class="menuw">
        <button class="ic" id="ghMenuBtn" aria-label="மெனு" type="button">☰</button>
        <nav class="ghmenu" id="ghMenu" aria-label="முதன்மை மெனு">
          <div class="menu-langs">
            <a href="https://godalone.in" rel="noopener">English</a>
            <span class="on">தமிழ்</span>
            <a href="https://ekkhuda.org" rel="noopener">हिंदी</a>
          </div>
          <?php km_primary_menu(); ?>
        </nav>
      </div>
      <a class="brand brand-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Kadavulmattum.org">
        <img class="logo-dark" src="<?php echo KM_LOGO_DARK_DATAURI; ?>" alt="Kadavulmattum.org">
        <img class="logo-light" src="<?php echo KM_LOGO_LIGHT_DATAURI; ?>" alt="Kadavulmattum.org">
        <div class="names">
          <span class="n1">Kadavulmattum.org</span>
          <span class="n2">கடவுள்மட்டும்</span>
        </div>
      </a>
    </div>
    <div class="gh-right">
      <div class="langs" aria-label="மொழி">
        <a href="https://godalone.in" rel="noopener">EN</a>
        <span class="on">தமிழ்</span>
        <a href="https://ekkhuda.org" rel="noopener">हिंदी</a>
      </div>
      <div class="srchw" id="ghSrchw">
        <button class="ic" id="ghSearchBtn" aria-label="தேடல்" type="button">
          <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
        <form class="srchbox" id="ghSrchbox" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
          <input type="text" name="s" id="ghSrchInput" placeholder="தேடல்..." autocomplete="off">
          <button type="submit" aria-label="தேடல்"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></button>
        </form>
      </div>
      <button class="ic" id="ghThemeBtn" aria-label="தீம் மாற்ற" type="button">🌙</button>
    </div>
  </div>
</header>
<main id="km-main">
