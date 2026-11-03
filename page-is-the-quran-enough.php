<?php
/**
 * Template Name: Is the Quran enough?
 * Simple page for new visitors. Routed in functions.php (no wp-admin page).
 * Quran verses come from the site's own Quran data.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<style>
.en-s{font-size:1.02rem;line-height:1.8;color:var(--ink-soft);margin:0 0 .6em}
.vc{margin-top:14px;padding:16px 16px 10px;border-radius:14px;background:rgba(0,0,0,.18);border:1px solid var(--line)}
.vc cite{display:block;font-style:normal;font-weight:600;font-size:13px;letter-spacing:.5px;color:var(--gold-tan);text-align:center;padding-bottom:4px}
.stack{max-width:820px;margin:0 auto}
.stack .card{margin-bottom:18px}
.stack p{line-height:1.8}
.who{width:100%;border-collapse:separate;border-spacing:0;border:1px solid var(--line);border-radius:16px;overflow:hidden;background:linear-gradient(180deg,var(--panel),var(--panel-2,var(--panel)))}
.who th,.who td{padding:14px 16px;text-align:left;vertical-align:top;line-height:1.6;border-bottom:1px solid var(--line)}
.who th{background:rgba(0,0,0,.2);color:var(--gold-bright);font-weight:700}
.who tr:last-child td{border-bottom:0}
.who td:first-child{font-weight:600;color:var(--ink);width:38%}
.who td:last-child{color:var(--ink-soft)}
.big{font-size:1.25rem;color:var(--ink);text-align:center;margin:0 0 6px}
.steps{counter-reset:s;list-style:none;margin:0;padding:0}
.steps li{counter-increment:s;position:relative;padding:12px 0 12px 52px;color:var(--ink);line-height:1.6}
.steps li::before{content:counter(s);position:absolute;left:0;top:8px;width:36px;height:36px;border-radius:50%;background:var(--gold-grad);color:#fff;font-weight:700;display:flex;align-items:center;justify-content:center}
.cta-row{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:22px}
.cta-row .btn{white-space:normal;text-align:center}
@media(max-width:560px){.who td:first-child{width:42%}.who th,.who td{padding:12px}}
</style>
<style>
/* page 3 extras */
.stack{max-width:820px;margin:0 auto}
.stack .card{margin-bottom:18px}
.stack p{line-height:1.8}
.who{width:100%;border-collapse:separate;border-spacing:0;border:1px solid var(--line);border-radius:16px;overflow:hidden;background:linear-gradient(180deg,var(--panel),var(--panel-2,var(--panel)))}
.who th,.who td{padding:14px 16px;text-align:left;vertical-align:middle;line-height:1.55;border-bottom:1px solid var(--line)}
.who th{background:rgba(0,0,0,.2);color:var(--gold-bright);font-weight:700}
.who tr:last-child td{border-bottom:0}
.who td:first-child{color:var(--ink);font-weight:600}
.who .num{font-size:1.15rem;font-weight:700;color:var(--gold-bright);white-space:nowrap}
.who .res{color:var(--ink-soft);white-space:nowrap}
.who .res b{color:var(--gold-bright);font-size:1.1rem}
.n{display:inline-flex;width:24px;height:24px;border-radius:50%;background:var(--gold-grad);color:#fff;font-size:13px;font-weight:700;align-items:center;justify-content:center;margin-right:6px}
.dots{margin:0;padding-left:20px;color:var(--ink);line-height:1.8}
.dots li{margin-bottom:8px}
.steps{counter-reset:s;list-style:none;margin:0;padding:0}
.steps li{counter-increment:s;position:relative;padding:12px 0 12px 52px;color:var(--ink);line-height:1.6}
.steps li::before{content:counter(s);position:absolute;left:0;top:8px;width:36px;height:36px;border-radius:50%;background:var(--gold-grad);color:#fff;font-weight:700;display:flex;align-items:center;justify-content:center}
.cta-row{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:22px}
.cta-row .btn{white-space:normal;text-align:center}
@media(max-width:600px){.who th,.who td{padding:10px 10px;font-size:.93rem}.who .res{white-space:normal}}
</style>
<style>.stack .card p.big{font-size:1.3rem;font-weight:600;color:var(--ink);text-align:center;margin:0 0 8px}ul.dots{list-style:none;margin:0;padding:0}ul.dots li{position:relative;padding:8px 0 8px 24px;line-height:1.7;color:var(--ink-soft)}ul.dots li::before{content:"";position:absolute;left:4px;top:18px;width:9px;height:9px;border-radius:50%;background:var(--gold-bright)}.vc .ar{font-family:"Amiri","Scheherazade New","Noto Naskh Arabic",serif;font-size:1.5rem;line-height:2;direction:rtl;text-align:right;color:var(--ink);margin:0 0 6px}.vc .note{font-size:.92rem;opacity:.85;margin:6px 0}</style>
<div class="page-hero">
<div class="wrap">
<div class="crumb">Kadavulmattum.org</div>
<h1 class="reveal">குர்ஆன் போதுமானதா?</h1>
<p class="hero-sub">குர்ஆன் தன்னைப் பற்றி என்ன கூறுகிறது என்பதை அமைதியாகப் பாருங்கள். படியுங்கள், பிறகு நீங்களே முடிவு செய்யுங்கள்.</p>
</div>
</div>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">1</div><h2>கேள்வி</h2></div>
<div class="stack">
<div class="card reveal"><p>பலரும் கேட்கிறார்கள்: “எனக்கு வழிகாட்ட குர்ஆன் மட்டுமே போதுமா?” சிறந்த வழி, குர்ஆனிடமே கேட்பதுதான்.</p></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">2</div><h2>குர்ஆன் தன்னைப் பற்றி கூறுவது</h2></div>
<div class="stack">
<table class="who">
<thead><tr><th>குர்ஆன் தன்னை இவ்வாறு கூறுகிறது...</th><th>வசனம்</th></tr></thead>
<tbody>
<tr><td>முற்றிலும் விவரிக்கப்பட்டது</td><td>6:114</td></tr>
<tr><td>முழுமையானது</td><td>6:115</td></tr>
<tr><td>ஒவ்வொன்றின் விபரங்களையும் வழங்குவது</td><td>12:111</td></tr>
<tr><td>அனைத்தையும் விளக்குவது, வழிகாட்டலும் அருளும்</td><td>16:89</td></tr>
</tbody>
</table>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">3</div><h2>வசனங்கள்</h2></div>
<div class="stack">
<div class="card reveal"><div class="vc"><p class="en-s">“அவர் இந்தப் புத்தகத்தை முற்றிலும் விவரிக்கப்பட்டதாக உங்களுக்கு வெளிப்படுத்தியிருக்கின்றபோது, கடவுளை விடுத்து மற்றவற்றை சட்ட மூலாதாரமாக நான் தேட வேண்டுமா? வேதத்தைப் பெற்றுக் கொண்டவர்கள் இது உம்முடைய இரட்சகரிடமிருந்து சத்தியத்துடன், வெளிப்படுத்தப்பட்டுள்ளது என்பதை அடையாளம் கண்டு கொள்கின்றனர். எந்தச் சந்தேகத்திற்கும் நீர் இடமளிக்க வேண்டாம்.”</p><cite>குர்ஆன் 6:114</cite></div><div class="vc"><p class="en-s">“உம்முடைய இரட்சகரின் வார்த்தையானது சத்தியம் மற்றும் நீதத்தால் முழுமையடைந்ததாக உள்ளது. அவருடைய வார்த்தைகளை எந்த ஒன்றும் மாற்றி விடாதிருக்க வேண்டும். அவர்தான் செவியேற்பவர், சர்வமும் அறிந்தவர்.”</p><cite>குர்ஆன் 6:115</cite></div><div class="vc"><p class="en-s">“அவர்களுடைய சரித்திரத்தில், அறிவுத்திறன் கொண்டோருக்கொரு படிப்பினை உள்ளது. இது புனையப்பட்ட ஹதீஸ் அல்ல; (குர்ஆனாகிய) இது முந்திய அனைத்து வேதங்களையும் உறுதிப்படுத்துகின்றது, ஒவ்வொன்றிற்கும் உரிய விபரங்களை வழங்குகின்றது, மேலும் நம்பிக்கை கொண்டோருக்கொரு கலங்கரை விளக்காகவும் அருளாகவும் திகழ்கின்றது.”</p><cite>குர்ஆன் 12:111</cite></div><div class="vc"><p class="en-s">“ஒவ்வொரு சமூகத்திலிருந்தும் ஒரு சாட்சியை அவர்களில் இருந்தே நாம் எழுப்பும் அந்நாள் வரும், மேலும் இந்த மக்களுக்குச் சாட்சியாக உம்மைக் கொண்டு வருவோம். ஒவ்வொரு விஷயத்திற்கும் விளக்கங்களை வழங்கவும், மேலும் வழிகாட்டலாகவும், கருணையாகவும், சரணடைந்தோருக்கு நற்செய்தியாகவும் இந்தப் புத்தகத்தை உமக்கு நாம் வெளிப்படுத்தி உள்ளோம்.”</p><cite>குர்ஆன் 16:89 (வசனத்தின் ஒரு பகுதி)</cite></div></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">4</div><h2>குர்ஆன் கேட்கும் இன்னொரு கேள்வி</h2></div>
<div class="stack">
<div class="card reveal"><div class="vc"><p class="en-s">“இவை, சத்தியத்துடன், நாம் உமக்கு எடுத்துரைக்கின்ற கடவுளின் வெளிப்பாடுகளாகும். கடவுளுக்கும் அவருடைய வெளிப்பாடுகளுக்கும் பின்னர் வேறு எந்த ஹதீஸில் அவர்கள் நம்பிக்கை கொள்கின்றனர்?”</p><cite>குர்ஆன் 45:6</cite></div></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">5</div><h2>இந்தப் பக்கம் கூறாதவை</h2></div>
<div class="stack">
<div class="card reveal"><ul class="dots"><li>யாரும் கெட்டவர் என்று இது சொல்லவில்லை.</li><li>உங்கள் குடும்பத்தையோ நண்பர்களையோ விட்டுவிடச் சொல்லவில்லை.</li><li>திறந்த மனதுடன் நீங்களே குர்ஆனைச் சரிபார்க்க மட்டுமே கேட்கிறது. “எந்தச் சந்தேகத்திற்கும் நீர் இடமளிக்க வேண்டாம்” (6:114) என்பது புத்தகத்தை நெருங்கிப் பார்க்க கடவுளே விடுக்கும் அழைப்பு.</li></ul></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">6</div><h2>நீங்களே சரிபாருங்கள்</h2></div>
<div class="stack">
<div class="card reveal"><ol class="steps">
<li><a href="<?php echo esc_url(home_url('/quran/')); ?>">குர்ஆனை ஆன்லைனில்</a> உங்கள் மொழியில் படியுங்கள்.</li>
<li><a href="<?php echo esc_url(home_url('/calculator-19')); ?>">19 கால்குலேட்டரில்</a> எண்களைச் சரிபாருங்கள். இந்த நூல் பாதுகாக்கப்பட்டுள்ளது என்பதற்கான ஓர் அடையாளம் இது.</li>
<li>கடவுளிடம் வழிகாட்டும்படி கேளுங்கள். அவரே சிறந்த வழிகாட்டி.</li>
</ol></div>
<div class="cta-row">
<a class="btn btn-gold" href="<?php echo esc_url(home_url('/quran/')); ?>">💻 குர்ஆனைப் படிக்க</a>
<a class="btn btn-ghost" href="<?php echo esc_url(home_url('/calculator-19')); ?>">🔢 19 கால்குலேட்டர்</a>
<a class="btn btn-ghost" href="<?php echo esc_url(home_url('/is-this-for-me')); ?>">🙋 இது எனக்கானதா?</a>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>
