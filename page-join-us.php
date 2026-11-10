<?php
/**
 * Join us page (slug: join-us) -- Kadavulmattum Premium
 * Rebuilt 4 Nov 2026 so the page no longer depends on the Avada / Fusion Builder plugin.
 * Same links as before: Telegram, WhatsApp, Facebook, YouTube, Instagram, X.
 */
if (!defined('ABSPATH')) exit;
global $km_force_day_theme; $km_force_day_theme = true;
/* Page description for Google / share previews (the old Avada layout code must never be used as a description). */
$km_jd = 'கடவுளின் செய்தியைத் தொடர்ந்து பெற, எங்கள் Telegram, WhatsApp, Facebook, YouTube, Instagram மற்றும் X பக்கங்களில் இணையுங்கள்.';
foreach (array('wpseo_metadesc', 'wpseo_opengraph_desc', 'wpseo_twitter_description') as $km_h) {
  add_filter($km_h, function () use ($km_jd) { return $km_jd; }, 99);
}
get_header();
$links = array(
  array('Telegram.me/quran6346',        'https://telegram.me/quran6346',        '#0f7bb5'),
  array('Telegram.me/qurantamil6346',   'https://telegram.me/qurantamil6346',   '#0f7bb5'),
  array('WhatsApp – English',           'https://chat.whatsapp.com/D19bVWrb6Dh6IafU0Wg25I', '#128c7e'),
  array('WhatsApp – Tamil',             'https://chat.whatsapp.com/HwvQr8NrhX60yDa32YbOQG', '#128c7e'),
  array('Facebook.com/Kadavulmattum',   'https://www.facebook.com/Kadavulmattum/', '#1b5fc4'),
  array('YouTube.com/kadavulmattum',    'https://www.youtube.com/kadavulmattum', '#b3261e'),
  array('Instagram.com/kadavulmattum',  'https://www.instagram.com/kadavulmattum/', '#b02a73'),
  array('X.com/kadavulmattum',          'https://twitter.com/kadavulmattum',    '#1a1a1a'),
);
?>
<style>
.km-join{max-width:520px;margin:0 auto;padding:6px 0 18px}
.km-join .km-join-intro{text-align:center;margin:0 0 22px;line-height:1.7;color:var(--ink-soft,var(--ink))}
.km-join a.km-btn{display:block;margin:0 0 12px;padding:15px 20px;border-radius:999px;color:#fff !important;text-align:center;font-weight:700;font-size:1.02rem;text-decoration:none !important;transition:transform .15s,box-shadow .15s;box-shadow:0 2px 8px rgba(0,0,0,.12)}
.km-join a.km-btn:hover,.km-join a.km-btn:focus{transform:translateY(-2px);box-shadow:0 6px 16px rgba(0,0,0,.2);outline:3px solid var(--gold,#d9b45a);outline-offset:2px}
.km-join .km-join-foot{text-align:center;margin-top:22px;font-size:.9rem}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<article class="article">
  <div class="km-join">
    <p class="km-join-intro">எங்கள் சமூக வலைதளங்களில் இணைந்து, இறைவனின் செய்தியைத் தொடர்ந்து பெறுங்கள்.</p>
    <?php foreach ($links as $l) : ?>
      <a class="km-btn" style="background:<?php echo esc_attr($l[2]); ?>" href="<?php echo esc_url($l[1]); ?>" target="_blank" rel="noopener"><?php echo esc_html($l[0]); ?></a>
    <?php endforeach; ?>
    <p class="km-join-foot"><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">PRIVACY POLICY</a></p>
  </div>
</article>

<?php get_footer(); ?>
