<?php
/**
 * Template for the Submission Links hub page (slug: links).
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1>🔗 பயனுள்ள இணைப்புகள்</h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0">சரணடைதல் இயக்கம் தொடர்பான இணையதளங்கள், சமூக ஊடகங்கள் &amp; பயன்பாடுகள்.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="grid grid-3">
      <a class="card" href="<?php echo esc_url(home_url('/websites-2/')); ?>"><div class="ico">🌐</div><h3>Submission Websites</h3><p>தொடர்புடைய சரணடைதல் இணையதளங்கள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/blog-facebook/')); ?>"><div class="ico">📘</div><h3>Facebook / Blog</h3><p>Facebook குழுக்கள் &amp; வலைப்பதிவுகள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/chennals/')); ?>"><div class="ico">▶️</div><h3>YouTube Channels</h3><p>சரணடைதல் YouTube சேனல்கள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/app/')); ?>"><div class="ico">📱</div><h3>Mobile App</h3><p>Submission மொபைல் பயன்பாடுகள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/join-us/')); ?>"><div class="ico">🤝</div><h3>Join Us</h3><p>எங்களுடன் இணையவும், தொடர்பு கொள்ளவும்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/charity/')); ?>"><div class="ico">❤️</div><h3>Submitter's Charity Trust</h3><p>உதவி தேவைப்படுவோருக்கான சேவைகள்.</p></a>
    </div>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar">وَتَعاوَنوا عَلَى البِرِّ وَالتَّقوىٰ</p>
    <blockquote>நன்மையிலும் இறையச்சத்திலும் ஒருவருக்கொருவர் உதவிக் கொள்ளுங்கள்.</blockquote>
    <cite>குர்ஆன் 5:2</cite>
  </div>
</section>

<?php get_footer(); ?>
