<?php
/**
 * Front page -- Kadavulmattum Premium
 *
 * Custom homepage matching the approved design preview. Content (the
 * "Submission" introduction and Quran verses) preserved from the site's
 * existing homepage, restyled to the GodAlone Premium design system.
 */
if (!defined('ABSPATH')) exit;
if (!(isset($_GET['oldhome']) && $_GET['oldhome'] === '1')) { get_header(); get_template_part('part-home-new'); get_footer(); return; }
get_header();
?>

<section class="hero">
  <div class="hero-inner">
    <div class="kicker">கடவுள்மட்டும் &middot; GodAlone</div>
    <p class="bism">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
    <p class="bism-ta">கடவுளின் பெயரால், மிக்க அருளாளர், மிக்க கருணையாளர்.</p>
    <h1>கடவுளுக்கு மட்டும் சரணடைதல் (இஸ்லாம்)<br>மனிதகுலத்திற்கான கடவுளின் இறுதி செய்தி</h1>
    <p class="hero-sub">கடவுள்-ஆல் அங்கீகரிக்கப்பட்ட ஒரே மார்க்கம் "சரணடைதல்" ஆகும். (குர்ஆன் 3:19) &mdash;
    "சரணடைதல்" என்பது ஒரு பெயர் அல்ல; இது ஆன்மாவின் முழுமையான பக்தியையும் கடவுளுக்கு மட்டும்
    சரணடைவதையும் பிரதிபலிக்கும் ஒரு விளக்கமாகும்.</p>
    <div class="hero-cta">
      <a class="btn btn-gold" href="https://godalone.in/quran/">💻 குர்ஆன் ஆன்லைன் படிக்க</a>
      <a class="btn btn-ghost" href="#explore">🔎 மேலும் அறிய</a>
    </div>
  </div>
</section>

<section class="blk">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">சரணடைதல் என்றால் என்ன</div>
      <h2>ஆன்மாவின் முழுமையான பக்தி</h2>
    </div>
    <article class="article" style="padding:0">
      <p>"சரணடைதல்" (அரபு மொழியில் இஸ்லாம்) என்பது ஒரு பெயர் அல்ல. இது ஆன்மாவின் முழுமையான
      பக்தியையும் கடவுளுக்கு மட்டும் சரணடைவதையும் பிரதிபலிக்கும் ஒரு விளக்கமாகும். பழைய ஏற்பாடு,
      புதிய ஏற்பாடு மற்றும் இறுதி ஏற்பாடு &ndash; குர்ஆன் உள்ளிட்ட கடவுளின் அனைத்து வேதங்களின் இது
      முதல் கட்டளை ஆகும்.</p>
      <p>சரணடைதோர்கள் முழு மனதுடன் கடவுளுக்கு மட்டும் வணங்குவதின் மூலமும், மறுஉலகின் மீது நம்பிக்கை
      கொள்வதன் மூலமும், நன்னெறியானதொரு வாழ்வு நடத்துவதன் மூலமும் மகிழ்ச்சியையும் அமைதியையும்
      பெறுகின்றனர்.</p>
    </article>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar">إِنَّ الَّذينَ ءامَنوا وَالَّذينَ هادوا وَالصّٰبِـٔونَ وَالنَّصٰرىٰ مَن ءامَنَ بِاللَّهِ وَاليَومِ الـٔاخِرِ وَعَمِلَ صٰلِحًا فَلا خَوفٌ عَلَيهِم وَلا هُم يَحزَنونَ</p>
    <blockquote>நிச்சயமாக, நம்பிக்கை கொண்டவர்கள், யூதர்களாக இருப்பவர்கள், மதம் மாறியவர்கள், மற்றும்
    கிறிஸ்துவர்கள்: அவர்களில் எவராயினும் (1) கடவுள் மீது நம்பிக்கை கொண்டு, (2) இறுதி நாள் மீது
    நம்பிக்கை கொண்டு, மேலும் (3) நன்னெறியானதொரு வாழ்வு நடத்துகின்றவர்களுக்கு அஞ்சுவதற்கு
    ஒன்றுமில்லை, அன்றி அவர்கள் கவலைப்படவும் மாட்டார்கள்.</blockquote>
    <cite>குர்ஆன் 5:69 &middot; கடவுள் மட்டும்</cite>
  </div>
</section>

