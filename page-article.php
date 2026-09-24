<?php
/**
 * Template for the Article hub page (slug: article).
 */
if (!defined('ABSPATH')) exit;
global $km_force_day_theme; $km_force_day_theme = true;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1>📰 கட்டுரை</h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0">சரணடைதல் குறித்த கட்டுரைகளும், உரைகளும், விளக்கங்களும்.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">🗂️ தொகுப்புகள்</div>
      <h2>கட்டுரை வகைகள்</h2>
    </div>
    <div class="grid grid-3">
      <a class="card" href="<?php echo esc_url(home_url('/km/')); ?>"><div class="ico">📰</div><h3>Kadavul Mattum org கட்டுரைகள்</h3><p>தளத்தின் சொந்தக் கட்டுரைகள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/blog/')); ?>"><div class="ico">✍️</div><h3>ரஷாத் கலீஃபா: கட்டுரைகள்</h3><p>டாக்டர் ரஷாத் கலீஃபாவின் எழுத்துக்கள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/quran-hadith-islam/')); ?>"><div class="ico">📖</div><h3>குர்ஆன், ஹதீஸ் &amp; இஸ்லாம்</h3><p>குர்ஆனுக்கும் ஹதீஸுக்கும் இடையிலான வேறுபாடு.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/speech/')); ?>"><div class="ico">🎙️</div><h3>Speech &ndash; சொற்பொழிவுகள்</h3><p>உரைகளும் பேச்சுக்களும்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/jummah/')); ?>"><div class="ico">🕌</div><h3>ஜும்மாஹ் உரைகள்</h3><p>வெள்ளிக்கிழமை கூட்டுப் பிரார்த்தனை உரைகள்.</p></a>
    </div>
  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">⭐ பிரபலமான கட்டுரைகள்</div>
      <h2>தேர்ந்தெடுக்கப்பட்டவை</h2>
    </div>
    <div class="grid grid-4">
      <a class="card" href="<?php echo esc_url(home_url('/zakat/')); ?>"><h3>ஜகாத் &ndash; கடமையான தர்மம்</h3></a>
      <a class="card" href="<?php echo esc_url(home_url('/fasting/')); ?>"><h3>ரமலான் &ndash; நோன்பு</h3></a>
      <a class="card" href="<?php echo esc_url(home_url('/salat/')); ?>"><h3>ஸலாத் &ndash; தொடர்பு தொழுகை</h3></a>
      <a class="card" href="<?php echo esc_url(home_url('/noah/')); ?>"><h3>நூஹ் நபியின் வரலாறு</h3></a>
      <a class="card" href="<?php echo esc_url(home_url('/mohammed-nabi/')); ?>"><h3>முகம்மது நபியை மறுப்பவர்கள் காஃபிர்களே!</h3></a>
      <a class="card" href="<?php echo esc_url(home_url('/peace_and_blissful/')); ?>"><h3>அமைதி மற்றும் பேரானந்தம்</h3></a>
      <a class="card" href="<?php echo esc_url(home_url('/nabi-vs-rasool/')); ?>"><h3>வேதம் வழங்கப்பட்டவர் Vs தூதர்</h3></a>
      <a class="card" href="<?php echo esc_url(home_url('/mathematical-miracle-of-sura-1-2/')); ?>"><h3>சூரா 1ன் கணித அற்புதம்</h3></a>
    </div>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar">وَذَكِّر فَإِنَّ الذِّكرىٰ تَنفَعُ المُؤمِنينَ</p>
    <blockquote>நினைவூட்டுவாயாக; ஏனெனில் நினைவூட்டல் நம்பிக்கையாளர்களுக்குப் பயனளிக்கும்.</blockquote>
    <cite>குர்ஆன் 51:55</cite>
  </div>
</section>

<?php get_footer(); ?>
