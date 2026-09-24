<?php
/**
 * Template for the Utilities hub page (slug: utilities).
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1>🛠️ பயன்பாடுகள்</h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0">வழிபாட்டிற்கும், குர்ஆன் கணித அற்புத ஆய்விற்கும் உதவும் கருவிகள்.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="grid grid-3">
      <a class="card" href="<?php echo esc_url(home_url('/calculator-19')); ?>"><div class="ico">🔢</div><h3>19 &ndash; Calculator</h3><p>எண்களை 19 ஆல் வகுபடுகிறதா என சரிபார்க்கவும்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/zakat-calculator')); ?>"><div class="ico">💰</div><h3>ஜகாத் கால்குலேட்டர்</h3><p>குர்ஆனின்படி வருமானத்தில் 2.5% ஜகாத் கணக்கிடவும்.</p></a>
      <a class="card" href="https://www.abjadcalc.com/" target="_blank" rel="noopener"><div class="ico">🔤</div><h3>Abjad Calculator</h3><p>அரபு எழுத்துக்களின் எண் மதிப்பு கணக்கீடு.</p></a>
      <a class="card" href="https://www.masjidtucson.org/submission/practices/ramadan/rc/" target="_blank" rel="noopener"><div class="ico">🌙</div><h3>Ramadan Calculator</h3><p>ரமலான் நோன்பு நாட்களைக் கணக்கிடவும்.</p></a>
      <a class="card" href="https://www.masjidtucson.org/ptime/" target="_blank" rel="noopener"><div class="ico">🕋</div><h3>Salat (Contact Prayer) Times</h3><p>தொழுகை நேரங்களைக் கண்டறியவும்.</p></a>
    </div>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar">عَلَيها تِسعَةَ عَشَرَ</p>
    <blockquote>அதன் மீது பத்தொன்பது (19) உள்ளது.</blockquote>
    <cite>குர்ஆன் 74:30</cite>
  </div>
</section>

<?php get_footer(); ?>