<section class="blk" id="explore" style="padding-bottom:0">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">🧭 அறிமுகம்</div>
      <h2>தளத்தில் என்ன இருக்கிறது</h2>
    </div>
    <div class="grid">
      <a class="card" href="<?php echo esc_url(home_url('/downloads/')); ?>"><div class="ico"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-quran-downloads.png')); ?>" alt="குர்ஆன் பதிவிறக்கம். கணினி, மொபைல் செயலிகள் மற்றும் PDF வடிவங்களில் குர்ஆனைப் பதிவிறக்கவும்." loading="lazy"></div><h3>குர்ஆன்</h3><p>குர்ஆன் பதிவிறக்கம். கணினி, மொபைல் செயலிகள் மற்றும் PDF வடிவங்களில் குர்ஆனைப் பதிவிறக்கவும்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/videos/')); ?>"><div class="ico"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-submission-videos.png')); ?>" alt="Submission Videos" loading="lazy"></div><h3>வீடியோக்கள்</h3><p>இஸ்லாம் மற்றும் சரணடைதல் குறித்த விளக்க வீடியோக்கள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/audios/')); ?>"><div class="ico"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-quran-audio.png')); ?>" alt="Quran Audio" loading="lazy"></div><h3>ஆடியோ</h3><p>குர்ஆன் ஓதுதலை கேட்கவும், பதிவிறக்கவும்.</p></a>
      <a class="card" href="https://kadavulmattum.org/library/"><div class="ico"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-book-library.png')); ?>" alt="Book Library" loading="lazy"></div><h3>புத்தகங்கள்</h3><p>படிக்கவும் பதிவிறக்கவும் ஏற்ற நூல்களின் தொகுப்பு.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/article/')); ?>"><div class="ico">📰</div><h3>கட்டுரை</h3><p>சரணடைதல் குறித்த கட்டுரைகளும் விளக்கங்களும்.</p></a>
      <a class="card" href="https://kadavulmattum.org/coloring-book/" target="_blank" rel="noopener"><div class="ico">🎨</div><h3>குர்ஆன் கலரிங் புத்தகம்</h3><p>குழந்தைகளுக்கான குர்ஆன் கதைகளை ஆன்லைனில் வண்ணமிடுங்கள் அல்லது அச்சிடுங்கள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/utilities/')); ?>"><div class="ico">🛠️</div><h3>பயன்பாடுகள்</h3><p>வழிபாட்டிற்கும் கற்றலுக்கும் உதவும் கருவிகள்.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/charity/')); ?>"><div class="ico"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-charity-trust.png')); ?>" alt="Charity Trust" loading="lazy"></div><h3>சரணடைந்தவர்கள் தர்ம ஸ்தாபனம்</h3><p>Submitter's Charity Trust - உதவி தேவைப்படுவோருக்கு சேவைகள்.</p></a>
      <a class="card" href="https://kadavulmattum.org/quran-qa/"><div class="ico"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-quran-qa.png')); ?>" alt="Quran Q and A" loading="lazy"></div><h3>குர்ஆன் கேள்வி பதில்</h3><p>குர்ஆன்லிருந்து எளிய வினாக்கள் மூலம் நம் புரிதலைச் சோதித்து மேம்படுத்திக்கொள்ள.</p></a>
    </div>
  </div>
</section>

<?php if (function_exists('km_pm_daily') && ($pm = km_pm_daily('t'))) : ?>
<section class="blk newhere">
<div class="wrap">
<div class="sec-head">
<span class="kicker reveal">🌱 புதியவரா?</span>
<h2 class="reveal">இங்கிருந்து தொடங்குங்கள்</h2>
<p class="reveal">புதியவர்களுக்கும் ஆர்வமுள்ளவர்களுக்குமான சிறிய, எளிய பக்கங்கள்.</p>
</div>
<div class="grid grid-3" style="max-width:1100px;margin:0 auto">
<a class="card reveal" href="<?php echo esc_url(home_url('/is-this-for-me')); ?>"><span class="ico">🤔</span><h3>இது எனக்கானதா?</h3><p>நீங்கள் யாராக இருந்தாலும் உங்களை வரவேற்கிறோம். நிர்ப்பந்தம் இல்லாத ஒரு எளிய பதில்.</p><span class="go">படிக்க →</span></a>
<a class="card reveal" href="<?php echo esc_url(home_url('/is-the-quran-enough')); ?>"><span class="ico">📖</span><h3>குர்ஆன் போதுமானதா?</h3><p>குர்ஆன் தன்னைப் பற்றி என்ன கூறுகிறது என்பதை அமைதியாகப் பாருங்கள்.</p><span class="go">படிக்க →</span></a>
<a class="card reveal" href="<?php echo esc_url(home_url('/check-it-yourself')); ?>"><span class="ico">🧮</span><h3>நீங்களே சரிபாருங்கள்</h3><p>ஐந்து எண்கள், ஒரு கால்குலேட்டர், ஐந்து நிமிடங்கள். யாரையும் நம்ப வேண்டியதில்லை.</p><span class="go">முயன்று பாருங்கள் →</span></a>
</div>
</div>
</section>

