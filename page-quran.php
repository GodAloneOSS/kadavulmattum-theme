<?php
/**
 * Template for the Quran hub page (slug: quran).
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1>📖 குர்ஆன்</h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0">குர்ஆனை ஆன்லைனில் வாசிக்கவும், கேட்கவும், பதிவிறக்கவும் &mdash; தமிழிலும் ஆங்கிலத்திலும்.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="grid grid-3">
      <a class="card" href="https://godalone.in/quran/"><div class="ico">💻</div><h3>குர்ஆன் ஆன்லைன்</h3><p>நேரடியாக உலாவியில் குர்ஆனை வாசிக்கவும், தேடவும்.</p></a>
      <a class="card" href="https://godalone.in/audio-quran/"><div class="ico">🎧</div><h3>குர்ஆன் ஆடியோ</h3><p>ஆங்கிலம் &amp; தமிழில் குர்ஆன் ஓதுதலைக் கேட்கவும்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/downloads/')); ?>"><div class="ico">📱</div><h3>பதிவிறக்கம்</h3><p>குர்ஆன் ரீடர் ஆப் மற்றும் மொபைல் பதிப்புகள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/wp-content/uploads/2020/06/Tamil-Quran-Iruthi-vetham.pdf')); ?>"><div class="ico">📄</div><h3>தமிழ் குர்ஆன் PDF</h3><p>இறுதி வேதம் &mdash; தமிழ் மொழிபெயர்ப்பு PDF பதிவிறக்கம்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/quranminiapp/')); ?>"><div class="ico">📲</div><h3>Quran Mini App</h3><p>சிறிய, விரைவான குர்ஆன் பயன்பாடு.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/quran-study/')); ?>"><div class="ico">🎓</div><h3>Online Quran Study</h3><p>குர்ஆன் ஆய்வுக் குழு &amp; வகுப்புகள்.</p></a>
    </div>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar">إِنَّا نَحنُ نَزَّلنَا الذِّكرَ وَإِنَّا لَهُ لَحافِظونَ</p>
    <blockquote>நிச்சயமாக நாமே இந்த நினைவூட்டலை (குர்ஆனை) இறக்கினோம்; நிச்சயமாக நாமே இதைப் பாதுகாப்போம்.</blockquote>
    <cite>குர்ஆன் 15:9</cite>
  </div>
</section>

<?php get_footer(); ?>
