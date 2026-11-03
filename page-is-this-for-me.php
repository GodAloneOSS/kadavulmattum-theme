<?php
/**
 * Template Name: Is this for me?
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
<h1 class="reveal">இது எனக்கானதா?</h1>
<p class="hero-sub">புதியவர்களுக்கும், ஆர்வமுள்ளவர்களுக்கும், தயக்கம் உள்ளவர்களுக்கும் ஒரு எளிய பதில். நீங்கள் யாராக இருந்தாலும், தயவுசெய்து தொடர்ந்து படியுங்கள்.</p>
</div>
</div>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">1</div><h2>இது யாருக்காக?</h2></div>
<div class="stack">
<table class="who">
<thead><tr><th>நீங்கள்...</th><th>அப்படியெனில்...</th></tr></thead>
<tbody>
<tr><td>எந்தப் பிரிவைச் சேர்ந்த முஸ்லிமாக இருந்தால்</td><td>இந்தச் செய்தி கடவுள் ஒருவரையே வணங்கும்படி கேட்கிறது. தயவுசெய்து குர்ஆனைக் கொண்டு சரிபார்த்துக் கொள்ளுங்கள்.</td></tr>
<tr><td>கிறிஸ்தவர் அல்லது யூதராக இருந்தால்</td><td>உங்களை வரவேற்கிறோம். குர்ஆன் உங்களிடம் மரியாதையுடன் பேசுகிறது.</td></tr>
<tr><td>இந்து, பௌத்தர் அல்லது வேறு எந்தப் பாதையைச் சேர்ந்தவராக இருந்தால்</td><td>உங்களை வரவேற்கிறோம். படியுங்கள், கேள்விகள் கேளுங்கள், சுதந்திரமாக முடிவு செய்யுங்கள்.</td></tr>
<tr><td>மதம் இல்லாதவராக இருந்தால்</td><td>உங்களை வரவேற்கிறோம். ஆதாரங்களைப் பாருங்கள், நீங்களே முடிவு செய்யுங்கள்.</td></tr>
<tr><td>சந்தேகங்கள் அல்லது கடினமான கேள்விகள் உள்ளவராக இருந்தால்</td><td>நல்லது. கேளுங்கள். எல்லாவற்றையும் சரிபார்க்கும்படி இந்தத் தளம் உங்களை அழைக்கிறது.</td></tr>
</tbody>
</table>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">2</div><h2>ஏதேனும் நிர்ப்பந்தம் உள்ளதா?</h2></div>
<div class="stack">
<div class="card reveal"><p class="big">இல்லை.</p><p>இந்தத் தளம் எந்தக் குழுவிலும் சேரவோ, பணம் கொடுக்கவோ, எதிலும் கையெழுத்திடவோ கேட்பதில்லை. கடவுள் கூறுகிறார்:</p><div class="vc"><p class="en-s">“மார்க்கத்தில் எவ்வித நிர்ப்பந்தமும் இல்லாதிருக்க வேண்டும்: தவறான வழியிலிருந்து சரியான வழியானது இப்பொழுது தெளிவாகப் பிரிந்துள்ளது. சாத்தானைப் பழித்துரைத்து மேலும் கடவுள் மீது நம்பிக்கை கொள்கின்ற எவரும் மிகவும் உறுதியான பிடிமானத்தைப் பற்றிக் கொண்டு விட்டார்; ஒருபோதும் உடைந்திடாத ஒன்று. கடவுள் செவியேற்பவர், சர்வமும் அறிந்தவர்.”</p><cite>குர்ஆன் 2:256</cite></div></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">3</div><h2>ஒரே கோரிக்கை என்ன?</h2></div>
<div class="stack">
<div class="card reveal"><p class="big">கடவுள் ஒருவரையே வணங்குங்கள்.</p><p>அவருடன் வேறு எவரையும் இணையாக்காதீர்கள்.</p><div class="vc"><p class="en-s">“கூறுவீராக, வேதத்தைப் பின்பற்றுபவர்களே, எங்களுக்கும் உங்களுக்கும் இடையில் அறிவுக்கு உகந்த ஓர் உடன்படிக்கைக்கு நாம் வருவோம்: அதாவது நாம் கடவுளைத் தவிர எதனையும் வழிபடாதிருக்க வேண்டும்; அதாவது அவருடன் எந்த போலித் தெய்வங்களையும் நாம் ஒருபோதும் அமைத்துக்கொள்ளக் கூடாது, அன்றி கடவுளுடன் மானிட இனத்தவர் எவரையும் இரட்சகர்களாக அமைத்துக்கொள்ளக் கூடாது. அவர்கள் திரும்பிச் சென்று விட்டால், கூறுவீராக, நாங்கள் சரணடைந்தவர்களாக இருக்கின்றோம் என்பதற்குச் சாட்சி பகர்வீர்களாக.”</p><cite>குர்ஆன் 3:64</cite></div></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">4</div><h2>“நம்” மக்கள் மட்டுமே நல்லவர்களா?</h2></div>
<div class="stack">
<div class="card reveal"><p class="big">இல்லை.</p><p>கடவுள் நம்பிக்கையையும் நற்செயல்களையும் பார்க்கிறார், பெயர் அடையாளங்களை அல்ல.</p><div class="vc"><p class="en-s">“நிச்சயமாக, நம்பிக்கை கொண்டவர்கள், யூதர்களாக இருப்பவர்கள், கிறிஸ்துவர்கள், மேலும் மதம் மாறியவர்கள்; எவராயினும் (1) கடவுள் மீது நம்பிக்கை கொண்டு, மேலும் (2) இறுதி நாளின் மீதும் நம்பிக்கை கொண்டு, மேலும் (3) நன்னெறியானதொரு வாழ்வு நடத்துகின்றவர்கள், தங்களுடைய இரட்சகரிடமிருந்து தங்களுடைய பிரதிபலனைப் பெற்றுக்கொள்வார்கள். அவர்கள் அஞ்சுவதற்கு எதுவுமில்லை, அன்றி அவர்கள் துக்கப்படவும் மாட்டார்கள்.”</p><cite>குர்ஆன் 2:62</cite></div><div class="vc"><p class="en-s">“மக்களே, ஒரே ஆண் மற்றும் பெண்ணிலிருந்து உங்களை நாம் படைத்தோம், மேலும் நீங்கள் ஒருவர் மற்றவரை அடையாளம் கண்டு கொள்வதற்காக, உங்களை வெவ்வேறு சமூகங்களாகவும் இனங்களாகவும் ஆக்கினோம். கடவுளின் பார்வையில் உங்களில் மிகவும் சிறந்தவர் மிகவும் நன்னெறி மிக்கவரே ஆவார். கடவுள் எல்லாம் அறிந்தவர், நன்கு அறிந்தவர்.”</p><cite>குர்ஆன் 49:13</cite></div></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">5</div><h2>எங்கிருந்து தொடங்குவது?</h2></div>
<div class="stack">
<div class="card reveal"><ol class="steps">
<li><a href="<?php echo esc_url(home_url('/quran/')); ?>">குர்ஆனை ஆன்லைனில்</a> உங்கள் மொழியில் படியுங்கள்.</li>
<li><a href="<?php echo esc_url(home_url('/calculator-19')); ?>">19 கால்குலேட்டரில்</a> எண்களை நீங்களே சரிபார்த்துப் பாருங்கள்.</li>
<li>உங்கள் கேள்விகளுக்கு <a href="<?php echo esc_url(home_url('/quran-qa/')); ?>">குர்ஆன் கேள்வி பதில்</a> பகுதியைப் பாருங்கள்.</li>
</ol></div>
<div class="cta-row">
<a class="btn btn-gold" href="<?php echo esc_url(home_url('/quran/')); ?>">💻 குர்ஆனைப் படிக்க</a>
<a class="btn btn-ghost" href="<?php echo esc_url(home_url('/calculator-19')); ?>">🔢 19 கால்குலேட்டர்</a>
<a class="btn btn-ghost" href="<?php echo esc_url(home_url('/quran-qa/')); ?>">❓ கேள்வி பதில்</a>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>