<section class="blk pm-home">
  <div class="wrap">
    <div class="sec-head">
      <span class="kicker reveal">🖼️ இன்றைய படம்</span>
      <h2 class="reveal">குர்ஆன் படச் செய்திகள்</h2>
      <p class="reveal">ஒரு வசனம், ஒரு படம். பதிவிறக்கி இன்று யாரோடாவது பகிருங்கள்.</p>
    </div>
    <style>.pm-home .pm-hc{max-width:420px;margin:0 auto;background:var(--panel);border:1px solid var(--line);border-radius:16px;overflow:hidden}.pm-home .pm-hc img{display:block;width:100%;height:auto}.pm-home .pm-hs{background:linear-gradient(90deg,#9A6A14,#C9922B 28%,#e0b43c 52%,#e8863c 76%,#d4546a);color:#fff;text-align:center;font-weight:700;padding:7px 8px;font-size:.95rem;text-shadow:0 1px 2px rgba(0,0,0,.35)}.pm-home .pm-ha{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;padding:14px}</style>
    <div class="pm-hc reveal">
      <a href="<?php echo esc_url(home_url('/picture-messages/#' . $pm)); ?>"><img loading="lazy" alt="" src="<?php echo esc_url(home_url('/picture-messages/img/?f=' . $pm)); ?>"></a>
      <div class="pm-hs">KadavulMattum.org</div>
      <div class="pm-ha">
        <a class="btn btn-gold" href="<?php echo esc_url(home_url('/picture-messages/#' . $pm)); ?>">⬇ பதிவிறக்கு / பகிர்</a>
        <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/picture-messages/')); ?>">🖼️ எல்லா படங்களும்</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="blk utils">
    <div class="wrap">
        <div class="sec-head">
            <div class="kicker">🛠️ இஸ்லாமிய பயன்பாடுகள்</div>
            <h2>ஒவ்வொரு சரணடைந்தவருக்கும் கருவிகள்</h2>
            <p>கணக்கீடுகள், தொழுகை நேரங்கள் மற்றும் கல்வி வளங்கள்.</p>
        </div>
        <div class="util-grid">
            <a class="util" href="https://kadavulmattum.org/coloring-book/" target="_blank" rel="noopener"><span class="ui"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-coloring-book.png')); ?>" alt="Quran Coloring Book" loading="lazy"></span><b>குர்ஆன் கலரிங் புத்தகம்</b><span>குர்ஆன் கதைகளை ஆன்லைனில் வண்ணமிடுங்கள் அல்லது அச்சிடுங்கள்</span></a>
            <a class="util" href="/calculator-19"><span class="ui"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-calculator-19.png')); ?>" alt="19 Calculator" loading="lazy"></span><b>19 கால்குலேட்டர்</b><span>19 ஆல் வகுபடுகிறதா எனச் சரிபார்க்கவும்</span></a>
            <a class="util" href="/salat-timing"><span class="ui"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-salat-ramadan.png')); ?>" alt="Salat & Ramadan Timing" loading="lazy"></span><b>தொழுகை மற்றும் ரமலான் நேரம்</b><span>துல்லியமான தொழுகை நேரங்கள்</span></a>
            <a class="util" href="/ramadan-calculator"><span class="ui"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-utility.png')); ?>" alt="Utility" loading="lazy"></span><b>பயன்பாடு</b><span>நோன்பு நாட்கள் மற்றும் நேரங்கள்</span></a>
            <a class="util" href="/zakat-calculator"><span class="ui"><img src="<?php echo esc_url(content_url('uploads/card-icons/icon-zakat-calculator.png')); ?>" alt="Zakat Calculator" loading="lazy"></span><b>ஜகாத் கால்குலேட்டர்</b><span>குர்ஆன் அடிப்படையிலான கணக்கீடு</span></a>
        </div>
    </div>
</section>
<section class="verse" style="margin-top:70px">
  <div class="wrap">
    <p class="ar">إِيّاكَ نَعبُدُ وَإِيّاكَ نَستَعينُ</p>
    <blockquote>உம்மை மட்டுமே நாங்கள் வணங்குகிறோம். உம்மிடம் மட்டுமே நாங்கள் உதவி கோருகிறோம்.
    பரிபூரணமான மகிழ்ச்சி என்பது கடவுளுக்கு மட்டுமே சரணடைதல்.</blockquote>
    <cite>குர்ஆன் 1:5</cite>
  </div>
</section>

<?php get_footer(); ?>
