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
      <button class="login" id="ghSignin" type="button">
        <svg class="gg" viewBox="0 0 48 48" width="18" height="18" aria-hidden="true">
          <path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3c-1.6 4.7-6.1 8-11.3 8-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.8 1.1 8 3l6-6C34.6 5.1 29.6 3 24 3 12.4 3 3 12.4 3 24s9.4 21 21 21 21-9.4 21-21c0-1.4-.1-2.7-.4-3.5z"/>
          <path fill="#FF3D00" d="M6.3 14.7l6.6 4.8C14.6 15.6 18.9 13 24 13c3.1 0 5.8 1.1 8 3l6-6C34.6 6.1 29.6 4 24 4 16.3 4 9.7 8.3 6.3 14.7z"/>
          <path fill="#4CAF50" d="M24 44c5.5 0 10.4-2.1 14.1-5.5l-6.5-5.5C29.5 34.8 26.9 36 24 36c-5.2 0-9.6-3.3-11.2-8l-6.5 5C9.6 39.7 16.3 44 24 44z"/>
          <path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3c-.8 2.3-2.2 4.3-4.2 5.5l6.5 5.5C39.8 36.6 43 30.9 43 24c0-1.4-.1-2.7-.4-3.5z"/>
        </svg>
        <span>Login</span>
      </button>
      <div class="userw" id="ghUserw">
        <button class="chip" id="ghChip" type="button"><span class="av" id="ghAv">?</span><span id="ghUnm">Account</span></button>
        <div class="umenu" id="ghUmenu">
          <div class="un" id="ghUfull">Signed in</div>
          <div class="ue" id="ghUml"></div>
          <button id="ghSignout" type="button">Sign out</button>
        </div>
      </div>
      <button class="ic" id="ghThemeBtn" aria-label="தீம் மாற்ற" type="button">🌙</button>
    </div>
  </div>
</header>
<main id="km-main">
